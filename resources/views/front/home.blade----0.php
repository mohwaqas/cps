@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')
    <!-- hero-section area start here  -->
    @php
        $user = auth()->check();
        $installer = $user ? auth()->user()->is_installer : 0;
        $userPackage = $user ? auth()->user()->package_id : 0;
    @endphp

    <div class="hero-section">
        <div class="hero-slider">
            @foreach($sliders as $slider)
            <div class="signle-slide" style="background-image: url('{{asset(SliderImage().$slider->Background_Image)}}'); height: 490px;">
                    <div class="inner-container">
                     <p class="slider_inner">Long Term investment in Solar energy can provide green and renewable electricity for decades</p>
                            <div class="slider-btn">
                                    <a href="{{route('all.product')}}" class="secondary-btn">{{langConverter($slider->en_Button_Text,$slider->fr_Button_Text)}} <i class="iocn flaticon-right-arrow"></i></a>
                                </div>
                     </div>           





             <!--    <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-6">
                            <p class="slider_inner">Long Term investment in Solar energy can provide green and renewable electricity for decades</p>
                            <div class="slider-btn">
                                    <a href="{{route('all.product')}}" class="secondary-btn">{{langConverter($slider->en_Button_Text,$slider->fr_Button_Text)}} <i class="iocn flaticon-right-arrow"></i></a>
                                </div>
                            <div class="hero-slider-content text-center">
                                <h2 class="slider-sub-title">{{langConverter($slider->en_Sub_Title,$slider->fr_Sub_Title)}}</h2>
                                <h1 class="slider-title">{{langConverter($slider->en_Title,$slider->fr_Title)}}</h1>
                                <p class="slider-text">{{langConverter($slider->en_Description,$slider->fr_Description)}}</p>
                                <div class="slider-btn">
                                    <a href="{{route('all.product')}}" class="secondary-btn">{{langConverter($slider->en_Button_Text,$slider->fr_Button_Text)}} <i class="iocn flaticon-right-arrow"></i></a>
                                </div>
                            </div> 
                        </div>
                         <div class="col-lg-5 offset-lg-1 col-6">
                         <div class="hero-slider-image text-center">
                                <img class="hero-image img-fluid" src="{{asset(SliderImage().$slider->Thumbnail)}}" alt="hero-banner-image" />
                            </div> 
                        </div> 
                    </div>
                </div> -->


            </div>
            @endforeach
        </div>
    </div>
    <!-- hero-section area end here  -->

    <!-- brads area start here  -->
  <!--   <div class="brads-area">
        <div class="container">
            <div class="brads-slide">
                @foreach($brands as $brand)
                <div class="sigle-brad">
                    <img src="{{asset(BrandImage().$brand->BrandImage)}}" alt="brad image"/>
                </div>
                @endforeach
            </div>
        </div>
    </div> -->
    <!-- brads area start here  -->

    <!-- Popular Categories area start here  -->
   <!--  <div class="popular-categories-area section-bg section-top pb-100">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">{{langConverter(siteContentHomePage('many_goods')->en_Title,siteContentHomePage('many_goods')->fr_Title)}}</h3>
                        <h2 class="section-title">{{langConverter(siteContentHomePage('many_goods')->en_Description_One,siteContentHomePage('many_goods')->fr_Description_One)}}</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="{{route('all.product')}}" class="primary-btn">{{__('View All Products')}}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach(Category_Des_Icon() as $item)
                    <div class="col-lg-4 col-md-6">
                        <a class="single-categorie" href="{{route('category.product',$item->id)}}">
                            <div class="categorie-wrap">
                                <div class="categorie-icon">
                                    <i class="{{$item->Category_Icon}}"></i>
                                </div>
                                <div class="categorie-info">
                                    <h3 class="categorie-name">{{langConverter($item->en_Category_Name,$item->fr_Category_Name)}}</h3>
                                    <h4 class="categorie-subtitle">{{ langConverter($item->en_Description,$item->fr_Description) }}</h4>
                                </div>
                            </div>
                            <i class="arrow flaticon-right-arrow"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div> -->
    <!-- Popular Categories area end here  -->




<section class="section loan-steps bg-tertiary">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-7">
                <div class="section-title text-center">                  
                    <h1>We are offering very good discounted package for your purchase and get advantages</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row justify-content-center">
                    <div class="step-item col-lg-4 col-md-6">
                        <div class="text-center">
                            <p class="count">01</p>
                            <h3 class="mb-3">Silver</h3>
                            <p class="mb-0">Marketplace plans get the discount upto 50%</p>
                        </div>
                    </div>
                    <div class="step-item col-lg-4 col-md-6">
                        <div class="text-center">
                            <p class="count">02</p>
                            <h3 class="mb-3">Gold</h3>
                            <p class="mb-0">marketplace plans get the discount upto 55%</p>
                        </div>
                    </div>
                    <div class="step-item col-lg-4 col-md-6">
                        <div class="text-center">
                            <p class="count">03</p>
                            <h3 class="mb-3">Platenium</h3>
                            <p class="mb-0">marketplace plans get the discount upto 60%</p>
                        </div>
                    </div>
                  <!--   <div class="step-item col-lg-3 col-md-6">
                        <div class="text-center">
                            <p class="count">04</p>
                            <h3 class="mb-3">Platenium</h3>
                            <p class="mb-0">Lorem ipsum dolor, consectetur adipiscing. Id egestas sceleriue dui id sed velit facsi eget. Magnis etra.</p>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</section>













    <!-- Featured Products area start here  -->
    <div class="featured-productss-area" style="margin-top:-50px">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                       <!--  <h3 class="sub-title">{{langConverter(siteContentHomePage('products')->en_Title,siteContentHomePage('products')->fr_Title)}}</h3>
                        <h2 class="section-title">{{langConverter(siteContentHomePage('products')->en_Description_One,siteContentHomePage('products')->fr_Description_One)}}</h2> -->
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="{{route('all.product')}}" class="see-btn">{{__('See All')}}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                               
                                        <a href="{{route('single.product',$product->en_Product_Slug)}}">
                                            <img class="product-thumbnal" src="{{asset(ProductImage().$product->Primary_Image)}}" alt="{{__('product')}}" height="400px" />
                                        </a>
                                   
                                    <ul class="prdouct-btn-wrapper">
                                        <!-- <li class="single-product-btn">
                                            <a class="addToWishlist product-btn CompareList" data-id="{{$product->id}}" title="{{__('Add To Compare')}}"><i class="icon flaticon-bar-chart"></i></a>
                                        </li> -->
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn MyWishList" data-id="{{$product->id}}"  title="{{__('Add To Wishlist')}}"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    @foreach($product->product_tags as $ppt)
                                        <h4 class="product-catagory">{{$ppt->tag}}</h4>
                                    @endforeach
                                        <input type="hidden" name="quantity" value="1" id="product_quantity">
                                    <h3 class="product-name">
                                       
                                            <a class="product-link" href="{{route('single.product',$product->en_Product_Slug)}}">{{substr(langConverter($product->en_Product_Name,$product->fr_Product_Name),0,26)}}</a>
                                         
                                    </h3>
                                      @if(!$user && $product->is_retail_price==1)
                                         <span class="price_new">{{currencySymbol()[currency()]}}{{currencyConverter($product->Price)}}</span> <br>
                                      @endif 

                                        <!-- This is server side code. User can not modify it. -->
                                        <!-- {!!  productReview($product->id) !!} -->
                                        {{substr(strip_tags($product->en_AdditionalInformation),0,28)}}
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
                                    <a href="javascript:void(0)" title="{{__('Add To Cart')}}" class="add-cart addCart" @if(!$user) style="pointer-events: none; cursor: default;" @endif data-id="{{$product->id}}">{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                @endforeach

            </div>
        </div>
    </div>




<div class="our-features-area section-top pb-100">
        <div class="container">
            <div class="section-header-area text-center">
                <h3 class="sub-title">Our Features</h3>
                <h2 class="section-title">Why Choose Us</h2>
            </div>
                    <div class="row our-features-area-wrap">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="single-features text-center">
                                <div class="features-icon">
                                    <img src="https://cleanpowerstore.com/uploaded_files/about_us_page/features-icon-1.png" alt="features-icon">
                                </div>
                                <h3 class="features-title">Introduction</h3>
                                <p class="features-content">Clean Power Store created by the industry’s leading solar pioneers to reduce solar costs. Clean Power Store fulfill their vow to get you powered by nature with high quality solar hybrid products ranging from solar panels, inverters, meters, fuses, charge controllers, batteries, and solar grid tie kits to all sorts of accessories.<br></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="single-features text-center">
                                <div class="features-icon">
                                    <img src="https://cleanpowerstore.com/uploaded_files/about_us_page/features-icon-2.png" alt="features-icon">
                                </div>
                                <h3 class="features-title">Team Work of Installers</h3>
                                <p class="features-content">We believe in developing and collaborating with our partners at Clean Power store. Our robust online presence and real-time customer support have made it much simpler for you to easily access product details, position orders and handle the solar projects. In the US, we have built our relationships with installers.<br></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="single-features text-center">
                                <div class="features-icon">
                                    <img src="https://cleanpowerstore.com/uploaded_files/about_us_page/features-icon-3.png" alt="features-icon">
                                </div>
                                <h3 class="features-title">Reliable Services</h3>
                                <p class="features-content">We have experienced team who are capable of resolving the issue in time. Clean Power Store is your reliable and clean energy collaborator from your first conversation through to design and even after the device has been built – it offers you flexibility and confidence.<br></p>
                            </div>
                        </div>

                         <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="single-features text-center">
                                <div class="features-icon">
                                    <img src="https://cleanpowerstore.com/uploaded_files/about_us_page/features-icon-3.png" alt="features-icon">
                                </div>
                                <h3 class="features-title">Reliable Services</h3>
                                <p class="features-content">We have experienced team who are capable of resolving the issue in time. Clean Power Store is your reliable and clean energy collaborator from your first conversation through to design and even after the device has been built – it offers you flexibility and confidence.<br></p>
                            </div>
                        </div>
                    </div>
                
        </div>
    </div>


    <!-- Featured Products area end here  -->

    <!-- About Area start here  -->
    <!-- <div class="about-area section">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">{{langConverter(siteContentHomePage('about_us')->en_Title,siteContentHomePage('about_us')->fr_Title)}}</h3>
                        <h2 class="section-title">{!! clean(langConverter(siteContentHomePage('about_us')->en_Description_One,siteContentHomePage('about_us')->fr_Description_One)) !!}</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="{{route('about.us')}}" class="primary-btn">{{__('Know More About Us')}}</a>
                    </div>
                </div>
            </div>
            <div class="story-box-slide">
                @foreach($story as $item)
                <div class="single-story-box">
                    <h3 class="story-title">{{__('Story Of')}} <span class="story-year">{{$item->Year}}</span></h3>
                    <p class="story-content">{{langConverter($item->en_Description,$item->fr_Description)}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div> -->
    <!-- About Area  end here  -->

    <!-- Trending Products area start here  -->
    <div class="trending-products-area  pb-100">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="sub-title">{{langConverter(siteContentHomePage('popular_products')->en_Title,siteContentHomePage('popular_products')->fr_Title)}}</h3>
                        <h2 class="section-title">{{ langConverter(siteContentHomePage('popular_products')->en_Description_One,siteContentHomePage('popular_products')->fr_Description_One) }}</h2>
                    </div>
                    <div class="col-lg-6 align-self-end text-lg-end">
                        <div class="primary-tabs">
                            <ul class="nav nav-tabs" id="TrendingProducts" role="tablist">
                                @if ($allsettings['new_arrival'] == ACTIVE)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{$allsettings['new_arrival'] == ACTIVE ? 'active' : ''}}" id="new-arrival-tab" data-bs-toggle="tab" data-bs-target="#new-arrival" type="button" role="tab" aria-controls="new-arrival" aria-selected="true">{{__('NEW ARRIVAL')}}</button>
                                    </li>
                                @endif
                                @if ($allsettings['best_selling'] == ACTIVE)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{$allsettings['new_arrival'] == INACTIVE && $allsettings['best_selling'] == ACTIVE ? 'active' : ''}}" id="best-selling-tab" data-bs-toggle="tab" data-bs-target="#best-selling" type="button" role="tab" aria-controls="best-selling" aria-selected="false">{{__('BEST SELLING')}}</button>
                                    </li>
                                @endif
                                @if ($allsettings['on_sale'] == ACTIVE)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{$allsettings['new_arrival'] == INACTIVE && $allsettings['best_selling'] == INACTIVE && $allsettings['on_sale'] == ACTIVE ? 'active' : ''}}" id="on-sell-tab" data-bs-toggle="tab" data-bs-target="#on-sell" type="button" role="tab" aria-controls="on-sell" aria-selected="false">{{__('ON SALE')}}</button>
                                    </li>
                                @endif
                                @if ($allsettings['featured_items'] == ACTIVE)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{$allsettings['new_arrival'] == INACTIVE && $allsettings['best_selling'] == INACTIVE && $allsettings['on_sale'] == INACTIVE && $allsettings['featured_items'] == ACTIVE ? 'active' : ''}}" id="featured-items-tab" data-bs-toggle="tab" data-bs-target="#featured-items" type="button" role="tab" aria-controls="featured-items" aria-selected="false">{{__('FEATURED ITEMS')}}</button>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="TrendingProductsContent">
                @if ($allsettings['new_arrival'] == ACTIVE)
                    <div class="tab-pane fade {{$allsettings['new_arrival'] == ACTIVE ? 'show active' : ''}}" id="new-arrival" role="tabpanel" aria-labelledby="new-arrival-tab">
                        <div class="row">
                            @foreach($new_arrivals as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="single-grid-product">
                                            <div class="product-top">
                                                @if($user)
                                                    <a href="{{route('single.product',$product->en_Product_Slug)}}"><img class="product-thumbnal" src="{{asset(ProductImage().$product->Primary_Image)}}" alt="{{__('product')}}" /></a>
                                                @else
                                                    <img class="product-thumbnal" src="{{asset(ProductImage().$product->Primary_Image)}}" alt="{{__('product')}}" />
                                                @endif
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
                                                @foreach($product->product_tags as $pptn)
                                                    <h4 class="product-catagory">{{$pptn->tag}}</h4>
                                                @endforeach
                                                <input type="hidden" name="quantity" value="1" id="product_quantity">
                                                <h3 class="product-name">
                                                    @if($user)
                                                        <a class="product-link" href="{{route('single.product',$product->en_Product_Slug)}}">{{substr(langConverter($product->en_Product_Name,$product->fr_Product_Name),0,26)}}</a>
                                                    @else
                                                        {{substr(langConverter($product->en_Product_Name,$product->fr_Product_Name),0,26)}}
                                                    @endif
                                                </h3>

                                                   @if(!$user && $product->is_retail_price==1)
                                                         <span class="price_new">{{currencySymbol()[currency()]}}{{currencyConverter($product->Price)}}</span> <br>
                                                      @endif 


                                                <!-- This is server side code. User can not modify it. -->
                                                {!!  productReview($product->id) !!}
                                                <div class="product-price">
                                                    @if($user && $product->Discount > 0)
                                                        <span class="regular-price">{{currencySymbol()[currency()]}} {{currencyConverter($product->Price)}}</span>
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
                                                <a href="javascript:void(0)" title="{{__('Add To Cart')}}" class="add-cart addCart" data-id="{{$product->id}}" @if(!$user) style="pointer-events: none; cursor: default;" @endif>{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if ($allsettings['best_selling'] == ACTIVE)
                     <div class="tab-pane fade {{$allsettings['new_arrival'] == INACTIVE && $allsettings['best_selling'] == ACTIVE ? 'show active' : ''}}" id="best-selling" role="tabpanel" aria-labelledby="best-selling-tab">
                            <div class="row">
                                @foreach($best_sellings as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="single-grid-product">
                                            <div class="product-top">
                                             
                                                    <a href="{{route('single.product',$product->en_Product_Slug)}}">
                                                        <img class="product-thumbnal" src="{{asset(ProductImage().$product->Primary_Image)}}" alt="{{__('product')}}" />
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
                                                @foreach($product->product_tags as $pptb)
                                                    <h4 class="product-catagory">{{$pptb->tag}}</h4>
                                                @endforeach
                                                <input type="hidden" name="quantity" value="1" id="product_quantity">
                                                <h3 class="product-name">
                                                 
                                                        <a class="product-link" href="{{route('single.product',$product->en_Product_Slug)}}">{{substr(langConverter($product->en_Product_Name,$product->fr_Product_Name),0,26)}}</a>
                                                   
                                                </h3>


                                                   @if(!$user && $product->is_retail_price==1)
                                         <span class="price_new">{{currencySymbol()[currency()]}}{{currencyConverter($product->Price)}}</span> <br>
                                      @endif 
                                                <!-- This is server side code. User can not modify it. -->
                                                {!!  productReview($product->id) !!}
                                                <div class="product-price">
                                                    @if($user && $product->Discount > 0)
                                                        <span class="regular-price">{{currencySymbol()[currency()]}} {{currencyConverter($product->Price)}}</span>
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
                                                <a href="javascript:void(0)" title="{{__('Add To Cart')}}" class="add-cart addCart" data-id="{{$product->id}}" @if(!$user) style="pointer-events: none; cursor: default;" @endif>{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                @endif
                @if ($allsettings['on_sale'] == ACTIVE)
                     <div class="tab-pane fade {{$allsettings['new_arrival'] == INACTIVE && $allsettings['best_selling'] == INACTIVE && $allsettings['on_sale'] == ACTIVE ? 'show active' : ''}}" id="on-sell" role="tabpanel" aria-labelledby="on-sell-tab">
                            <div class="row">
                                @foreach($on_sales as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="single-grid-product">
                                            <div class="product-top">
                                               
                                                    <a href="{{route('single.product',$product->en_Product_Slug)}}}"><img class="product-thumbnal" src="{{asset(ProductImage().$product->Primary_Image)}}" alt="product" /></a>
                                                
                                                <ul class="prdouct-btn-wrapper">
                                                    <!-- <li class="single-product-btn">
                                                        <a class="addToWishlist product-btn CompareList" data-id="{{$product->id}}" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                                    </li> -->
                                                    <li class="single-product-btn">
                                                        <a class="addCompare product-btn MyWishList" data-id="{{$product->id}}" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-info text-center">
                                                @foreach($product->product_tags as $ppto)
                                                    <h4 class="product-catagory">{{$ppto->tag}}</h4>
                                                @endforeach
                                                <input type="hidden" name="quantity" value="1" id="product_quantity">
                                                <h3 class="product-name">
                                                    @if($user)
                                                        <a class="product-link" href="{{route('single.product',$product->en_Product_Slug)}}">{{substr(langConverter($product->en_Product_Name,$product->fr_Product_Name),0,26)}}</a>
                                                    @else
                                                        {{substr($product->en_Product_Name,0,26)}}
                                                    @endif
                                                </h3>

                                                   @if(!$user && $product->is_retail_price==1)
                                         <span class="price_new">{{currencySymbol()[currency()]}}{{currencyConverter($product->Price)}}</span> <br>
                                      @endif 
                                                <!-- This is server side code. User can not modify it. -->
                                                {!!  productReview($product->id) !!}
                                                <div class="product-price">
                                                    @if($user && $product->Discount > 0)
                                                        <span class="regular-price">{{currencySymbol()[currency()]}} {{currencyConverter($product->Price)}}</span>
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
                                                <a href="javascript:void(0)" title="{{__('Add To Cart')}}" class="add-cart addCart" data-id="{{$product->id}}" @if(!$user) style="pointer-events: none; cursor: default;" @endif>{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                @endif
                @if ($allsettings['featured_items'] == ACTIVE)
                     <div class="tab-pane fade {{$allsettings['new_arrival'] == INACTIVE && $allsettings['best_selling'] == INACTIVE && $allsettings['on_sale'] == INACTIVE && $allsettings['featured_items'] == ACTIVE ? 'show active' : ''}}" id="featured-items" role="tabpanel" aria-labelledby="featured-items-tab">
                            <div class="row">
                                @foreach($featured_products as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="single-grid-product">
                                            <div class="product-top">
                                                
                                                    <a href="{{route('single.product',$product->en_Product_Slug)}}">
                                                        <img class="product-thumbnal" src="{{asset(ProductImage().$product->Primary_Image)}}" alt="product" />
                                                    </a>
                                                
                                                   
                                                <ul class="prdouct-btn-wrapper">
                                                    <!-- <li class="single-product-btn">
                                                        <a class="addToWishlist product-btn CompareList" data-id="{{$product->id}}" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                                    </li> -->
                                                    <li class="single-product-btn">
                                                        <a class="addCompare product-btn MyWishList" data-id="{{$product->id}}" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-info text-center">
                                                @foreach($product->product_tags as $pptf)
                                                    <h4 class="product-catagory">{{$pptf->tag}}</h4>
                                                @endforeach
                                                <input type="hidden" name="quantity" value="1" id="product_quantity">
                                                <h3 class="product-name">
                                                    @if($user)
                                                        <a class="product-link" href="{{route('single.product',$product->en_Product_Slug)}}">{{substr(langConverter($product->en_Product_Name,$product->fr_Product_Name),0,26)}}</a>
                                                    @else
                                                        {{substr(langConverter($product->en_Product_Name,$product->fr_Product_Name),0,26)}}
                                                    @endif
                                                </h3>

                                                   @if(!$user && $product->is_retail_price==1)
                                         <span class="price_new">{{currencySymbol()[currency()]}}{{currencyConverter($product->Price)}}</span> <br>
                                      @endif 
                                                <!-- This is server side code. User can not modify it. -->
                                                {!!  productReview($product->id) !!}
                                                <div class="product-price">
                                                    @if($user && $product->Discount > 0)
                                                        <span class="regular-price">{{currencySymbol()[currency()]}} {{currencyConverter($product->Price)}}</span>
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
                                                <a href="javascript:void(0)" title="{{__('Add To Cart')}}" class="add-cart addCart" data-id="{{$product->id}}" @if(!$user) style="pointer-events: none; cursor: default;" @endif>{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Trending Products area end here  -->

    <!-- product banenr area start here  -->
    <!-- <div class="product-banner pb-100">
        <div class="container">
            <div class="row">
                @foreach($promotion as $promo)
                <div class="col-md-5">
                    <a href="#" class="single-banner"><img class="banner-image" src="{{asset(PromotionImage().$promo->Image_One)}}" alt="product-banner" /></a>
                </div>
                <div class="col-md-7">
                    <a href="#" class="single-banner"><img class="banner-image" src="{{asset(PromotionImage().$promo->Image_Two)}}" alt="product-banner" /></a>
                </div>
            </div>
            @endforeach
        </div>
    </div> -->
    <!-- product banner area end here  -->

















    <!-- Blog area start here  -->
<!--     <div class="blog-area section-top section-bg pb-100">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">{{langConverter(siteContentHomePage('blogspot')->en_Title,siteContentHomePage('blogspot')->fr_Title)}}</h3>
                        <h2 class="section-title">{{ langConverter(siteContentHomePage('blogspot')->en_Description_One,siteContentHomePage('blogspot')->fr_Description_One) }}</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="{{route('blog')}}" class="see-btn">{{__('See All')}}</a>
                    </div>
                </div>
            </div>

            <div class="blog-slide">
                @foreach($blogs as $blog)
              
                <div class="single-grid-blog">
                    <div class="blog-thumbnail">
                        <a href="{{route('blog.details',$blog->id)}}"><img class="thumbnail-image" src="{{asset(BlogImage().$blog->Small_Image)}}" alt="blog" /></a>
                    </div>
                    <div class="blog-info">
                        <ul class="blog-category">
                            @foreach($blog->tags as $Item)
                                @foreach($Item->Tag as $n)
                                    <li class="single-category"><a class="category-text" href="{{route('blog.details',$blog->id)}}">{{$n}}</a></li>
                                @endforeach
                            @endforeach
                        </ul>
                        <h3 class="blog-title"><a class="blog-link" href="{{route('blog.details',$blog->id)}}">{{langConverter($blog->en_Title,$blog->fr_Title)}}</a></h3>
                        <p class="blog-content">{!! Str::limit(clean(langConverter($blog->en_Description_Two,$blog->fr_Description_Two)),205) !!}</p>
                        <a class="blog-btn" href="{{route('blog.details',$blog->id)}}l">{{__('See Details')}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> -->
    <!-- Blog area end here  -->

    <!-- Image Gallery area start here  -->
<!--     <div class="image-gallery-area section-top pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-header-area">
                        <h3 class="sub-title">{{langConverter(siteContentHomePage('image_gallery')->en_Title,siteContentHomePage('image_gallery')->fr_Title)}}</h3>
                        <h2 class="section-title">{{ langConverter(siteContentHomePage('image_gallery')->en_Description_One,siteContentHomePage('image_gallery')->fr_Description_One) }}</h2>
                    </div>
                    @foreach($image_gallery as $item)
                        @if ($loop->iteration %3==1)
                            @if($item->Image !='' && $item->Image!=null)
                                <div class="single-gallery {{($loop->index == 3 ?'big-height' : '')}}">
                                    <img class="gallery-image" src="{{asset(ImageGallery().$item->Image)}}" alt="gallery" />
                                    <div class="popuo-overlay">
                                        <a class="popup-image" href="{{asset(ImageGallery().$item->Image)}}"><i class="view-icon flaticon-view"></i></a>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-4">
                    @foreach($image_gallery as $item)
                        @if ($loop->iteration %3==2)
                            <div class="single-gallery">
                                <img class="gallery-image" src="{{asset(ImageGallery().$item->Image)}}" alt="gallery" />
                                <div class="popuo-overlay">
                                    <a class="popup-image" href="{{asset(ImageGallery().$item->Image)}}"><i class="view-icon flaticon-view"></i></a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
                <div class="col-lg-4 col-md-4">
                    @foreach($image_gallery as $item)
                        @if ($loop->iteration %3==0)
                            <div class="single-gallery">
                                <img class="gallery-image" src="{{asset(ImageGallery().$item->Image)}}" alt="gallery" />
                                <div class="popuo-overlay">
                                    <a class="popup-image" href="{{asset(ImageGallery().$item->Image)}}}"><i class="view-icon flaticon-view"></i></a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div> -->
    <!-- Image Gallery area end here  -->

    <!-- Testimonial ara start here  -->
<!--     <div class="testimonial-area section section-bg">
        <div class="container">
            <div class="section-header-area text-center">
                <h3 class="sub-title">{{__('Testimonial')}}</h3>
                <h2 class="section-title">{{__('What People Are')}} <br />{{__('Saying About Ourself')}}</h2>
            </div>
            <div class="testimonial-slide-top">

               
                @foreach ($testimonial as $test)
                    @if ($loop->iteration == 1)
                        <img src="{{asset(IMG_TESTIMONIAL.$test->Image)}}" alt="img" class="testimonial-float-img testimonial-left-1 position-absolute">
                    @elseif ($loop->iteration == 2)
                        <img src="{{asset(IMG_TESTIMONIAL.$test->Image)}}" alt="img" class="testimonial-float-img testimonial-left-2 position-absolute">
                    @elseif ($loop->iteration == 3)
                        <img src="{{asset(IMG_TESTIMONIAL.$test->Image)}}" alt="img" class="testimonial-float-img testimonial-left-3 position-absolute">
                    @elseif ($loop->iteration == 4)
                        <img src="{{asset(IMG_TESTIMONIAL.$test->Image)}}" alt="img" class="testimonial-float-img testimonial-left-4 position-absolute">
                    @elseif ($loop->iteration == 5)
                        <img src="{{asset(IMG_TESTIMONIAL.$test->Image)}}" alt="img" class="testimonial-float-img testimonial-right-1 position-absolute">
                    @elseif ($loop->iteration == 6)
                        <img src="{{asset(IMG_TESTIMONIAL.$test->Image)}}" alt="img" class="testimonial-float-img testimonial-right-2 position-absolute">
                    @elseif ($loop->iteration == 7)
                        <img src="{{asset(IMG_TESTIMONIAL.$test->Image)}}" alt="img" class="testimonial-float-img testimonial-right-3 position-absolute">
                    @elseif ($loop->iteration == 8)
                        <img src="{{asset(IMG_TESTIMONIAL.$test->Image)}}" alt="img" class="testimonial-float-img testimonial-right-4 position-absolute">
                @endif
            @endforeach
         

                <img class="shape-image" src="{{asset('frontend/assets/images/shape.png')}}" alt="shape" />
                <div class="testimonial-image-slide">
                    @foreach ($testimonial as $test)
                        <div class="signle-testimonial-image"><img class="testimonial-image" src="{{asset(IMG_TESTIMONIAL.$test->Image)}}" alt="testimonal-image" /></div>
                    @endforeach
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="testimonail-slide">
                        @foreach ($testimonial as $test)
                            <div class="single-testimonial">
                                <p class="testimonial-text">{{ langConverter($test->en_Description,$test->fr_Description) }}</p>
                                <h3 class="testimonial-title">{{$test->Name}}</h3>
                                <ul class="review-area">
                                    <li><i class="flaticon-star"></i></li>
                                    <li class="{{$test->star == 1 ? 'inactive' : ''}}"><i class="flaticon-star"></i></li>
                                    <li class="{{$test->star == 1 || $test->star == 2 ? 'inactive' : ''}}"><i class="flaticon-star"></i></li>
                                    <li class="{{$test->star == 1 || $test->star == 2 || $test->star == 3 ? 'inactive' : ''}}"><i class="flaticon-star"></i></li>
                                    <li class="{{$test->star == 1 || $test->star == 2 || $test->star == 3 || $test->star == 4 ? 'inactive' : ''}}"><i class="flaticon-star"></i></li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial ara end here  -->
@endsection

@section('subscribe_pop_up_modal')
    @if(!session()->has('dontshoW'))
    <!-- Page Load Popup Modal End -->
<!--     <div class="modal fade bd-example-modal-lg theme-modal" id="popUpModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1 modal-bg">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
                                    <div class="offer_modal_left">
                                        <img src="{{asset(IMG_LOGO_PATH.$allsettings['main_logo'])}}" alt="logo">
                                        <h3>{{__('SUBSCRIBE TO NEWSLETTER')}}</h3>
                                        <p class="m-0">{{__('Subscribe to the Clean Power Store mailing list to receive updates on new arrivals, special offers and our promotions.')}}</p>

                                        <form id="subscribe_form" name="subscribe_form" >
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control subscribeModal" name="subscribeval" id="subscribeval" placeholder="{{__('Your email')}}">
                                                <div class="input-group-append">
                                                    <button class="theme-btn-one btn-black-overlay btn_sm border-0 subscribeModal" id="subscribeModal">
                                                        {{__('Subscribe')}}</button>
                                                </div>
                                            </div>
                                            <div class="check_boxed_modal">
                                                <input type="checkbox" id="doNotShowModel" name="dontshowmodal" value="dont_show">
                                                <label for="vehicle1">{{__("Don't show this popup again")}}</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="offer_modal_img d-none d-lg-flex">
                                        <img src="{{asset(IMG_ADVERTISE_PATH.$allsettings['popup_image'])}}" alt="img">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    @endif
    <!-- Page Load Popup Modal End -->
    <div id="DoNotSubscribe" data-url="{{ route('do.not.subscribe') }}"></div>
    <div id="SubscribeStore" data-url="{{route('admin.subscribe.store')}}"></div>
    @push('post_script')
        <script src="{{asset('frontend/assets/js/pages/home.js')}}"></script>
    @endpush()
@endsection



<style>
 .inner-container{    margin-left: 10%;
    margin-top: 0px;
    margin-bottom: 86px;
    width: 50%;}
 .slider_inner{    font-size: 26px;
    color: #000;
    background: #eee;
    padding: 18px;background-color: rgb(183 183 183 / 50%);
    font-weight: bold;}
.loan-steps .count {
  height: 70px;
  width: 70px;
  text-align: center;
  line-height: 70px;
  margin: 15px auto 20px;
  font-size: 24px;
  font-weight: 700;
  border-radius: 50%;
  color: #fff;
  position: relative;
  font-family: "Rubik", sans-serif;
}
.loan-steps .count::after {
  position: absolute;
  content: "";
  height: 100%;
  width: 100%;
  border: 6px solid rgba(239, 255, 238, 0.5);
  top: 0;
  left: 0;
  border-radius: 50%;
}
.loan-steps .step-item {
  margin-top: 30px;
   position: relative; 
  z-index: 1;
}
.loan-steps .step-item::before {
  position: absolute;
  content: "";
  height: 1px;
  width: 100%;
  border: 1px dashed #51B56D;
  top: 50px;
  left: 50%;
  z-index: -1;
}
.loan-steps .step-item:nth-child(3)::before, .loan-steps .step-item:nth-child(6)::before, .loan-steps .step-item:nth-child(9)::before, .loan-steps .step-item:last-child::before {
  display: none;
}
.loan-steps .step-item .count {
  background-color: #51B56D;
}
@media (max-width: 991px) {
  .loan-steps .step-item:nth-child(2)::before, .loan-steps .step-item:nth-child(3)::before, .loan-steps .step-item:nth-child(6)::before {
    display: none;
  }
  .loan-steps .step-item:nth-child(1)::before, .loan-steps .step-item:nth-child(6)::before, .loan-steps .step-item:nth-child(9)::before {
    display: block;
  }
}
@media (max-width: 767px) {
  .loan-steps .step-item::before {
    display: none !important;
  }
}

.icon-box-item {
  z-index: 3;
}
.icon-box-item .block {
  padding: 35px 27px;
  box-shadow: 0px 25px 65px 0px rgba(0, 0, 0, 0.05);
  border-radius: 15px;
}
.icon-box-item .icon {
  display: inline-block;
  height: 90px;
  width: 90px;
  line-height: 90px;
  font-size: 32px;
  border-radius: 10px;
  margin-bottom: 20px;
  text-align: center;
  color: #fff;
  background-color: #51B56D;
}

</style>