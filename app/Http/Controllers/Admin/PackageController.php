<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageStoreRequest;
use App\Models\Admin\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PackageController extends Controller
{
    public function packageList(Request $request)
    {
        if ($request->ajax()) {
            $data = Package::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<div class="action__buttons">';
                    $btn = $btn.'<a href="javascript:void(0)" class="btn-action" data-bs-toggle="modal" data-bs-target="#editModal'.$data->id.'"><i class="fa-solid fa-pen-to-square"></i></a>';
                    $btn = $btn.'</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data['title'] = __('Package List');
        $data['package'] = Package::orderBy('id', 'ASC')->get();
        return view('admin.pages.package.index', $data);
    }

    public function updatePackage(PackageStoreRequest $request, $id)
    {
        $id = decrypt($id);
        $package = Package::whereId($id)->first();
        if(!is_null($package)) {
            $update = $package->update([
                'name' => is_null($request->name) ? $package->name : $request->name,
                'range_from' => is_null($request->range_from) ? $package->range_from : $request->range_from,
                'range_to' => is_null($request->range_to) ? $package->range_to : $request->range_to,
                'quantity' => is_null($request->quantity) ? $package->quantity : $request->quantity,
                'discount_percentage' => is_null($request->discount_percentage) ? $package->discount_percentage : $request->discount_percentage,
            ]);

            if(!empty($update)) {
                return redirect()->back()->with('toast_success', __('Package Update successfully!'));
            }
        }
        return redirect()->back()->with('toast_error', __('Something went wrong!'));
    }
}
