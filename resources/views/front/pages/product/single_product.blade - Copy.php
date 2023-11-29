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
                <h2 class="page-title">{{__('Product Single Page')}}</h2>
                <ul class="breadcrumb-pages">
                    <li class="page-item"><a class="page-item-link" href="{{route('front')}}">{{__('Home')}}</a></li>
                    <li class="page-item">{{__('Product Single Page')}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end here  -->

    <!-- product-single-area start here  -->
    <div class="product-single-area section-top">
        <div class="container">
            <div class="product-single-details">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-single-left">
                            <div class="product-thumbnail-image">
                                <ul class="product-thumb-silide slider slider-nav">
                                    <li class="single-item"><img class="single-item-image" src="{{asset(ProductImage().$products->Primary_Image)}}" alt="{{__('product')}}" /></li>
                                   @if($products->Image4) <li class="single-item"><img class="single-item-image" src="{{asset(ProductImage().$products->Image4)}}" alt="{{__('product')}}" /></li>@endif
                                   @if($products->Image3) <li class="single-item"><img class="single-item-image" src="{{asset(ProductImage().$products->Image3)}}" alt="{{__('product')}}" /></li>@endif
                                   @if($products->Image5) <li class="single-item"><img class="single-item-image" src="{{asset(ProductImage().$products->Image5)}}" alt="{{__('product')}}" /></li>@endif
                                   @if($products->Image2) <li class="single-item"><img class="single-item-image" src="{{asset(ProductImage().$products->Image2)}}" alt="{{__('product')}}" /></li>@endif
                                </ul>
                            </div>
                            <div class="product-slier-big-image">
                                <div class="product-priview-slide slider slider-for">
                                    <div class="single-slide">
                                       <a href="https://cleanpowerstore.com/uploaded_files/product_image/{{$products->Primary_Image}}" target="_blank"> <img class="slide-image" src="{{asset(ProductImage().$products->Primary_Image)}}" alt="{{__('product')}}" /></a>
                                    </div>
                                    <div class="single-slide">
                                         <a href="https://cleanpowerstore.com/uploaded_files/product_image/{{$products->Image4}}" target="_blank"> <img class="slide-image" src="{{asset(ProductImage().$products->Image4)}}" alt="{{__('product')}}" /></a>
                                    </div>
                                    <div class="single-slide">
                                         <a href="https://cleanpowerstore.com/uploaded_files/product_image/{{$products->Image3}}" target="_blank"> <img class="slide-image" src="{{asset(ProductImage().$products->Image3)}}" alt="{{__('product')}}" /></a>
                                    </div>
                                    <div class="single-slide">
                                         <a href="https://cleanpowerstore.com/uploaded_files/product_image/{{$products->Image5}}" target="_blank"> <img class="slide-image" src="{{asset(ProductImage().$products->Image5)}}" alt="{{__('product')}}" /></a>
                                    </div>
                                    <div class="single-slide">
                                         <a href="https://cleanpowerstore.com/uploaded_files/product_image/{{$products->Image2}}" target="_blank"> <img class="slide-image" src="{{asset(ProductImage().$products->Image2)}}" alt="{{__('product')}}" /></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-single-right">
                            <div class="product-info">
                                @foreach($products->product_tags as $ppt)
                                    <h4 class="product-catagory">{{$ppt->name}}</h4>
                                @endforeach

                                <h3 class="product-name">{{langConverter($products->en_Product_Name,$products->fr_Product_Name)}}</h3>
                                    <!-- This is server side code. User can not modify it. -->
                                    {!!  productReview($products->id) !!}

                                   

                                <div class="product-price">
                                    @if($user && $products->Discount > 0)
                                        <span class="regular-price">{{currencySymbol()[currency()]}}{{currencyConverter($products->Price)}}</span>
                                    @endif

                                    @if($user && $userPackage === 0)
                                        <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($products->Price)}}</span>
                                    @elseif($user && $userPackage === 1)
                                        <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($products->Bronze_Price)}}</span>
                                    @elseif($user && $userPackage === 2)
                                        <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($products->Silver_Price)}}</span>
                                    @elseif($user && $userPackage === 3)
                                        <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($products->Gold_Price)}}</span>
                                    @elseif($user && $userPackage === 4)
                                        <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($products->Platinum_Price)}}</span>
                                    @elseif($user)
                                        <span class="price">{{currencySymbol()[currency()]}}{{currencyConverter($products->Discount_Price)}}</span>
                                    @endif
                                </div>

                                <p class="note-text">{{langConverter($products->en_About,$products->fr_About)}}</p>

                                <div class="product-color-area">
                                    <div class="variable-single-item color-switch">
                                        <div class="product-variable-color">
                                            @foreach($products->colors as $color)
                                                <label>
                                                    <input type="hidden" name="colorId" value="{{$color->id}}">
                                                    <input name="productColor" class="color-select" type="radio" value="{{$color->id}}">
                                                    <span style="background:{{$color->ColorCode}};"></span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="product-size-area">
                                    <h4 class="size-title">{{__('Type:')}} {{productTypeText($products->id)}}</h4>
                                    <ul class="size-switch">
                                        @foreach($products->sizes as $item)
                                            <input type="hidden"  class="sizeValue" name="productSize" value="{{$item->id}}">
                                            <li class="single-size activeSize" data-size="{{$item->id}}">{{$item->Size}}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                @if($products->Quantity=='' || $products->Quantity==0)
                                <div class="prdouct-btn-wrapper d-flex align-items-center"><h3>Out of Stock</h3></div>
                               
                                @else
                                    
                                    <div class="prdouct-btn-wrapper d-flex align-items-center">
                                    <div class="cart-plus-minus">
                                        <div class="dec qtybutton btn">-</div>
                                             <input class="cart-plus-minus-box" type="text" name="qtybutton" id="product_quantity" value="1" readonly />
                                        <div class="inc qtybutton btn">{{__('+')}}</div>
                                    </div>
                                    <a class="addCompare product-btn MyWishList" data-id="{{$products->id}}" title="{{__('Add To Wishlist')}}"><i class="icon flaticon-like"></i></a>
                                    <!-- <a class="addToWishlist product-btn CompareList" data-id="{{$products->id}}" title="{{__('Add To Compare')}}"><i class="icon flaticon-bar-chart"></i></a> -->
                                     </div>

                                           @if($user)
                                <div class="product-bottom-button d-flex">
                                    <a href="javascript:void(0)" class="primary-btn buyNow" data-id="{{$products->id}}">{{__('Buy Now')}}</a>
                                    <a href="javascript:void(0)" title="{{__('Add To Cart')}}" class="add-cart addCart" data-id="{{$products->id}}" @if(!$user) style="pointer-events: none; cursor: default;" @endif>{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                                     @else
                                        @if($products->is_retail_price==1)
                                            <span class="price_new">{{currencySymbol()[currency()]}}{{currencyConverter($products->Price)}}</span> <br>
                                        @else
                                            <h3 style="    font-size: 28px;color: red;">Please login to get Price</h3>
                                        @endif
                                @endif



                                @endif


                               



                               



                            </div>
                            @if($products->Spec_Sheet)
                            <div class="product-right-bottom"> 
                                   Please download spcifcation sheet:                                                    
                                   <a target="_blank" class="btn btn-primary btn-lg" href="{{url('uploaded_files/spec_sheets/')}}/{{$products->Spec_Sheet}}">Download </a>
                            </div>
                            @endif

                            @if($products->Spec_Sheet2)
                            <div class="product-right-bottom"> 
                                   Please download spcifcation sheet2:                                                    
                                   <a target="_blank" class="btn btn-primary btn-lg" href="{{url('uploaded_files/spec_sheets/')}}/{{$products->Spec_Sheet2}}">Download </a>
                            </div>
                            @endif

                            @if($products->Spec_Sheet3)
                            <div class="product-right-bottom"> 
                                   Please download spcifcation sheet3:                                                    
                                   <a target="_blank" class="btn btn-primary btn-lg" href="{{url('uploaded_files/spec_sheets/')}}/{{$products->Spec_Sheet3}}">Download </a>
                            </div>
                            @endif

                            @if($products->Spec_Sheet4)
                            <div class="product-right-bottom"> 
                                  Installation manual 
                                    <a target="_blank" class="btn btn-primary btn-lg" href="{{url('uploaded_files/spec_sheets/')}}/{{$products->Spec_Sheet4}}">Download </a>
                            </div>
                            @endif

                           {{--   <div class="product-right-bottom">
                                <ul class="features">
                                    <li class="single-feature"><img class="icon" src="{{asset('frontend/assets/images/delivery-van-icon.svg')}}" alt="icon" /><strong class="feature-title">{{__('Estimated Delivery:')}}</strong><span class="feature-text">{{allsetting()['estimating_delivery']}}</span></li>
                                    <li class="single-feature"><img class="icon" src="{{asset('frontend/assets/images/shipping-return.svg')}}" alt="icon" /><strong class="feature-title">{{(__('Shipping Charge:'))}}</strong><span class="feature-text">{{__('On all orders over')}} {{currencySymbol()[currency()]}}{{currencyConverter(allsetting()['shipping_charge'])}}</span></li>
                                </ul>
                                <div class="guarantee-checkout-area">
                                    <h3 class="guarantee-title">{{__('Guarantee safe & secure checkout')}}</h3>
                                    <img src="{{asset(IMG_FOOTER_PATH.$allsettings['news_letter_img'])}}" alt="payment-method-image" />
                                </div>
                                <div class="share-area mt-30">
                                    <h3 class="share-title">{{__('SHARE:')}}</h3>
                                    <ul class="social-media a2a_kit">
                                        <li class="media-item"><a class="media-link facebook a2a_button_facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="media-item"><a class="media-link twitter a2a_button_twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                        <li class="media-item"><a class="media-link linkedin a2a_button_linkedin" href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="media-item"><a class="media-link pinterest a2a_button_pinterest" href="javascript:void(0)"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-bottom-info mt-50">
                <div class="nav-tabs-menu">
                    <ul class="nav nav-tabs" id="ProductTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Description-tab" data-bs-toggle="tab" data-bs-target="#Description" type="button" role="tab" aria-controls="Description" aria-selected="true">
                                {{__('Description')}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Reviews-tab" data-bs-toggle="tab" data-bs-target="#Reviews" type="button" role="tab" aria-controls="Reviews" aria-selected="false">
                                {{__('Reviews')}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Shipping-Return-tab" data-bs-toggle="tab" data-bs-target="#Shipping-Return" type="button" role="tab" aria-controls="Shipping-Return" aria-selected="false">
                                {{__('Shipping & Return')}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Additional-Information-tab" data-bs-toggle="tab" data-bs-target="#Additional-Information" type="button" role="tab" aria-controls="Additional-Information" aria-selected="false">
                                {{__('Additional Information')}}</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="ProductTabContent">

                    <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                        <div class="product-description">
                            {!! clean(langConverter($products->en_Description,$products->fr_Description)) !!}
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                        <div class="product-reviews">
                            <div class="review-top">
                                <div class="review-top-left">
                                    <span class="review-point">{{productReviewNumber($products->id)}}</span>
                                    <!-- This is server side code. User can not modify it. -->
                                    {!!  productReview($products->id) !!}
                                    <span class="review-count">{{productReviewerNumber($products->id)}} {{__('Reviews')}}</span>
                                </div>
                            </div>

                            <div class="reviews-list">
                                @forelse($products->product_reviews as $review)
                                    <div class="single-review">
                                        <div class="reviewer">
                                            <div class="reviewer-wrap">
                                                <img class="reviewer-image" src="{{isset($review->user->image) ? asset(AdminProfilePicture().$review->user->image) : Avatar::create($review->user->name)->toBase64()}}" alt="reviewer-image" />
                                                <h4 class="reviewer-name">{{$review->user->name}}</h4>
                                            </div>
                                        </div>
                                        <div class="review-middle">
                                            <!-- This is server side code. User can not modify it. -->
                                            {!!  reviewRating($review->id) !!}
                                            <span class="remiew-time">{{\Carbon\Carbon::parse($review->created_at)->diffForHumans()}}</span>
                                        </div>
                                        <h4 class="review-meta"><span class="time">{{\Carbon\Carbon::parse($review->created_at)->format('jS M Y')}} </span> by <a class="author" href="javascript:void(0)">{{$review->user->name}}</a></h4>
                                        <p class="review-text">{{$review->feedback}}</p>
                                    </div>
                                @empty
                                    <h1>{{__('No Review Yet!')}}</h1>
                                @endforelse

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Shipping-Return" role="tabpanel" aria-labelledby="Shipping-Return-tab">
                        <div class="shipping-return-area">
                            {!! clean(langConverter($products->en_ShippingReturn,$products->fr_ShippingReturn)) !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Additional-Information" role="tabpanel" aria-labelledby="Additional-Information-tab">
                        {!! clean(langConverter($products->en_AdditionalInformation,$products->fr_AdditionalInformation)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-single-area end here  -->

    <!-- Featured Products area start here  -->
    <div class="featured-productss-area section-top pb-100">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">{{__('Similar Products')}}</h3>
                        <h2 class="section-title">{{__('Related Products')}}</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="{{route('all.product')}}" class="see-btn">{{__('See All')}}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($similar_product as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-grid-product">
                        <div class="product-top">
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
                            <ul class="prdouct-btn-wrapper">
                                <!-- <li class="single-product-btn">
                                    <a class="addToWishlist product-btn MyWishList" data-id="{{$products->id}}" href="javascript:void(0)" title="{{__('Add To Compare')}}"><i class="icon flaticon-bar-chart"></i></a>
                                </li> -->
                                <li class="single-product-btn">
                                    <a class="addCompare product-btn CompareList" data-id="{{$products->id}}" href="javascript:void(0)" title="{{__('Add To Wishlist')}}"><i class="icon flaticon-like"></i></a>
                                </li>
                            </ul>
                        </div>


                        <div class="product-info text-center">
                            @foreach($product->product_tags as $ppt)
                                <h4 class="product-catagory">{{$ppt->tag}}</h4>
                            @endforeach
                                <h3 class="product-name">
                                    @if($user)
                                        <a class="product-link" href="{{route('single.product',$product->en_Product_Slug)}}">{{substr(langConverter($product->en_Product_Name,$product->fr_Product_Name),0,26)}}</a>
                                    @else
                                        {{substr(langConverter($product->en_Product_Name,$product->fr_Product_Name),0,26)}}
                                    @endif
                                </h3>

                                       @if(!$user && $products->is_retail_price==1)
                                         <span class="price_new">{{currencySymbol()[currency()]}}{{currencyConverter($products->Price)}}</span> <br>
                                      @endif 
                                <!-- This is server side code. User can not modify it. -->
                                {!!  productReview($product->id) !!}
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
                            <a href="javascript:void(0)" title="{{__('Add To Cart')}}" class="add-cart addCart" data-id="{{$products->id}}" @if(!$user) style="pointer-events: none; cursor: default;" @endif>{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                    <h1>{{__('No related product found!')}}</h1>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Featured Products area end here  -->

    <!-- Page Load Popup Modal End -->
    <div id="DoNotSubscribe" data-url="{{ route('do.not.subscribe') }}"></div>
    <div id="SubscribeStore" data-url="{{route('admin.subscribe.store')}}"></div>
    <div id="AddToCompareListItem" data-url="{{route('compare.list')}}"></div>
    <div id="AddToCartIntoSession" data-url="{{ route('add.to.cart') }}"></div>
    <div id="buyNow" data-url="{{ route('buy.now') }}"></div>
    <div id="buyNowCheckOut" data-url="{{ route('checkout') }}"></div>
    <div id="productWishlist" data-url="{{route('product.wishlist')}}"></div>
    @push('post_script')
        <script src="{{asset('frontend/assets/js/pages/single_product.js')}}"></script>
    @endpush()
@endsection


<style>
    .product-single-area .product-single-left .product-slier-big-image .product-priview-slide .single-slide .slide-image{
        width: 100%;
        height: 91%!important;
    }
    .single-slide slick-slide{width: 670px!important;}
   
</style>