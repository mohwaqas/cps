<?php

namespace App\Http\Repositories;

use App\Models\Admin\Order;

class InstallerDashboardRepository
{
    public function getTotalOrders()
    {
        return Order::where('User_Id', auth()->user()->id)->count();
    }

    public function getPendingOrders()
    {
        return Order::where('User_Id', auth()->user()->id)->where('Order_Status', ORDER_PENDING)->count();
    }

    public function getDeliveredOrders()
    {
        return Order::where('User_Id', auth()->user()->id)->where('Order_Status', ORDER_DELIVERED)->count();
    }
}
