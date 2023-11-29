@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')

    @php
        $user = auth()->check();
        $installer = $user ? auth()->user()->is_installer : 0;
        $userPackage = $user ? auth()->user()->package_id : 0;
    @endphp
    
    <!-- breadcrumb area start here  -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-wrap text-center">
                <h2 class="page-title">{{__('Wish List')}}</h2>
                <ul class="breadcrumb-pages">
                    <li class="page-item"><a class="page-item-link" href="{{route('front')}}">{{__('Home')}}</a></li>
                    <li class="page-item">{{__('Wish List')}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end here  -->

    <!-- wish-list area start here  -->
    <div class="wish-list-area section">
        <div class="container">
            <div class="row">

                <div class="col-12 wish-list-table">
                    <div class="table-responsive">
                        <div id="wishlistTable">
                            <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">{{__('Image')}}</th>
                                <th scope="col">{{__('Product Name')}}</th>
                                <th scope="col">{{__('Price')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                                <th scope="col">{{__('Remove')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wishlist as $item)
                                <tr>
                                <td>
                                    <div class="product-image">
                                        @if($user)
                                            <a href="{{route('single.product',$item->en_Product_Slug)}}"><img class="product-thumbnal" src="{{asset(ProductImage().$item->Primary_Image)}}" alt="product" /></a>
                                        @else
                                            <img class="product-thumbnal" src="{{asset(ProductImage().$item->Primary_Image)}}" alt="product" />
                                        @endif
                                        <div class="product-flags">

                                            @if($item->ItemTag)
                                                <span class="product-flag sale">{{$item->ItemTag}}</span>
                                            @endif
                                            @if($item->Discount )
                                                <span class="product-flag discount">{{ __('-')}}{{$item->Discount}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-info text-center">
                                        <h3 class="product-name">
                                            @if($user)
                                                <a class="product-link" href="{{route('single.product',$item->en_Product_Slug)}}">{{$item->en_Product_Name}}</a>
                                            @else
                                                {{$item->en_Product_Name}}
                                            @endif
                                        </h3>
                                        <!-- This is server side code. User can not modify it. -->
                                        {!!  productReview($item->id) !!}
                                        <div class="variable-single-item color-switch">
                                            <div class="product-variable-color">
                                                <input type="hidden" name="quantity" value="1" id="product_quantity">
                                                @foreach($item->colors as $color)
                                                    <label>
                                                        <input type="hidden" name="colorId" value="{{$color->id}}">
                                                        <input name="productColor" class="color-select" type="radio" value="{{$color->id}}">
                                                        <span style="background:{{$color->ColorCode}};"></span>
                                                    </label>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-price text-center">
                                        @if($user && $item->Discount > 0)
                                            <span class="regular-price">${{$item->Price}}</span>
                                        @endif

                                        @if($user && $userPackage === 0)
                                            <span class="price">${{$item->Price}}</span>
                                        @elseif($user && $userPackage === 1)
                                            <span class="price">${{$item->Bronze_Price}}</span>
                                        @elseif($user && $userPackage === 2)
                                            <span class="price">${{$item->Silver_Price}}</span>
                                        @elseif($user && $userPackage === 3)
                                            <span class="price">${{$item->Gold_Price}}</span>
                                        @elseif($user && $userPackage === 4)
                                            <span class="price">${{$item->Platinum_Price}}</span>
                                        @elseif($user)
                                            <span class="price">${{$item->Discount_Price}}</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="action-area">
                                        <a href="javascript:void(0)" title="{{__('Add To Cart')}}" data-id="{{$item->id}}" class="add-cart action-btn addCart" @if(!$user) style="pointer-events: none; cursor: default;" @endif>{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                                    </div>
                                </td>
                                    <td><button class="delet-btn deleteWishlist" data-id="{{$item->id}}" title="Delete Item"><img src="{{asset('frontend/assets/images/close.svg')}}" alt="close" /></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wish-list area end here  -->

    <div id="wishListDelete" data-url="{{ route('wishlist.delete')}}"></div>
    <div id="AddToCartIntoSession" data-url="{{ route('add.to.cart') }}"></div>
    @push('post_script')
        <script src="{{asset('frontend/assets/js/pages/wishlist.js')}}"></script>
    @endpush()
@endsection

