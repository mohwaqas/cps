<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function adminList(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('is_admin', APPROVE);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<div class="action__buttons">';
                    $btn = $btn.'<a href="' . route('admin.edit_admin', $data->id) . '" class="btn-action"><i class="fa-solid fa-pen-to-square"></i></a>';
                    if($data->is_approved == APPROVE) {
                        $btn = $btn.'<a href="' . route('admin.customer_approve_change', ['notapprove', $data->id]) . '" class="btn-action" title="Approve"><i class="fas fa-toggle-on"></i></a>';
                    }else {
                        $btn = $btn.'<a href="' . route('admin.customer_approve_change', ['approve', $data->id]) . '" class="btn-action" title="Block"><i class="fas fa-toggle-off"></i></a>';
                    }
                    $btn = $btn.'</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data['title'] = __('All Admins');
        return view('admin.pages.users.index', $data);
    }

    public function createAdmin()
    {
        $data['roles'] = Role::pluck('name','name')->all();
        $data['title'] = __('Create Admin');
        return view('admin.pages.users.create', $data);
    }

    public function storeAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.admin_list')
            ->with('toast_success','User created successfully');
    }

    public function editAdmin($id)
    {
        $user = User::find($id);
        $data['user'] = $user;
        $data['roles'] = Role::pluck('name','name')->all();
        $data['userRole'] = $user->roles->pluck('name','name')->all();
        $data['title'] = __('Edit Admin');
        return view('admin.pages.users.edit', $data);
    }

    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->back()
            ->with('toast_success','User updated successfully');
    }

    public function customerList(Request $request)
    {
        if($request->ajax()) {
            $data = User::where('is_admin', INACTIVE);
            if($request->has('package_id') && $request->package_id !== "0") {
                $data = $data->where('package_id', $request->package_id);
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<div class="action__buttons">';
                    $btn =$btn. '<a href="javascript:void(0)" class="btn-action" data-bs-toggle="modal" data-bs-target="#changePackageModal'.$data->id.'" title="'.__('Change Customer Package').'"><i class="fa fa-up-down"></i></a>';
                    $btn =$btn. '<a href="javascript:void(0)" class="btn-action" data-bs-toggle="modal" data-bs-target="#sendEmailModal'.$data->id.'" title="'.__('Send Email').'"><i class="fa fa-envelope"></i></a>';
                    $btn = $btn.'</div>';
                    return $btn;
                })
                ->addColumn('package', function ($data) {
                    return userPackage($data->id);
                })
                ->addColumn('orders', function ($data) {
                    return orderCountuser($data->id);
                })
                ->addColumn('date', function ($data) {
                    return date("d-m-Y", strtotime($data->created_at));
                })
                ->addColumn('approve', function ($data) {
                    $btn = '<div class="action__buttons">';
                    if($data->is_approved == APPROVE) {
                        $btn = $btn.'<a href="' . route('admin.customer_approve_change', ['notapprove', $data->id]) . '" class="btn-action" title="Approve"><i class="fas fa-toggle-on"></i></a>';
                    }else {
                        $btn = $btn.'<a href="' . route('admin.customer_approve_change', ['approve', $data->id]) . '" class="btn-action" title="Block"><i class="fas fa-toggle-off"></i></a>';
                    }
                    $btn = $btn.'</div>';
                    return $btn;
                })
                ->rawColumns(['action', 'package', 'orders', 'date', 'approve'])
                ->make(true);
        }
        $data['title'] = __('All Customers');
        $data['packages'] = Package::where('status', 1)->get(['id', 'name']);
        $data['customers'] = User::where('is_admin', INACTIVE)->get();
        return view('admin.pages.users.customer-list', $data);
    }

    public function customerApproveChange($approve, $user_id)
    {
        $user = User::whereId($user_id)->first();
        if($approve == 'approve') {
            $sts = APPROVE;
        }else{
            $sts = NOTAPPROVE;
        }
        $user->update([
            'is_approved' => $sts,
        ]);

        return redirect()->back()->with('toast_success', __('User successfully updated!'));
    }

    public function customerPackageChange(Request $request, $id)
    {
        if(is_null($request->package_id)) {
            return redirect()->back()->with('toast_error', __('Package is required!'));
        }

        $user = User::whereId($id)->first();
        if(!empty($user)) {

            $update = '';

            if($request->has('package_id') && $request->package_id !== null) {
                $update = $user->update([
                    'package_id' => $request->package_id,
                ]);
            }

            if(!empty($update)) {
                return redirect()->back()->with('toast_success', __('Customer Package Updated Successfully!'));
            }
            return redirect()->back()->with('toast_error', __('Something went wrong!'));
        }
        return redirect()->back()->with('toast_error', __('Customer not found!'));
    }

    public function sendEmailToCustomer(Request $request, $id)
    {
        if(is_null($request->email)) {
            return redirect()->back()->with('toast_error', __('Customer email not found!'));
        }

        if(is_null($request->subject)) {
            return redirect()->back()->with('toast_error', __('Subject field is required!'));
        }

        if(is_null($request->body)) {
            return redirect()->back()->with('toast_error', __('Email body field is required!'));
        }

        $user = User::whereId($id)->first();
        if(!empty($user)) {

            Mail::send('front.mail.send_email_to_customer', ['subject' => $request->subject, 'body' => $request->body], function($message) use($request){
                $message->to($request->email);
                $message->subject($request->subject);
            });
            
            return redirect()->back()->with('toast_success', __('Email Sent Successfully!'));
        }
        return redirect()->back()->with('toast_error', __('Customer not found!'));
    }
}
