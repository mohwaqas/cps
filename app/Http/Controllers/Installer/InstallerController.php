<?php

namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use App\Http\Repositories\InstallerDashboardRepository;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class InstallerController extends Controller
{
    public function __construct(InstallerDashboardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function installerDashboard()
    {
        if(Auth::check()) {
            if(auth()->user()->is_installer === 1) {
                $data = [];
                $data['title'] = __('Installer Dashboard');
                $data['totalOrders'] = $this->repository->getTotalOrders();
                $data['pendingOrders'] = $this->repository->getPendingOrders();
                $data['deliveredOrders'] = $this->repository->getDeliveredOrders();

                return view('installer.pages.dashboard', $data);
            }
            else {
                return redirect()->route('front')->with('toast_success', 'Only Installer can visit there!');
            }
        }
    }

    public function installerOrders(Request $request)
    {
        if(Auth::check()) {
            if(auth()->user()->is_installer === 1) {
                if($request->ajax()) {
                    $data = Order::query();
                    $data = $data->where('User_Id', auth()->user()->id);
                    return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) {
                        $btn = '<div class="action__buttons">';
                        $btn = $btn.'<a href="javascript:void(0)" class="btn-action" data-bs-toggle="modal" data-bs-target="#invoiceModal'.$data->id.'" title="'.__('Order Details').'"><i class="fas fa-file-invoice" style="color:gray;"></i></a>';
                        $btn = $btn.'</div>';
                        return $btn;
                    })
                    ->addColumn('User', function ($data) {
                        return $data->user != null ?$data->user->name : __('You');
                    })
                    ->addColumn('GrandTotal', function($data) {
                        return '$'.$data->Grand_Total;
                    })
                    ->addColumn('Products', function ($data) {
                        $html = '';
                        foreach ($data->order_details as $or) {
                            $html .= '<img src="'. asset(IMG_PRODUCT_PATH. $or->product->Primary_Image)  . '" border="0" height="50" class="img-rounded mr-1" align="center" />';
                        }
                        return $html;
                    })
                    ->addColumn('types', function ($data) {
                        $html = '';
                        foreach ($data->order_details as $key => $or) {
                            if(count($data->order_details) - 1 == $key) {
                                if($or->product->type == PRODUCT_PHYSICAL) {
                                    $html .= 'Physical';
                                }elseif($or->product->type == PRODUCT_DIGITAL) {
                                    $html .= 'Digital';
                                }
                            }else {
                                if($or->product->type == PRODUCT_PHYSICAL) {
                                    $html .= 'Physical,';
                                }elseif($or->product->type == PRODUCT_DIGITAL) {
                                    $html .= 'Digital,';
                                }
                            }
                        }
                        return $html;
                    })
                    ->addColumn('Coupon', function($data) {
                        return is_null($data->Coupon_Id) ? 'N/A' : $data->coupon->CouponCode;
                    })
                    ->addColumn('Status', function($data) {
                        $html = '';
                        if($data->Order_Status == ORDER_PENDING) {
                            $html = __('<span class="status bg-primary-light-varient">Pending</span>');
                        }elseif ($data->Order_Status == ORDER_PROCESSING) {
                            $html = __('<span class="status bg-secondary-light-varient">Processing</span>');
                        }elseif ($data->Order_Status == ORDER_SHIPPED) {
                            $html = __('<span class="status bg-info-light-varient">Shipped</span>');
                        }elseif ($data->Order_Status == ORDER_DELIVERED) {
                            $html = __('<span class="status bg-success-light-varient">Delivered</span>');
                        }elseif ($data->Order_Status == ORDER_CANCELLED) {
                            $html = __('<span class="status bg-danger-light-varient">Canceled</span>');
                        }elseif ($data->Order_Status == ORDER_RETURN) {
                            $html = __('<span class="status bg-danger-light-varient">Returned</span>');
                        }elseif ($data->Order_Status == ORDER_NOT_PAYMENT_YET) {
                            $html = __('<span class="status bg-warning-light-varient">Not Payment Yet</span>');
                        }elseif ($data->Order_Status == ORDER_DELIVERED_FAILED) {
                            $html = __('<span class="status bg-danger-light-varient">Delivery Failed</span>');
                        }
                        return $html;
                    })
                    ->rawColumns(['action', 'Products', 'Status', 'types'])
                    ->make(true);
                }
                $data['title'] = __('Installer Orders List');
                $data['orders'] = Order::with('order_details', 'user', 'coupon', 'order_details.product', 'billing', 'shipping')->where('User_Id', auth()->user()->id)->get();

                return view('installer.pages.orders', $data);
            }
            else {
                return redirect()->route('front')->with('toast_success', 'Only Installer can visit there!');
            }
        }
    }
}
