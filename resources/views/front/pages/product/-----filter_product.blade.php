<div class="product-list">

    @php
        $user = auth()->check();
        $installer = $user ? auth()->user()->is_installer : 0;
        $userPackage = $user ? auth()->user()->package_id : 0;
    @endphp
    
    <div class="row">
        @foreach($filters as $product)
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-grid-product" style="margin-bottom: 80px;">
                    <div class="row">
                        <div class="product-top col-lg-6 col-md-6 col-sm-6">
                            
                                                <a href="{{route('single.product',$product->en_Product_Slug)}}">
                                                    <img class="product-thumbnal" src="{{asset(ProductImage().$product->Primary_Image)}}" alt="product" style="height: 300px;" />
                                                </a>
                            <ul class="prdouct-btn-wrapper">
                                <!-- <li class="single-product-btn">
                                    <a class="addToWishlist product-btn CompareList" data-id="{{$product->id}}" title="{{__('Add To Compare')}}"><i class="icon flaticon-bar-chart"></i></a>
                                </li> -->
                                <li class="single-product-btn">
                                    <a class="addCompare product-btn MyWishList" data-id="{{$product->id}}" title="{{__('Add To Wishlist')}}"><i class="icon flaticon-like"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-info col-lg-6 col-md-6 col-sm-6">
                            @foreach($product->product_tags as $ppt)
                                <h4 class="product-catagory">{{$ppt->tag}}</h4>
                            @endforeach
                            <input type="hidden" name="quantity" value="1" id="product_quantity">
                            <h6 class="product-name">
                                
                                 <a class="product-link" href="{{route('single.product',$product->en_Product_Slug)}}">{{ langConverter($product->en_Product_Name,$product->fr_Product_Name)}}</a>
                            </h6>
                                <!-- This is server side code. User can not modify it. -->
                                {!!  productReview($product->id) !!}
                            <div class="product-price">
                            <!--     @if($user && $product->Discount > 0)
                                    <span class="regular-price">{{currencySymbol()[currency()]}}{{currencyConverter($product->Price)}}</span>
                                @endif -->
                                <span class="regular-price"> </span>
                            @if($product->is_retail_price)      
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
                                @else 
                                    <a href="{{route('user.sign.in')}}">Login to see price</a>
                                @endif
                             @endif    
                            </div>
                            <a href="javascript:void(0)" title="{{__('Add To Cart')}}" class="add-cart addCart" data-id="{{$product->id}}" @if(!$user) style="pointer-events: none; cursor: default; width: 70%; height: 4rem;" @endif>{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="{{asset('frontend/assets/js/common.js')}}"></script>
