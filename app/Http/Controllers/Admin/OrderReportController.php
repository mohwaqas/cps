<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderReportController extends Controller
{
    public function orderReports(Request $request)
    {
        if($request->has('user_id') || $request->get('status') || ($request->has('start_date') && $request->has('end_date'))) {
            $orders = Order::query();

            if($request->has('user_id') && $request->user_id !== "0") {
                $orders = $orders->where('User_Id', $request->user_id);
                $data['user_id'] = (int) $request->user_id;
            }

            if($request->has('status') && $request->status !== "0") {
                $orders = $orders->where('Order_Status', $request->status);
                $data['status'] = (int) $request->status;
            }

            if($request->has('start_date') && $request->has('end_date') && $request->start_date !== null && $request->end_date !== null) {
                $from = date($request->start_date);
                $to = date($request->end_date);
                $orders = $orders->whereBetween('created_at', [$from, $to]);

            }

            $data['orders'] = $orders->get(['id', 'Order_Number', 'User_Id', 'Grand_Total', 'Order_Status', 'created_at']);
        } else {
            $data['orders'] = [];
        }

        $data['title'] = __('Order Reports');

        $data['users'] = User::where('id', '!=', auth()->user()->id)->get();

        return view('admin.pages.order-reports.list', $data);
    }
}
