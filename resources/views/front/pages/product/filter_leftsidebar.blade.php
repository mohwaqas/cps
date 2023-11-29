<div class="product-list">

    @php
        $user = auth()->check();
        $installer = $user ? auth()->user()->is_installer : 0;
        $userPackage = $user ? auth()->user()->package_id : 0;
    @endphp
    
    @foreach($filters as $product)
        <div class="single-list-product">
            <div class="product-left">
                @if($user)
                    <a href="{{route('single.product',$product->en_Product_Slug)}}"><img class="product-thumbnal" src="{{asset(ProductImage().$product->Primary_Image)}}" alt="product" /></a>
                @else
                    <img class="product-thumbnal" src="{{asset(ProductImage().$product->Primary_Image)}}" alt="product" />
                @endif
                <div class="product-flags">
                    @if($product->ItemTag)
                        <span class="product-flag sale">{{$product->ItemTag}}</span>
                    @endif
                    @if($product->Discount )
                        <span class="product-flag discount">{{ __('-')}}{{$product->Discount}}</span>
                    @endif
                </div>
            </div>
            <div class="product-right">Search

                <div class="product-catagory-review d-flex align-items-center">
                    @foreach($product->product_tags as $ppt)
                        <h4 class="product-catagory">{{$ppt->name}}</h4>
                    @endforeach
                    <!-- This is server side code. User can not modify it. -->
                        {!!  productReview($product->id) !!}
                </div>
                <h3 class="product-name">
                    @if($user)
                        <a class="product-link" href="{{route('single.product',$product->en_Product_Slug)}}">{{langConverter($product->en_Product_Name,$product->fr_Product_Name)}}</a>
                    @else
                        {{langConverter($product->en_Product_Name,$product->fr_Product_Name)}}
                    @endif
                </h3>
                <div class="product-price-color d-flex align-items-center">
                    <div class="product-price">
                        @if($user && $product->Discount > 0)
                            <span class="regular-price">{{currencySymbol()[currency()]}}{{currencyConverter($product->Price)}}</span>
                        @endif

                        @if($user && $userPackage === 0)
                            <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($product->Price)}}</span>
                        @elseif($user && $userPackage === 1)
                            <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($product->Bronze_Price)}}</span>
                        @elseif($user && $userPackage === 2)
                            <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($product->Silver_Price)}}</span>
                        @elseif($user && $userPackage === 3)
                            <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($product->Gold_Price)}}</span>
                        @elseif($user && $userPackage === 4)
                            <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($product->Platinum_Price)}}</span>
                        @elseif($user)
                            <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($product->Discount_Price)}}</span>
                        @endif
                    </div>
                </div>
                <p class="prdouct-content">{{langConverter($product->en_About,$product->fr_About)}}</p>
                <ul class="prdouct-btn-wrapper d-flex align-items-center">
                    <li class="single-product-btn">
                       ////// <a href="javascript:void(0)" title="{{__('Add To Cart')}}" class="add-cart addCart" data-id="{{$product->id}}" @if(!$user) style="pointer-events: none; cursor: default;" @endif>{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                    </li>
                    <li class="single-product-btn">
                        <a class="addCompare product-btn MyWishList" title="{{__('Add To Wishlist')}}" data-id="{{$product->id}}"><i class="icon flaticon-like"></i></a>
                    </li>
                    <!-- <li class="single-product-btn">
                        <a class="addToWishlist product-btn CompareList" data-id="{{$product->id}}" title="{{__('Add To Compare')}}"><i class="icon flaticon-bar-chart"></i></a>
                    </li> -->
                </ul>
            </div>
        </div>
    @endforeach
</div>
