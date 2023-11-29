<div class="product-list">

    @php
        $user = auth()->check();
        $installer = $user ? auth()->user()->is_installer : 0;
        $userPackage = $user ? auth()->user()->package_id : 0;
    @endphp

     <div class="row">
                            @foreach($filters as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="single-grid-product">
                                        <div class="product-top">
                                            
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
                                        <div class="product-info text-center">
                                            
                                            <input type="hidden" name="quantity" value="1" id="product_quantity">
                                             @if($product->is_retail_price)
                                                <div style="height: 85px;">
                                             @else
                                                <div style="height: 115px;">
                                             @endif
                                            
                                            <h3 class="product-name">
                                            
                                                    <a class="product-link" href="{{route('single.product',$product->en_Product_Slug)}}">{{ langConverter($product->en_Product_Name,$product->fr_Product_Name)}}</a>
                                               
                                            </h3>
                                        </div>
                                                <!-- This is server side code. User can not modify it. -->
                                                {!!  productReview($product->id) !!}
                                            <div class="product-price">
                                               <!--  @if($user && $product->Discount > 0)
                                                    <span class="regular-price"> {{currencyConverter($product->Price)}}</span>
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
                                                   <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($product->Bronze_Price)}}</span> 
    
                                                @endif
                                            @endif    
                                            </div>  
                                                {{--                                            <div class="variable-single-item color-switch">--}}
                                                {{--                                                <div class="product-variable-color">--}}
                                                {{--                                                    @foreach($product->colors as $color)--}}
                                                {{--                                                        <label>--}}
                                                {{--                                                            <input type="hidden" name="colorId" value="{{$color->id}}">--}}
                                                {{--                                                            <input name="productColor" class="color-select" type="radio" value="{{$color->id}}">--}}
                                                {{--                                                            <span style="background:{{$color->ColorCode}};"></span>--}}
                                                {{--                                                        </label>--}}
                                                {{--                                                    @endforeach--}}
                                                {{--                                                </div>--}}
                                                {{--                                            </div>--}}
                                                                                                <input type="hidden" name="quantity" value="1" id="product_quantity">
                                                {{--                                            <ul class="size-switch">--}}
                                                {{--                                                @foreach($product->sizes as $item)--}}
                                                {{--                                                    <input type="hidden"  class="sizeValue" name="productSize" value="{{$item->Size}}">--}}
                                                {{--                                                    <li class="single-size activeSize" data-size="{{$item->id}}">{{$item->Size}}</li>--}}
                                                {{--                                                @endforeach--}}
                                                {{--                                            </ul>--}}


                                                 @if($product->is_called==0)  
                                            <a href="javascript:void(0)" title="{{__('Add to cart')}}" class="add-cart addCart" data-id="{{$product->id}}" @if(!$user) style="pointer-events: none; cursor: default;" @endif>{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                                            @endif
                                            @if(!$user)
                                            <spam>Login to see discounted price</spam>
                                            @endif



                                         
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>



 
</div>
<script src="{{asset('frontend/assets/js/common.js')}}"></script>
