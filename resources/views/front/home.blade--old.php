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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach($sliders as $key=>$slider)
        
        <div class="item @if($key==1) active @endif" >
            <div class="signle-slide" style="background-image: url('{{asset(SliderImage().$slider->Background_Image)}}');background-repeat:none; height: 600px;"  >
                <div class="inner-container">
                     <p> {{$slider->en_Description}}</p>
                     <p class="inner_p"> {{$slider->en_Sub_Title}}</p>
                      <div class="slider-btn">
                                <a href="{{route('all.product')}}" class="btn btn-praimry custom-btn-header">DISCOVER NOW</a>
                      </div>
                 </div>
                </div>
            </div>
        
         
        @endforeach
        
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>
<!--<div class="hero-section">
    <div class="hero-slider">
        @foreach($sliders as $slider)
        <div class="signle-slide" style="background-image: url('{{asset(SliderImage().$slider->Background_Image)}}'); height: 490px;">
            <div class="inner-container">
                <p class="slider_inner"> {{$slider->en_Description}}</p>
                <div class="slider-btn">
                    <a href="{{route('all.product')}}" class="secondary-btn">{{langConverter($slider->en_Button_Text,$slider->fr_Button_Text)}} <i class="iocn flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="container">
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
            </div>
        </div>
        @endforeach
    </div>
</div>-->






<div class="pt-offset-10 container-indent">
        <div class="container-fluid">
            <div class="pt-layout-promo-box">  
                <div class="row">
                    <div class="col-sm-6 col-sm-6 col-md-3">
                        <a href="https://cleanpowerstore.com/product/category/1" class="pt-promo-box">     
                            <div class="image-box">   
                                <img src="{{ URL::to('/') }}/uploaded_files/general_settings/Battery.png" alt="" class="loading" data-was-processed="true">
                            </div>
                            <div class="pt-description pr-promo-type1 pt-point-v-t pt-point-h-l">
                                <div class="pt-description-wrapper">
                                    <div class="pt-color-white pt-title-large"><span>Batteries</span></div>
                                </div>
                            </div>
                        </a>
                        <a href="https://cleanpowerstore.com/product/category/25" class="pt-promo-box">
                            <div class="image-box">
                                <img src="{{ URL::to('/') }}/uploaded_files/general_settings/assess.png" alt="" class="loading" data-was-processed="true">
                            </div>
                            <div class="pt-description pr-promo-type1 pt-point-v-t pt-point-h-l">
                                <div class="pt-description-wrapper">
                                    <div class="pt-title-large"><span>Accessories</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <a href="https://cleanpowerstore.com/product/category/1" class="pt-promo-box">
                            <div class="image-box"> 
                                <img src="{{ URL::to('/') }}/uploaded_files/general_settings/s.png" alt="" class="loading" data-was-processed="true">
                            </div>
                            <div class="pt-description pr-promo-type1 pt-point-v-t pt-point-h-l">
                                <div class="pt-description-wrapper">
                                    <div class="pt-title-large"><span>Solar Panel</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="https://cleanpowerstore.com/product/category/3" class="pt-promo-box">
                                    <div class="image-box">
                                        <img src="{{ URL::to('/') }}/uploaded_files/general_settings/Inverter.png" alt="" class="loading" data-was-processed="true">
                                    </div>
                                    <div class="pt-description pr-promo-type1 pt-point-v-t pt-point-h-l">
                                        <div class="pt-description-wrapper">
                                            <div class="pt-color-white pt-title-large"><span>Inverter</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="https://cleanpowerstore.com/product/category/1" class="pt-promo-box">
                                    <div class="image-box">
                                        <img src="{{ URL::to('/') }}/uploaded_files/general_settings/solar-kit.png" alt="" class="loading" data-was-processed="true">
                                    </div>
                                    <div class="pt-description pr-promo-type1 pt-point-v-t pt-point-h-l">
                                        <div class="pt-description-wrapper">
                                            <div class="pt-title-large"><span>Solar Kit</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="https://cleanpowerstore.com/product/category/1" class="pt-promo-box">
                                    <div class="image-box">
                                         <img src="{{ URL::to('/') }}/uploaded_files/general_settings/Rac.png" alt="" class="loading" data-was-processed="true">
                                    </div>
                                    <div class="pt-description pr-promo-type1 pt-point-v-t pt-point-h-l">
                                        <div class="pt-description-wrapper">
                                            <div class="pt-title-large"><span>Racking System</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        
                        <input type="hidden" name="quantity" value="1" id="product_quantity">
                        <h3 class="product-name">
                        
                        <a class="product-link" href="{{route('single.product',$product->en_Product_Slug)}}">{{substr(langConverter($product->en_Product_Name,$product->fr_Product_Name),0,26)}}</a>
                        
                        </h3>
                        @if(!$user && $product->is_retail_price==1)
                        <span class="price_new">{{currencySymbol()[currency()]}}{{currencyConverter($product->Price)}}</span> <br>
                        @else
                        <div class="price_new" style="    margin-top: 23px;">&nbsp;</div>
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



<div class="container-indent ">
        <div class="container">
            <div class="pt-block-title">
                <h4 class="pt-title">The Frshest and Most Exciting News</h4>
            </div>
            <div class="pt-content-post row arrow-location-center-02">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="pt-post">
                        <div class="pt-post-img">
                            <a href="#blog-single-post">
                                <img src="https://softali.net/victor/yanka/html/images/promo/index04-promo-07.jpg" class="lazyload loaded" data-src="https://softali.net/victor/yanka/html/images/promo/index04-promo-07.jpg" alt="Color, Size, Material Swatches" data-was-processed="true">
                            </a>
                        </div>
                        <div class="pt-post-content">
                            <h2 class="pt-title"><a href="/blogs/news/color-size-material-swatches">Color, Size, Material Swatches</a></h2>
                                <div class="pt-meta">
                                <div class="pt-autor">
                                    BY <span>DIEGO LOPEZ</span> JANUARY 08, 2019
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="pt-post">
                        <a href="#blog-single-post">
                                <img src="https://softali.net/victor/yanka/html/images/promo/index04-promo-08.jpg" class="lazyload loaded" data-src="https://softali.net/victor/yanka/html/images/promo/index04-promo-08.jpg" alt="Flexible Banners Section" data-was-processed="true">
                            </a>
                        <div class="pt-post-content">
                            <h2 class="pt-title"><a href="/blogs/news/color-size-material-swatches">Flexible Banners Section</a></h2>
                            <div class="pt-meta">
                                <div class="pt-autor">
                                    BY <span>DIEGO LOPEZ</span> JANUARY 08, 2019
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="pt-post">
                        <div class="pt-post-img">
                            <a href="#blog-single-post">
                                <img src="https://softali.net/victor/yanka/html/images/promo/index04-promo-09.jpg" class="lazyload loaded" data-src="https://softali.net/victor/yanka/html/images/promo/index04-promo-09.jpg" alt="Dynamic Checkout Buttons" data-was-processed="true">
                            </a>
                        </div>
                        <div class="pt-post-content">
                            <h2 class="pt-title"><a href="/blogs/news/color-size-material-swatches">Dynamic Checkout Buttons</a></h2>
                            <div class="pt-meta">
                                <div class="pt-autor">
                                    BY <span>DIEGO LOPEZ</span> JANUARY 08, 2019
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




<div class="section">
    <div class="container mt-5 mb-5">
        <div class="pt-block-title">
                <h4 class="pt-title">What dose our clients say</h4>
            </div>
    
    <div class="row g-2">
        <div class="col-md-4">
            <div class="card p-3 text-center px-4">
                
                <div class="user-image">
                    
            <img src="{{ URL::to('/') }}/uploaded_files/general_settings/c1.png" class="rounded-circle" width="80"
                    >
                    
                </div>
                
                <div class="user-content">
                    
                    <h5 class="mb-0">Bruce Hardy</h5>
                    <span>Marketing Exective</span>
                    <p>Pick anyone else!! Their contract says the process is totally completed in 90 days...But after 5 months, the permits were still not approved (they had made several mistakes on the permitting  </p>
                    
                </div>
                
                <div class="ratings">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    
                </div>
                
            </div>
        </div>
        
        <div class="col-md-4">
            
            <div class="card p-3 text-center px-4">
                
                <div class="user-image">
                    
            <img src="{{ URL::to('/') }}/uploaded_files/general_settings/c2.png" class="rounded-circle" width="80" />
                    
                </div>
                
                <div class="user-content">
                    
                    <h5 class="mb-0">Mark Smith</h5>
                    <span>Freelancer</span>
                    <p>I used cleanpowerstore to bid several companies against one another. I chose solar sme due to their low interest rate and high quality equipment and micro-inverters.</p>
                    
                </div>
                
                <div class="ratings">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    
                </div>
                
            </div>
            
        </div>
        
        <div class="col-md-4">            
            <div class="card p-3 text-center px-4">                
                <div class="user-image">                    
                    <img src="{{ URL::to('/') }}/uploaded_files/general_settings/c3.png" class="rounded-circle" width="80">
                   
                </div>
                
                <div class="user-content">
                    
                    <h5 class="mb-0">Veera  Duncan</h5>
                    <span>Account Manager</span>
                    <p>Just completed install of my solar system using cleanpowerstore, Inc. Project Manager was great! She kept the project moving along and kept me informed Very pleased with the service and work.</p>
                    
                </div>
                
                <div class="ratings">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    
                </div>
                
            </div>
            
        </div>
        
        
    </div>
    
</div>

</div>



<div class="section">
 
 <div class="container">
      <div class="pt-block-title">
                <h4 class="pt-title">Our Statistic Figures</h4>
            </div>
    <div class="row">

    <div class="four col-md-3">
        <div class="counter-box">
            <i class="fa fa-child"></i>
            <span class="counter">2147</span>
            <p>Happy Customers</p>
        </div>
    </div>
    <div class="four col-md-3">
        <div class="counter-box">
            <i class="fa fa-users"></i>
            <span class="counter">3275</span>
            <p>Registered Members</p>
        </div>
    </div>
    <div class="four col-md-3">
        <div class="counter-box">
           <i class="fa fa-sitemap"></i>
            <span class="counter">289</span>
            <p>Available Products</p>
        </div>
    </div>
    <div class="four col-md-3">
        <div class="counter-box">
            <i class="fa fa-thumbs-up"></i>
            <span class="counter">1563</span>
            <p>Recent Orders</p>
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
.section {
    padding: 6rem 0!important;
}
.form-group{margin-bottom: 0px!important;}
.inner-container{
    margin-left: 50%;
    margin-top: 0px;
    margin-bottom: 86px;
    width: 100%;
    color: #fff;
    padding-top: 9%;
}
.inner_p{    
    font-size: 64px;
    line-height: 77px;
    margin-top: 4px;
}
.custom-btn-header{    
    color: #fff!important;
    background-color: #48cab2!important;;
    font-weight: bold!important;;
}
 .slider_inner{
     font-size: 26px;
     color: #000;
     background: #eee;
     padding: 18px;
    background-color: rgb(183 183 183 / 50%);
     font-weight: bold;
}
.pt-block-title .pt-title {
    font-size: 36px;
    line-height: 43px;
    font-weight: 800;
    padding: 0;
    color: #333;
}
.pt-post .pt-post-content .pt-title a {
        color: #333;
    display: inline-block;
    font-size: 18px;
    text-decoration: none;
    font-weight: bold;
}
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


.pt-layout-promo-box:not(.nomargin){
    margin-top:-10px;
    margin-right:-5px;
    margin-left:-5px;
    overflow:hidden
}
.pt-layout-promo-box:not(.nomargin) .container,.pt-layout-promo-box:not(.nomargin) .container-fluid,.pt-layout-promo-box:not(.nomargin) [class^=col]{
    padding-right:5px!important;
    padding-left:5px!important
}
.pt-layout-promo-box:not(.nomargin)>.row{
    margin-right:0!important;
    margin-left:0!important
}
.pt-layout-promo-box:not(.nomargin)>.row .row{
    margin-right:-5px!important;
    margin-left:-5px!important
}
@media (min-width:576px){
    .pt-layout-col-promo{
        margin-top:-30px
    }
    .pt-layout-col-promo [class^=pt-promo]{
        margin-top:30px
    }
}
@media (max-width:575px){
    .pt-layout-col-promo{
        margin-top:-20px
    }
    .pt-layout-col-promo [class^=pt-promo]{
        margin-top:20px
    }
}
.pt-promo-box{
    display:block;
    position:relative;
    overflow:hidden;
    margin-top:10px;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none
}
.pt-promo-box .image-box{
    overflow:hidden
}
.pt-promo-box .image-box img{
    width:100%;
    height:auto;
    transition:-webkit-transform 1s;
    transition:transform 1s;
    transition:transform 1s,-webkit-transform 1s
}
.pt-promo-box .pt-description{
    display:flex;
    flex-direction:row;
    flex-wrap:nowrap;
    justify-content:center;
    align-content:center;
    align-items:center;
    position:absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    width:100%;
    height:100%
}
.pt-promo-box .pt-description.pr-promo-type1.pt-promo-wrapper{
    padding:20px
}
.pt-promo-box .pt-description.pr-promo-type1:not(.pt-promo-wrapper):not(.pt-point-external){
    padding:32px 38px
}
.pt-promo-box .pt-description.pr-promo-type1 .pt-title-small{
    font-size:18px;
    line-height:26px;
    font-weight:800;
    transition:color .2s
}
.pt-promo-box .pt-description.pr-promo-type1 .pt-title-small:not([class^=pt-color]){
    color:#333
}
.pt-promo-box .pt-description.pr-promo-type1 .pt-title-large{
    font-size:24px;
    line-height:35px;
    font-weight:800;
    margin:7px 0 0 0;
    padding:0;
    position:relative;
    display:inline-block
}
.pt-promo-box .pt-description.pr-promo-type1 .pt-title-large:not([class^=pt-color]){
    color:#333
}
.pt-promo-box .pt-description.pr-promo-type1 .pt-title-large:before{
    position:absolute;
    bottom:5px;
    left:0;
    right:0;
    margin:auto;
    width:0%;
    content:'';
    color:transparent;
    background-color:#333;
    height:2px;
    transition:width .2s linear
}
.pt-promo-box .pt-description.pr-promo-type1 .pt-title-large.pt-color-white:before{
    background-color:#fff
}
.pt-promo-box .pt-description.pr-promo-type1 p{
    margin:1px 0 0 0;
    font-size:18px;
    line-height:28px
}
.pt-promo-box .pt-description.pr-promo-type1 p:not([class^=pt-color]){
    color:#777
}
.pt-promo-box .pt-description.pr-promo-type1 [class^=btn]{
    margin-top:34px;
    padding-left:28px;
    padding-right:28px
}
.pt-promo-box .pt-description.pr-promo-type1 .pt-description-wrapper>:nth-child(1){
    margin-top:0
}
.pt-promo-box .pt-description.pr-promo-type2.pt-promo-wrapper{
    padding:20px
}
.pt-promo-box .pt-description.pr-promo-type2:not(.pt-promo-wrapper):not(.pt-point-external){
    padding:34px 34px 32px 38px
}
.pt-promo-box .pt-description.pr-promo-type2 .pt-title-small{
    font-size:18px;
    line-height:26px;
    font-weight:800;
    transition:color .2s
}
.pt-promo-box .pt-description.pr-promo-type2 .pt-title-small:not([class^=pt-color]){
    color:#333
}
.pt-promo-box .pt-description.pr-promo-type2 .pt-title-large{
    font-size:36px;
    line-height:43px;
    font-weight:800;
    margin:8px 0 0 0;
    padding:0;
    position:relative;
    display:inline-block;
    transition:color .2s
}
.pt-promo-box .pt-description.pr-promo-type2 .pt-title-large:not([class^=pt-color]){
    color:#333
}
.pt-promo-box .pt-description.pr-promo-type2 .pt-title-large:before{
    position:absolute;
    bottom:0;
    left:0;
    right:0;
    margin:auto;
    width:0%;
    content:'';
    color:transparent;
    background-color:#333;
    height:2px;
    transition:width .2s linear
}
.pt-promo-box .pt-description.pr-promo-type2 .pt-title-large.pt-color-white:before{
    background-color:#fff
}
.pt-promo-box .pt-description.pr-promo-type2 p{
    margin:1px 0 0 0;
    font-size:18px;
    line-height:28px
}
.pt-promo-box .pt-description.pr-promo-type2 p:not([class^=pt-color]){
    color:#777
}
.pt-promo-box .pt-description.pr-promo-type2 [class^=btn]{
    margin-top:34px;
    padding-left:28px;
    padding-right:28px
}
.pt-promo-box .pt-description.pr-promo-type2 .pt-description-wrapper>:nth-child(1){
    margin-top:0
}
.pt-promo-box .pt-description.pt-point-external{
    padding:12px 10px 0;
    margin:0;
    text-align:center;
    display:block;
    position:relative
}
.pt-promo-box .pt-description.pt-movehover-top .image-box img{
    margin-left:0;
    transition:margin 1s ease
}
.pt-promo-box .pt-description.pt-promo-wrapper.pt-one-child:not(.pt-point-external) .pt-description-wrapper{
    background-color:#fff;
    padding:10px 33px 8px;
    text-align:center;
    transition:background-color .2s
}
.pt-promo-box .pt-description.pt-promo-wrapper:not(.pt-one-child):not(.pt-point-external) .pt-description-wrapper{
    background-color:rgba(255,255,255,.8);
    padding:50px 61px 57px;
    text-align:center;
    transition:background-color .2s
}
.pt-promo-box .pt-description.pt-point-v-t{
    align-items:flex-start
}
.pt-promo-box .pt-description.pt-point-v-b{
    align-items:flex-end
}
.pt-promo-box .pt-description.pt-point-h-l{
    justify-content:flex-start;
    align-content:flex-start
}
.pt-promo-box .pt-description.pt-point-h-r{
    justify-content:flex-end;
    align-content:flex-start
}
.pt-promo-box:hover.pt-movehover-top .image-box img{
    margin-left:-10px
}
.pt-promo-box:hover .pt-promo-wrapper.pt-one-child.pt-description .pt-description-wrapper{
    background:#48cab2
}
.pt-promo-box:hover .pt-promo-wrapper.pt-one-child.pt-description .pt-description-wrapper .pt-title-small{
    color:#fff
}
.pt-promo-box:hover:not(.no-zoom) .image-box img{
    -webkit-transform:scale3d(1.1,1.1,1);
    transform:scale3d(1.1,1.1,1)
}
.pt-promo-box:hover:not(.no-title-underline) .pt-description .pt-title-large:before{
    width:100%
}
@media (max-width:790px){
    .pt-promo-box.pt-extra-responsive .pt-description.pr-promo-type2 br{
        display:none
    }
    .pt-promo-box.pt-extra-responsive .pt-description.pr-promo-type2 .pt-title-small{
        font-size:16px;
        line-height:22px
    }
    .pt-promo-box.pt-extra-responsive .pt-description.pr-promo-type2 .pt-title-large{
        font-size:30px;
        line-height:40px
    }
}
@media (max-width:575px){
    .pt-promo-box.pt-extra-responsive .pt-description.pr-promo-type2 .pt-title-small{
        font-size:16px;
        line-height:22px
    }
    .pt-promo-box.pt-extra-responsive .pt-description.pr-promo-type2 .pt-title-large{
        font-size:25px;
        line-height:30px;
        margin-top:4px
    }
    .pt-promo-box.pt-extra-responsive .pt-description.pr-promo-type2 p{
        font-size:16px;
        line-height:22px
    }
}
@media (max-width:790px){
    .pt-promo-box .pt-description [class^=btn]{
        display:none
    }
}
@media (max-width:1239px){
    .pt-promo-box .pt-description.pt-promo-wrapper:not(.pt-one-child):not(.pt-point-external) .pt-description-wrapper{
        padding:25px 31px 32px
    }
}
@media (max-width:1024px){
    .pt-promo-box .pt-description.pt-promo-wrapper.pt-one-child:not(.pt-point-external) .pt-description-wrapper{
        padding-left:20px;
        padding-right:20px
    }
    .pt-promo-box .pt-description:not(.pt-point-external).pr-promo-type1:not(.pt-promo-wrapper){
        padding:22px 28px
    }
    .pt-promo-box .pt-description:not(.pt-point-external).pr-promo-type2:not(.pt-promo-wrapper){
        padding:24px 28px 22px
    }
}
@media (max-width:790px){
    .pt-promo-box .pt-description:not(.pt-point-external).pr-promo-type1:not(.pt-promo-wrapper){
        padding:13px 20px
    }
    .pt-promo-box .pt-description:not(.pt-point-external).pr-promo-type2:not(.pt-promo-wrapper){
        padding:15px 20px 22px
    }
}
@media (max-width:575px){
    .pt-promo-box .pt-description.pt-promo-wrapper.pt-one-child:not(.pt-point-external) .pt-description-wrapper{
        padding-left:15px;
        padding-right:15px
    }
    .pt-promo-box .pt-description.pt-point-external .pt-title-large{
        font-size:21px;
        line-height:32px
    }
    .pt-promo-box .pt-description.pt-point-external p{
        font-size:16px;
        line-height:26px
    }
    .pt-promo-box .pt-description.pt-promo-wrapper:not(.pt-one-child):not(.pt-point-external) .pt-description-wrapper{
        padding:25px 31px 22px
    }
    .pt-promo-box .pt-description.pt-promo-wrapper:not(.pt-one-child):not(.pt-point-external) .pt-title-small{
        font-size:16px;
        line-height:24px
    }
    .pt-promo-box .pt-description.pt-promo-wrapper:not(.pt-one-child):not(.pt-point-external) .pt-title-large{
        font-size:30px;
        line-height:37px;
        margin-top:3px
    }
    .pt-promo-box .pt-description.pt-promo-wrapper:not(.pt-one-child):not(.pt-point-external) p{
        display:none
    }
}
@media (max-width:420px){
    .pt-promo-box .pt-description.pt-promo-wrapper:not(.pt-one-child):not(.pt-point-external) .pt-description-wrapper{
        padding:15px 20px 11px
    }
    .pt-promo-box .pt-description.pt-promo-wrapper:not(.pt-one-child):not(.pt-point-external) .pt-description-wrapper .pt-title-small{
        font-size:16px;
        line-height:22px
    }
    .pt-promo-box .pt-description.pt-promo-wrapper:not(.pt-one-child):not(.pt-point-external) .pt-description-wrapper .pt-title-large{
        font-size:27px;
        line-height:35px;
        margin-top:0
    }
    .pt-promo-box .pt-description.pt-promo-wrapper:not(.pt-one-child):not(.pt-point-external) .pt-description-wrapper p{
        display:none
    }
}
html.touch-device .pt-promo-box .pt-description .pt-title-large:before{
    display:none
}
.pt-promo-card{
    display:block;
    position:relative;
    overflow:hidden;
    margin-top:10px
}
.pt-promo-card .image-box{
    display:block;
    overflow:hidden
}
.pt-promo-card .image-box img{
    width:100%;
    height:auto;
    transition:-webkit-transform .7s;
    transition:transform .7s;
    transition:transform .7s,-webkit-transform .7s
}
.pt-promo-card .pt-description{
    text-align:center;
    color:#777;
    padding-top:34px
}
.pt-promo-card .pt-description:empty{
    display:none
}
.pt-promo-card .pt-description .pt-title-small{
    font-size:18px;
    line-height:26px;
    color:#333;
    font-weight:800
}
.pt-promo-card .pt-description .pt-title-large{
    font-size:48px;
    line-height:58px;
    color:#333;
    font-weight:800;
    margin-top:1px
}
.pt-promo-card .pt-description .pt-title-large span{
    position:relative;
    display:inline-block
}
.pt-promo-card .pt-description .pt-title-large span:before{
    position:absolute;
    bottom:4px;
    left:0;
    right:0;
    margin:auto;
    width:0%;
    content:'';
    color:transparent;
    background-color:#333;
    height:3px;
    transition:width .25s linear;
    transition-delay:.25s
}
.pt-promo-card .pt-description p{
    font-size:18px;
    line-height:28px;
    color:#777;
    margin-top:9px
}
.pt-promo-card .pt-description .btn{
    margin-top:23px
}
@media (min-width:1025px){
    .pt-promo-card.movecontent .image-box img{
        position:relative;
        top:0;
        will-change:top;
        transition:top .25s
    }
    .pt-promo-card.movecontent .pt-description{
        position:relative;
        background:#fff;
        top:0;
        will-change:top;
        transition:top .25s
    }
    .pt-promo-card.movecontent .btn{
        visibility:hidden;
        opacity:0;
        position:absolute;
        transition:.2s linear;
        left:50%;
        -webkit-transform:translate(-50%,0);
        transform:translate(-50%,0)
    }
    .pt-promo-card.movecontent:hover .image-box img{
        top:-74px
    }
    .pt-promo-card.movecontent:hover .pt-description{
        top:-74px
    }
    .pt-promo-card.movecontent:hover .btn{
        display:none;
        visibility:visible;
        opacity:1;
        top:100%
    }
}
.pt-promo-card:hover:not(.no-zoom):not(.movecontent) .image-box img{
    -webkit-transform:scale3d(1.1,1.1,1);
    transform:scale3d(1.1,1.1,1)
}
.pt-promo-card:hover .pt-description .pt-title-large span:before{
    width:100%
}
.pt-promo-card:hover.movecontent .btn{
    display:inline-flex
}
@media (max-width:1300px){
    .pt-promo-card .pt-description .pt-title-large{
        font-size:40px;
        line-height:50px
    }
}
@media (max-width:1024px){
    .pt-promo-card .pt-description .pt-title-small{
        font-size:16px;
        line-height:24px
    }
    .pt-promo-card .pt-description .pt-title-large{
        font-size:36px;
        line-height:46px
    }
}
html.touch-device .pt-promo-card .pt-description .pt-title-large span:before{
    display:none
}
.pt-layout-promo-card-02{
    margin-top:-60px
}
.pt-layout-promo-card-02 .pt-promo-card-02{
    margin-top:60px
}
.pt-promo-card-02{
    display:block
}
.pt-promo-card-02 .image-box{
    overflow:hidden
}
.pt-promo-card-02 .image-box img{
    width:100%;
    height:auto;
    transition:-webkit-transform 1s;
    transition:transform 1s;
    transition:transform 1s,-webkit-transform 1s
}
.pt-promo-card-02 .pt-description{
    display:flex;
    flex-direction:column;
    flex-wrap:wrap;
    justify-content:center;
    align-content:center;
    align-items:center;
    text-align:center;
    margin:12px 0 0 0
}
.pt-promo-card-02 .pt-description .pt-title{
    font-size:24px;
    line-height:35px;
    font-weight:800;
    margin:0;
    padding:0;
    position:relative;
    display:inline-block
}
.pt-promo-card-02 .pt-description .pt-title:not([class^=pt-color]){
    color:#333
}
.pt-promo-card-02 .pt-description .pt-title+[class^=btn]{
    margin-top:10px
}
.pt-promo-card-02 .pt-description p{
    font-size:16px;
    line-height:25px;
    color:#777;
    margin:1px 0 0 0
}
.pt-promo-card-02 .pt-description p.text-large{
    font-size:18px;
    line-height:29px
}
.pt-promo-card-02 .pt-description p.text-large+[class^=btn]{
    margin-top:10px
}
.pt-promo-card-02 .pt-description [class^=btn]{
    margin-top:14px;
    padding-left:20px;
    padding-right:20px
}
.pt-promo-card-02:hover:not(.no-zoom) .image-box img{
    -webkit-transform:scale3d(1.1,1.1,1);
    transform:scale3d(1.1,1.1,1)
}
.pt-promo-card-02:hover .btn.btn-border{
    background:0 0;
    color:#333;
    border-color:#333
}
.pt-promo-card-02:hover .btn.btn-border:before{
    border-width:2px
}
.pt-promo-fullwidth{
    display:block;
    position:relative;
    overflow:hidden
}
.pt-promo-fullwidth>img{
    width:100%;
    height:auto
}
.pt-promo-fullwidth .pt-description{
    position:absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    width:100%;
    height:100%;
    display:flex;
    flex-direction:row;
    flex-wrap:nowrap;
    justify-content:center;
    align-content:center;
    align-items:center;
    color:#777;
    transition:color .2s
}
.pt-promo-fullwidth .pt-description .pt-description-wrapper{
    max-width:900px
}
.pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-small{
    font-size:18px;
    line-height:26px;
    transition:color .2s
}
.pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-small:not([class^=pt-color]){
    color:#333
}
.pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-large{
    font-size:64px;
    line-height:77px;
    font-weight:800;
    margin-top:4px;
    transition:color .2s
}
.pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-large:not([class^=pt-color]){
    color:#333
}
.pt-promo-fullwidth .pt-description:not(.pt-size-small) p{
    font-size:18px;
    line-height:28px;
    margin-top:4px;
    transition:color .2s
}
.pt-promo-fullwidth .pt-description:not(.pt-size-small) [class^=btn]{
    margin-top:33px
}
.pt-promo-fullwidth .pt-description:not(.pt-size-small) :nth-child(1){
    margin-top:0
}
.pt-promo-fullwidth .pt-description.pt-size-small .pt-title-large{
    font-size:48px;
    line-height:58px;
    font-weight:800;
    margin-top:4px;
    transition:color .2s
}
.pt-promo-fullwidth .pt-description.pt-size-small .pt-title-large:not([class^=pt-color]){
    color:#333
}
.pt-promo-fullwidth .pt-description.pt-size-small p{
    font-size:16px;
    line-height:19px;
    margin-top:23px;
    transition:color .2s
}
.pt-promo-fullwidth .pt-description.pt-size-small :nth-child(1){
    margin-top:0
}
.pt-promo-fullwidth .pt-description img{
    max-width:100%;
    height:auto
}
@media (min-width:1701px){
    .pt-promo-fullwidth .pt-description{
        padding:9% 17.6% 9.1%
    }
}
@media (min-width:1401px) and (max-width:1700px){
    .pt-promo-fullwidth .pt-description{
        padding:9% 8% 9.1%
    }
}
@media (max-width:1400px){
    .pt-promo-fullwidth .pt-description{
        padding:9% 5% 9.1%
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-large{
        font-size:50px;
        line-height:63px
    }
}
@media (max-width:1100px){
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-small{
        font-size:16px;
        line-height:24px
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-large{
        font-size:35px;
        line-height:48px
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) p{
        font-size:16px;
        line-height:24px
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) [class^=btn]{
        margin-top:20px
    }
    .pt-promo-fullwidth .pt-description.pt-size-small .pt-title-large{
        font-size:43px;
        line-height:53px
    }
    .pt-promo-fullwidth .pt-description.pt-size-small p{
        margin-top:19px
    }
}
@media (max-width:1024px){
    .pt-promo-fullwidth .pt-description.pt-size-small .pt-title-large{
        font-size:38px;
        line-height:48px
    }
    .pt-promo-fullwidth .pt-description.pt-size-small p{
        margin-top:15px
    }
}
@media (max-width:900px){
    .pt-promo-fullwidth .pt-description .pt-description-wrapper{
        max-width:420px
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-large{
        font-size:32px;
        line-height:42px
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) [class^=btn]{
        margin-top:12px
    }
}
@media (max-width:789px){
    .pt-promo-fullwidth .pt-description{
        padding:5% 5% 5.1%
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-large{
        font-size:27px;
        line-height:37px
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-large br{
        display:none
    }
    .pt-promo-fullwidth .pt-description.pt-size-small .pt-title-large{
        font-size:30px;
        line-height:40px
    }
    .pt-promo-fullwidth .pt-description.pt-size-small p{
        margin-top:10px
    }
}
@media (max-width:657px){
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-description-wrapper{
        max-width:inherit
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-small{
        font-size:14px;
        line-height:18px
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-large{
        font-size:21px;
        line-height:30px
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) p{
        font-size:16px;
        line-height:20px
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) [class^=btn]{
        margin-top:10px
    }
}
@media (max-width:520px){
    .pt-promo-fullwidth .pt-description{
        padding:5% 40px 5.1%
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) [class^=btn]{
        margin-top:10px
    }
    .pt-promo-fullwidth .pt-description.pt-size-small .pt-title-large{
        font-size:22px;
        line-height:28px
    }
    .pt-promo-fullwidth .pt-description.pt-size-small p{
        margin-top:10px;
        font-size:14px;
        line-height:17px
    }
}
@media (max-width:420px){
    .pt-promo-fullwidth .pt-description{
        padding:5% 26px 5.1%
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-small{
        font-size:14px;
        line-height:18px
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) .pt-title-large{
        font-size:19px;
        line-height:26px
    }
    .pt-promo-fullwidth .pt-description:not(.pt-size-small) [class^=btn]{
        margin-top:6px
    }
    .pt-promo-fullwidth .pt-description.pt-size-small .pt-title-large{
        font-size:20px;
        line-height:26px
    }
    .pt-promo-fullwidth .pt-description.pt-size-small p{
        margin-top:7px
    }
}
.pt-promo-fullwidth .pt-description :nth-child(1){
    margin-top:0
}
@media (max-width:1024px){
    .pt-promo-fullwidth .pt-description{
        position:relative
    }
}
.pt-promo-fullwidth.pt-promo-parallax{
    background-repeat:no-repeat;
    background-position:center center;
    background-size:cover;
    min-height:650px
}
@media (max-width:1199px){
    .pt-promo-fullwidth.pt-promo-parallax{
        min-height:550px
    }
}
@media (max-width:789px){
    .pt-promo-fullwidth.pt-promo-parallax{
        min-height:350px
    }
}
@media (max-width:451px){
    .pt-promo-fullwidth.pt-promo-parallax{
        min-height:250px
    }
}
.pt-promo-fullwidth.pt-promo-parallax.bg-position-bottom{
    background-position:center bottom
}
.pt-promo-fullwidth.pt-promo-parallax.bg-position-left{
    background-position:center left
}
.pt-promo-fullwidth.pt-promo-parallax.bg-position-right{
    background-position:center rigth
}
@media (max-width:1024px) and (max-width:1199px){
    .pt-promo-fullwidth.pt-promo-parallax .pt-description{
        min-height:550px
    }
}
@media (max-width:1024px) and (max-width:789px){
    .pt-promo-fullwidth.pt-promo-parallax .pt-description{
        min-height:350px
    }
}
@media (max-width:1024px) and (max-width:451px){
    .pt-promo-fullwidth.pt-promo-parallax .pt-description{
        min-height:250px
    }
}
@media (min-width:1025px){
    body:not(.touch-device) .pt-promo-fullwidth.pt-promo-parallax:not(.noparallax){
        background-attachment:fixed
    }
}
.pt-parallax-01{
    display:flex;
    justify-content:flex-start;
    align-content:flex-start;
    align-items:center
}
.pt-parallax-01 .pt-img{
    position:relative
}
.pt-parallax-01 .pt-img img{
    max-width:100%;
    height:auto
}
.pt-parallax-01 .pt-img .pt-img-main{
    position:relative
}
.pt-parallax-01 .pt-img .pt-img-sub{
    position:absolute
}
.pt-parallax-01 .pt-description{
    font-size:18px;
    line-height:28px
}
.pt-parallax-01 .pt-description .pt-title-01{
    font-size:18px;
    line-height:26px;
    color:#333;
    font-weight:800
}
.pt-parallax-01 .pt-description .pt-title-02{
    font-size:36px;
    line-height:43px;
    color:#333;
    font-weight:800;
    margin-top:8px
}
.pt-parallax-01 .pt-description p{
    margin-top:21px
}
.pt-parallax-01 .pt-description [class^=btn]{
    margin-top:34px
}
@media (min-width:791px){
    .pt-parallax-01{
        flex-direction:row;
        flex-wrap:nowrap
    }
    .pt-parallax-01 .pt-img{
        width:58.33333%
    }
    .pt-parallax-01 .pt-img .pt-img-sub{
        top:60px;
        right:12px
    }
    .pt-parallax-01 .pt-description{
        width:41.66667%
    }
    .pt-parallax-01 .pt-description:first-child{
        padding:0 28px 0 0
    }
    .pt-parallax-01 .pt-description:last-child{
        padding:0 0 0 44px
    }
    .pt-parallax-01 .pt-description [class^=btn]{
        padding-left:29px;
        padding-right:29px
    }
}
@media (max-width:1024px){
    .pt-parallax-01{
        align-items:flex-start
    }
    .pt-parallax-01 .pt-img .pt-img-main{
        max-width:90%
    }
    .pt-parallax-01 .pt-img .pt-img-sub{
        top:inherit;
        bottom:-30px;
        right:0;
        max-width:75%
    }
    .pt-parallax-01 .pt-description{
        margin-top:55px
    }
}
@media (max-width:790px){
    .pt-parallax-01{
        flex-direction:column;
        flex-wrap:wrap
    }
    .pt-parallax-01 .pt-img{
        order:2;
        width:100%
    }
    .pt-parallax-01 .pt-img .pt-img-sub{
        bottom:-30px;
        right:0
    }
    .pt-parallax-01 .pt-description{
        order:3
    }
}
.pt-parallax-02{
    display:flex;
    flex-direction:row;
    flex-wrap:nowrap;
    justify-content:center;
    align-content:flex-start;
    align-items:center;
    position:relative
}
.pt-parallax-02:not(:first-child){
    margin-top:190px
}
.pt-parallax-02 .pt-img{
    display:flex;
    flex-direction:row;
    flex-wrap:nowrap;
    width:100%
}
.pt-parallax-02 .pt-img img{
    width:100%;
    height:auto;
    position:relative;
    z-index:1
}
.pt-parallax-02 .pt-img .pt-item:first-child:not(:last-child){
    padding-right:15px;
    width:50%
}
.pt-parallax-02 .pt-img .pt-item:last-child:not(:first-child){
    padding-left:15px;
    width:50%
}
.pt-parallax-02 .pt-img .pt-item:first-child,.pt-parallax-02 .pt-img .pt-item:last-child{
    width:100%
}
.pt-parallax-02 .pt-description{
    font-size:18px;
    line-height:28px;
    text-align:center;
    z-index:2
}
.pt-parallax-02 .pt-description .pt-title-01{
    font-size:18px;
    line-height:26px;
    font-weight:800
}
.pt-parallax-02 .pt-description .pt-title-02{
    font-size:36px;
    line-height:43px;
    font-weight:800
}
.pt-parallax-02 .pt-description [class^=btn]{
    margin-top:25px
}
@media (min-width:1025px){
    .pt-parallax-02 .pt-img .pt-item:first-child:not(:last-child){
        padding-right:15px
    }
    .pt-parallax-02 .pt-img .pt-item:last-child:not(:first-child){
        padding-left:15px
    }
    .pt-parallax-02 .pt-description{
        position:absolute
    }
}
@media (max-width:1024px){
    .pt-parallax-02{
        flex-direction:row;
        flex-wrap:wrap
    }
    .pt-parallax-02 .pt-img .pt-item:first-child:not(:last-child){
        padding-right:10px
    }
    .pt-parallax-02 .pt-img .pt-item:last-child:not(:first-child){
        padding-left:10px
    }
    .pt-parallax-02 .pt-description{
        margin-top:35px
    }
}
@media (min-width:791px){
    .pt-parallax-02 .pt-description{
        color:#777
    }
    .pt-parallax-02 .pt-description .pt-title-01{
        color:#333
    }
    .pt-parallax-02 .pt-description .pt-title-02{
        color:#333
    }
}
@media (max-width:790px){
    .pt-parallax-02 .pt-description{
        margin-top:25px;
        color:#777
    }
    .pt-parallax-02 .pt-description [class^=pt-title]{
        color:#333
    }
}
@media (max-width:790px){
    .js-init-parallax{
        transition:inherit!important;
        -webkit-transform:inherit!important;
        transform:inherit!important
    }
}
@media (min-width:576px){
    .pt-parallax-list [class^=pt-parallax-]:not(:first-child){
        margin-top:100px
    }
}
@media (max-width:575px){
    .pt-parallax-list [class^=pt-parallax-]:not(:first-child){
        margin-top:55px
    }
}
.pt-promofixed{
    display:block;
    background-color:#fff;
    box-shadow:0 0 10px rgba(51,51,51,.06);
    padding:10px;
    overflow:hidden;
    position:fixed;
    z-index:11;
    margin-right:20px;
    max-width:320px;
    opacity:0
}
@media (min-width:791px){
    .pt-promofixed{
        left:20px;
        bottom:20px
    }
}
@media (max-width:790px){
    .pt-promofixed{
        left:10px;
        bottom:10px
    }
}
.pt-promofixed .promofixed-list-item .pt-item{
    display:flex;
    flex-direction:row;
    flex-wrap:nowrap;
    justify-content:flex-start;
    align-content:center;
    align-items:center;
    position:relative;
    z-index:1
}
.pt-promofixed .promofixed-list-item .pt-item .pt-img{
    width:60px;
    min-width:60px
}
.pt-promofixed .promofixed-list-item .pt-item .pt-img img{
    width:100%;
    height:auto
}


.pt-block-title+.pt-tab-wrapper{
    position:relative
}
.pt-filter-nav{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
    justify-content:center;
    align-content:stretch;
    align-items:center;
    position:relative;
    z-index:2;
    margin-top:-17px;
    padding-bottom:23px
}
.pt-filter-nav .button,.pt-filter-nav a.button{
    color:#333;
    font-weight:800;
    font-size:13px;
    line-height:34px;
    letter-spacing:.04em;
    cursor:pointer;
    transition:all .2s linear
}
@media (min-width:576px){
    .pt-filter-nav .button,.pt-filter-nav a.button{
        padding:5px;
        margin:0 7px
    }
}
.pt-filter-nav .button.active,.pt-filter-nav a.button.active{
    color:#48cab2;
    cursor:default
}
.pt-filter-nav .button:hover,.pt-filter-nav a.button:hover{
    color:#48cab2
}
@media (max-width:575px){
    .pt-filter-nav{
        margin-top:-12px;
        padding-bottom:28px
    }
    .pt-filter-nav .button{
        padding:0 5px;
        margin:0 3px
    }
}
.pt-compare-table02{
    display:flex;
    flex-direction:row;
    flex-wrap:nowrap;
    justify-content:flex-start;
    align-content:stretch;
    vertical-align:top;
    position:relative;
    top:9px
}
.pt-compare-table02 .pt-col-title>:nth-child(even),.pt-compare-table02 .pt-item>:nth-child(even){
    background-color:#f8f8f8
}
.pt-compare-table02 .pt-col-title{
    position:relative;
    width:293px
}
.pt-compare-table02 .pt-col-title .title-item{
    padding:10px 20px 8px 20px;
    font-size:16px;
    line-height:22px;
    color:#777
}
.pt-compare-table02 .pt-col-title .title-item.js_one-height-01{
    padding:20px
}
@media (min-width:1240px){
    .pt-compare-table02 .pt-col-item{
        width:calc(100% - 286px)
    }
}
@media (max-width:1239px){
    .pt-compare-table02 .pt-col-item{
        width:calc(100% - 200px)
    }
}
@media (max-width:575px){
    .pt-compare-table02 .pt-col-item{
        width:calc(100% - 150px)
    }
}
@media (max-width:450px){
    .pt-compare-table02 .pt-col-item{
        width:calc(100% - 110px)
    }
    .pt-compare-table02 .pt-col-item .pt-product-box [class^=btn] .pt-icon{
        display:none
    }
}
.pt-compare-table02 .pt-col-item .compare-row-item{
    display:flex;
    flex-direction:row;
    flex-wrap:nowrap;
    justify-content:flex-start;
    align-content:stretch
}
@media (min-width:1025px){
    .pt-compare-table02 .pt-col-item .pt-item{
        width:33.333%
    }
}
@media (max-width:1024px){
    .pt-compare-table02 .pt-col-item .pt-item{
        width:50%
    }
}
@media (max-width:789px){
    .pt-compare-table02 .pt-col-item .pt-item{
        width:100%
    }
    .pt-compare-table02 .pt-col-item .pt-item .pt-product-box{
        padding-right:0
    }
}
.pt-compare-table02 .pt-col-item .pt-product-box{
    padding:0 15px 40px;
    display:block;
    position:relative
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-remove-item{
    display:inline-block;
    color:#333;
    transition:color .2s
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-remove-item:hover{
    color:#48cab2
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-img{
    position:relative;
    display:block;
    margin-top:12px
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-img img{
    width:100%;
    height:auto
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-label-location{
    position:absolute;
    top:7px;
    left:7px;
    margin-right:53px;
    z-index:2;
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
    justify-content:flex-start;
    align-content:stretch;
    align-items:flex-start
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-label-location [class^=pt-label-]{
    margin-left:3px;
    margin-top:3px;
    font-size:12px;
    line-height:1;
    color:#fff;
    font-weight:800;
    padding:5px 7px 4px
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-label-location .pt-label-new{
    background:#327fd9;
    color:#fff
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-label-location .pt-label-sale{
    background:#e12c43;
    color:#fff
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-label-location .pt-label-our-fatured{
    background:#ffba0a;
    color:#fff
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-label-location .pt-label-our-stock{
    background:#333;
    color:#fff
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-label-location .pt-label-in-stock{
    background:#48cab2;
    color:#fff
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-add-info{
    list-style:none;
    margin:16px 0 0 0;
    padding:0;
    display:flex;
    flex-direction:column
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-add-info li{
    font-size:13px;
    line-height:19px;
    color:#777
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-add-info li a{
    color:#777;
    transition:color .2s linear;
    text-decoration:none
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-add-info li a:hover{
    color:#777;
    text-decoration:underline
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-title{
    margin-top:2px;
    font-size:16px;
    line-height:19px;
    font-weight:400;
    color:#333
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-title a{
    color:#333;
    text-decoration:none
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-title a:hover{
    text-decoration:underline
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-price{
    color:#48cab2;
    font-weight:800;
    font-size:18px;
    transition:opacity .2s linear;
    position:relative;
    margin-top:9px
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-price .new-price{
    color:#e12c43
}
.pt-compare-table02 .pt-col-item .pt-product-box .pt-price .old-price{
    color:#777;
    font-weight:400;
    text-decoration:line-through
}
.pt-compare-table02 .pt-col-item .pt-product-box .btn{
    margin-top:12px
}
.pt-compare-table02 .pt-col-item .pt-value{
    font-size:16px;
    line-height:22px;
    text-align:left;
    color:#333;
    font-weight:800;
    padding:10px 15px 8px
}
.pt-compare-table02.slick-init{
    position:relative;
    margin-top:37px
}
.pt-compare-table02 .slick-track{
    margin:0
}
.pt-compare-table02 .slick-arrow{
    opacity:0
}
@media (max-width:790px){
    .pt-compare-table02 .arrow-location-center-02 .slick-arrow.slick-prev{
        left:15px
    }
}
#pt-pageContent .pt-empty-layout{
    display:flex;
    flex-direction:column;
    flex-wrap:wrap;
    justify-content:flex-start;
    align-content:center;
    align-items:center;
    text-align:center;
    padding:33px 0 92px 0
}
#pt-pageContent .pt-empty-layout .pt-icon{
    color:#ebebeb
}
#pt-pageContent .pt-empty-layout .pt-title{
    margin-top:35px;
    max-width:694px
}
#pt-pageContent .pt-empty-layout .pt-title:not([class^=pt-size]){
    font-size:36px;
    line-height:43px
}
#pt-pageContent .pt-empty-layout .pt-title.pt-size-large{
    font-size:64px;
    line-height:77px
}
#pt-pageContent .pt-empty-layout .pt-title-02{
    color:#ebebeb;
    font-size:36px;
    line-height:43px;
    font-weight:800;
    padding:0;
    margin:0
}
#pt-pageContent .pt-empty-layout .pt-title-02+.pt-title{
    margin-top:16px
}
#pt-pageContent .pt-empty-layout p{
    margin-top:20px;
    max-width:664px
}
#pt-pageContent .pt-empty-layout .pt-size-large+p{
    margin-top:25px
}
#pt-pageContent .pt-empty-layout .btn{
    margin-top:10px;
    min-width:180px;
    margin-left:10px
}
#pt-pageContent .pt-empty-layout .row-btn{
    margin-top:22px
}
#pt-pageContent .pt-empty-layout .pt-title+.row-btn{
    margin-top:29px
}
#pt-pageContent .pt-empty-layout>:nth-child(1){
    margin-top:0
}
@media (max-width:790px){
    #pt-pageContent .pt-empty-layout .pt-title.pt-size-large{
        font-size:55px;
        line-height:66px
    }
}
@media (max-width:575px){
    #pt-pageContent .pt-empty-layout .pt-title.pt-size-large{
        font-size:38px;
        line-height:48px
    }
    #pt-pageContent .pt-empty-layout .pt-title-02{
        font-size:33px;
        font-size:40px
    }
}
.pt-lookbook-list{
    margin-top:-10px
}
.pt-lookbook-list.row{
    margin-left:-5px;
    margin-right:-5px
}
.pt-lookbook-list [class^=col]{
    margin-top:10px;
    padding-left:5px;
    padding-right:5px
}
.pt-lookbook{
    text-align:center;
    position:relative
}
.pt-lookbook img{
    width:100%;
    height:auto
}
.pt-lookbook .pt-hotspot{
    position:absolute;
    color:#fff;
    font-size:14px;
    line-height:1;
    cursor:pointer;
    width:30px;
    height:30px
}
.pt-lookbook .pt-hotspot .pt-btn{
    width:30px;
    height:30px;
    padding:5px;
    position:absolute;
    top:0;
    left:0;
    z-index:2;
    background:rgba(255,255,255,.8);
    border-radius:50%;
    transition:padding .2s
}
.pt-lookbook .pt-hotspot .pt-btn:after{
    content:'';
    display:block;
    width:100%;
    height:100%;
    top:attr(data-style-top);
    background-color:#48cab2;
    border-radius:50%;
    transition:background-color .2s
}


/*
<!-- Counter CSS -->
*/
 
.counter-box {
    display: block;
    background: #f6f6f6;
    padding: 40px 20px 37px;
    text-align: center
}

.counter-box p {
    margin: 5px 0 0;
    padding: 0;
    color: #909090;
    font-size: 18px;
    font-weight: 500
}

.counter-box i {
    font-size: 60px;
    margin: 0 0 15px;
    color: #d2d2d2
}

.counter { 
    display: block;
    font-size: 32px;
    font-weight: 700;
    color: #666;
    line-height: 28px
}

.counter-box.colored {
      background: #3acf87;
}

.counter-box.colored p,
.counter-box.colored i,
.counter-box.colored .counter {
    color: #fff
}

</style>