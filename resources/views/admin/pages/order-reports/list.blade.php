@extends('admin.master', ['menu' => 'report', 'submenu' => 'order_reports'])
@section('title', isset($title) ? $title : '')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Order Reports')}}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Order Reports')}}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="{{ route('admin.order-reports') }}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="input__group mb-25">
                            <select class="form-control" id="user_id" name="user_id">
                                <option value="0">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if(isset($user_id) && $user_id === $user->id) selected @endif> {{ $user->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input__group mb-25">
                            <select class="form-control" id="status" name="status">
                                <option value="0" @if(isset($status) && $status === 0) selected @endif> Order Status</option>
                                <option value="1"@if(isset($status) && $status === 1) selected @endif> Pending </option>
                                <option value="2"@if(isset($status) && $status === 2) selected @endif> Processing </option>
                                <option value="3"@if(isset($status) && $status === 3) selected @endif> Shipped </option>
                                <option value="4"@if(isset($status) && $status === 4) selected @endif> Delivered </option>
                                <option value="5"@if(isset($status) && $status === 5) selected @endif> Cancelled </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input__group mb-25">
                            <input id="start_date" name="start_date" class="form-control" type="date" value="" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input__group mb-25">
                            <input id="end_date" name="end_date" class="form-control" type="date" value="" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-blue">Get Report</button>
                    </div>
                </div>
            </form>
        </div>
        @if(count($orders) > 0)
            <div class="col-md-12">
                <div class="customers__area bg-style mb-30">
                    <div class="customers__table">
                        <table class="row-border data-table-filter table-style">
                            <thead>
                            <tr>
                                <th>{{ __('Order No.')}}</th>
                                <th>{{ __('User')}}</th>
                                <th>{{ __('Order Date')}}</th>
                                <th>{{ __('Status')}}</th>
                                <th>{{ __('Total Amount ($)')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                                @php $total = 0 @endphp
                                    @foreach($orders as $order)
                                        @php $total = $total + $order->Grand_Total @endphp

                                        <tr>
                                            <td>{{ $order->Order_Number }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                            @if($order->Order_Status == ORDER_PENDING)
                                                <td><span class="status bg-primary-light-varient">Pending</td>
                                            @elseif ($order->Order_Status == ORDER_PROCESSING)
                                                <td><span class="status bg-secondary-light-varient">Processing</td>
                                            @elseif ($order->Order_Status == ORDER_SHIPPED)
                                                <td><span class="status bg-info-light-varient">Shipped</td>
                                            @elseif ($order->Order_Status == ORDER_DELIVERED)
                                                <td><span class="status bg-success-light-varient">Delivered</td>
                                            @elseif ($order->Order_Status == ORDER_CANCELLED)
                                                <td><span class="status bg-danger-light-varient">Canceled</td>
                                            @elseif ($order->Order_Status == ORDER_RETURN)
                                                <td><span class="status bg-danger-light-varient">Returned</td>
                                            @elseif ($order->Order_Status == ORDER_NOT_PAYMENT_YET)
                                                <td><span class="status bg-warning-light-varient">Not Payment Yet</td>
                                            @elseif ($order->Order_Status == ORDER_DELIVERED_FAILED)
                                                <td><span class="status bg-danger-light-varient">Delivery Failed</td>
                                            @endif
                                            <td>{{ currencySymbol()[currency()]}}{{currencyConverter($order->Grand_Total) }}</td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>

                        <div class="col-md-12 mt-4">
                            <h1 class="text-center bg-dark text-white rounded-pill w-50" style="margin-left: 24%;"> Total {{ currencySymbol()[currency()]}}{{currencyConverter($total) }} </h1>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-12 mt-4">
                <h2 class="text-center mt-4"> No Order Found! </h2>
            </div>
        @endif
    </div>
@endsection
