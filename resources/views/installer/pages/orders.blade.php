@extends('installer.master', ['menu' => 'shipment'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div id="installer-table-url" data-url="{{ route('installer.orders') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Installer Orders')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="customers__table">
                    <table id="InstallerAdvertiseTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>{{ __('Id')}}</th>
                            <th>{{ __('Your Name')}}</th>
                            <th>{{ __('Products')}}</th>
                            <th>{{ __('Types')}}</th>
                            <th>{{ __('Total Amount')}}</th>
                            <th>{{ __('Coupon Code')}}</th>
                            <th>{{ __('Payment Method')}}</th>
                            <th>{{ __('Status')}}</th>
                            <th>{{ __('Order Details')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Row-->
    @foreach ($orders as $order)
        <div class="modal fade bd-example-modal-lg" id="invoiceModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="invoiceModalTitle{{$order->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="viewModalLongTitle">{{__('Invoice')}}</h5>
                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="printDiv">
                        <p><img src="{{asset(IMG_LOGO_PATH.allsetting()['main_logo'])}}" alt="{{__('Logo')}}" /></p>
                        @php
                            $bill = json_decode($order->billing_address,true);
                        @endphp
                        <p>
                            <b>{{__('Order Number:')}}</b> <a href="javascript:void(0)">{{$order->Order_Number}}</a><br>
                            <b>{{__('Name:')}}</b> {{$bill['name']}}<br>
                            <b>{{__('Email:')}}</b> {{$bill['email']}}<br>
                            <b>{{__('Payment Method: ')}}</b> {{$order->Payment_Method}}<br>
                            <b>{{__('TXN: ')}}</b> {{$order->txn}}
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <b>{{__('Billing Address:')}}</b><br>
                                    <small>
                                        {{$bill['name']}} <br>
                                        {{$bill['email']}} <br>
                                        {{$bill['street']}} <br>
                                        {{$bill['state']}} <br>
                                        {{$bill['country']. __(',')}} {{$bill['zipcode']}}
                                    </small>
                                </p>

                            </div>
                            @php
                                $ship = json_decode($order->shipping_address,true);
                            @endphp
                            <div class="col-md-6">
                                <p>
                                    <b>{{__('Shipping Address:')}}</b><br>
                                    <small>
                                        {{$ship['name']}} <br>
                                        {{$ship['email']}} <br>
                                        {{$ship['street']}} <br>
                                        {{$ship['state']}} <br>
                                        {{$ship['country']. __(',')}} {{$ship['zipcode']}}
                                    </small>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <!-- Simple Tables -->
                                <div class="card">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">{{__('Products')}}</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Image')}}</th>
                                                <th>{{__('Quantity')}}</th>
                                                <th>{{__('Price')}}</th>
                                                <th>{{__('Total')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($order->order_details as $od)
                                                <tr>
                                                    <td>{{$od->product->en_Product_Name}}</td>
                                                    <td><img src="{{asset(IMG_PRODUCT_PATH. $od->product->Primary_Image)}}" height="50" class="img-rounded mr-1" /></td>
                                                    <td>{{$od->Quantity}}</td>
                                                    <td>{{ $od->Price }}</td>
                                                    <td>{{ $od->Total_Price }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{__('Subtotal')}}</td>
                                                <td>{{$order->Sub_Total}}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{__('Shipping Charge')}}</td>
                                                <td>{{$order->Delivery_Charge}}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{__('Tax')}}</td>
                                                <td>{{$order->Tax}}</td>
                                            </tr>
                                            @if (!is_null($order->Coupon_Id))
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{__('Discount (-)')}}</td>
                                                    <td>{{$order->Coupon_Amount}}</td>
                                                </tr>
                                            @endif
                                            @if ($order->admin_discount > 0)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{__('Discount')}}</td>
                                                    <td>{{$order->admin_discount}}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{__('Grand Total')}}</td>
                                                <td>{{$order->Grand_Total}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-danger">{{__('*All the amount is in USD currency.')}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">{{__('Close')}}</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @push('post_scripts')
        <script src="{{asset('backend/js/admin/datatables/installer-orders.js')}}"></script>
    @endpush
@endsection
