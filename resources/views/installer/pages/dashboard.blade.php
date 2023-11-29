@extends('installer.master', ['menu' => 'dashboard'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Installer Dashboard')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- Orders -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="status__box-3 bg-style">
                <div class="item__left">
                    <h2>{{__('Total Orders')}}</h2>
                    <div class="status__box__data">
                        <h2>{{$totalOrders}}</h2>
                    </div>
                </div>
                <div class="item__right">
                    <div class="status__box__img">
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="status__box-3 bg-style">
                <div class="item__left">
                    <h2>{{__('Pending Orders')}}</h2>
                    <div class="status__box__data">
                        <h2>{{ $pendingOrders }}</h2>
                    </div>
                </div>
                <div class="item__right">
                    <div class="status__box__img">
                        <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="status__box-3 bg-style">
                <div class="item__left">
                    <h2>{{__(' Delivered Orders')}}</h2>
                    <div class="status__box__data">
                        <h2>{{$deliveredOrders}}</h2>
                    </div>
                </div>
                <div class="item__right">
                    <div class="status__box__img">
                        <i class="fas fa-shopping-cart fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Orders -->
    </div>
@endsection
