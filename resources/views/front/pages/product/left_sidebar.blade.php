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
                <h2 class="page-title">{{{__('Product Collections')}}}</h2>
                <ul class="breadcrumb-pages">
                    <li class="page-item"><a class="page-item-link" href="{{route('front')}}">{{__('Home')}}</a></li>
                    <li class="page-item">{{__('Product Collections')}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end here  -->

    <!-- Product Area Start -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-widget-area mobile-sidebar">
                        <div class="sidebar-widget-header d-block d-lg-none">
                            <div class="widget-header-wrap">
                                <h5 class="offcanvas-title">{{__('Filter')}}</h5>
                                <button type="button" class="btn-close text-reset sidebar-close"></button>
                            </div>
                        </div>

                        <div class="single-widget search-widget">
                            <h3 class="widget-title">{{__('Search Products...')}}</h3>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control " id="searchwidget" name="searchwidget" placeholder="Solar Panel Store" />
                                    <button type="button" class="search-btn"><i class="flaticon-search searchWidget"></i></button>
                                </div>
                            </form>
                        </div>
                <div class="single-widget brand-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{__('Brand')}}</h3>
                    <div class="brand-list">
                        @foreach($brands as $brand)
                            @if($brand->Status==1)
                            <div class="single-brand">
                                <div class="brand-left">
                                    <input class="form-check-input CheckBrandMobile" type="checkbox" value="{{$brand->en_BrandName}}">
                                    <label class="form-check-label" for="Renuar">{{$brand->en_BrandName}}</label>
                                </div>
                                <span class="brand-count">{{productBrandCount($brand->id)}}</span>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                       <!--  <div class="single-widget categories-widget">
                            <h3 class="widget-title">{{__('Categories')}}</h3>
                            <div class="categories-list">
                                @foreach($category as $cateogories)
                                    <div class="single-categorie">
                                        <div class="categorie-left">
                                            <input class="form-check-input CheckCategory" type="checkbox"  value="{{$cateogories->en_Category_Name}}">
                                            <label class="form-check-label">{{$cateogories->en_Category_Name}}</label>
                                        </div>
                                        <span class="categories-count">{{productCategoryCount($cateogories->id)}}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div> -->

                        <div class="single-widget price-widget">
                            <h3 class="widget-title">{{__('Price')}}</h3>
                            <form>
                                <div class="price-wrap">
                                    <div class="price-wrap-left">
                                        <div class="single-price">
                                            <input type="number" class="form-control" id="minPrice" name="min_price" placeholder="{{__('$ Min')}}" min="1"/>
                                        </div>
                                        <div class="single-price">
                                            <input type="number" class="form-control" id="maxPrice" name="max_price" placeholder="{{__('$ Max')}}" />
                                        </div>
                                    </div>
                                    <button type="button" class="price-submit PriceSubmit"><i class="fas fa-play"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="single-widget colors-widget">
                            <h3 class="widget-title">{{__('Colors')}}</h3>
                            <div class="colors-list">
                                @foreach($colors as $color)
                                    <div class="single-colors">
                                        <div class="colors-left">
                                            <input style="background: {{$color->ColorCode}}" class="form-check-input checkColor"  type="checkbox" id="{{$color->ColorCode}}" value="{{$color->Name}}">
                                            <label class="form-check-label" for="{{$color->ColorCode}}">{{$color->Name}}</label>
                                        </div>
                                        <span class="colors-count">{{productColorCount($color->id)}}</span>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="single-widget size-widget">
                            <h3 class="widget-title">{{__('Size')}}</h3>
                            <div class="size-list">
                                @foreach($sizes as $size)
                                    <div class="single-size">
                                        <input class="form-check-input checkSize" type="checkbox" id="{{$size->id}}" value="{{$size->Size}}">
                                        <label class="form-check-label" for="{{$size->id}}">{{$size->Size}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                         

                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="product-section-top">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="product-section-top-left">
                                    <button class="sidebar-filter d-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                        {{__('Filter')}} <img src="{{asset('frontend/assets/images/angle-down.svg')}}" alt="angle-down" />
                                    </button>
                                    <div class="list-grid-view">
                                        <a href="{{route('product.list.left.sidebar')}}" class="view-btn list-view active"><img class="view-icon" src="{{asset('frontend/assets/images/view-list.svg')}}" alt="view-list" /></a>
                                        <a href="{{route('all.product')}}" class="view-btn grid-view"><img class="view-icon" src="{{asset('frontend/assets/images/view-grid.svg')}}" alt="view-grid" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-filter">
                                    <form>
                                        <select class="form-select sortingFilter" >
                                            <option selected value="Products">{{__('All Products')}}</option>
                                            <option   value="Categories">{{__('Categories')}}</option>
                                            <option  value="Brands">{{__('Brand')}}</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="filterProductleftsidebar">
                        <div class="product-list">
                                 <div class="product-list">

                                      <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-sm-6">
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
                                            @foreach($product->product_tags as $ppt)
                                                <h4 class="product-catagory">{{$ppt->tag}}</h4>
                                            @endforeach
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
                                            oooooooooo<a href="javascript:void(0)" title="{{__('Add to cart')}}" class="add-cart addCart" data-id="{{$product->id}}" @if(!$user) style="pointer-events: none; cursor: default;" @endif>{{__('Add To Cart')}} <i class="icon fas fa-plus-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                       
                        <div class="pagination-area mt-30">
                            <ul class="paginations text-center">
                                {{ $products->links('vendor.pagination.custom') }}
                            </ul>
                        </div>
                    </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- For Mobile Filter Sidebar Start -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{__('Filter')}}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="sidebar-widget-area">
                <div class="single-widget search-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{__('Search Products...')}}</h3>
                    <form action="#">
                        <div class="form-group">
                            <input type="text" class="form-control bg-color" id="searchWidgetMobile" name="searchWidgetMobile" placeholder="{{__('Solar Panel Store')}}" />
                            <button type="button" class="search-btn searchWidgetMobile"><i class="flaticon-search"></i></button>
                        </div>
                    </form>
                </div>

                  <div class="single-widget brand-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{__('Brand')}}</h3>
                    <div class="brand-list">
                        @foreach($brands as $brand)
                         @if($brand->Status==1)
                            <div class="single-brand">
                                <div class="brand-left">
                                    <input class="form-check-input CheckBrandMobile" type="checkbox" value="{{$brand->en_BrandName}}">
                                    <label class="form-check-label" for="Renuar">{{$brand->en_BrandName}}</label>
                                </div>
                                <span class="brand-count">{{productBrandCount($brand->id)}}</span>
                            </div>
                            @endif
                        @endforeach
                    </div>
            </div>

            
           <!--      <div class="single-widget categories-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{__('Categories')}}</h3>
                    <div class="categories-list">
                        @foreach($category as $cateogories)
                            <div class="single-categorie">
                                <div class="categorie-left">
                                    <input class="form-check-input CheckCategoryMobile" type="checkbox"  value="{{$cateogories->en_Category_Name}}">
                                    <label class="form-check-label">{{$cateogories->en_Category_Name}}</label>
                                </div>
                                <span class="categories-count">{{productCategoryCount($cateogories->id)}}</span>
                            </div>
                        @endforeach
                    </div>
                </div> -->
                <div class="single-widget price-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{__('Price')}}</h3>
                    <form>
                        <div class="price-wrap">
                            <div class="price-wrap-left">
                                <div class="single-price">
                                    <input type="number" class="form-control" id="minPriceMobile" name="minprice1" placeholder="{{__('$ Min')}}" />
                                </div>
                                <div class="single-price">
                                    <input type="number" class="form-control" id="maxPriceMobile" name="maxprice1" placeholder="{{__('$ Max')}}" />
                                </div>
                            </div>
                            <button type="button" class="price-submit PriceSubmitMobile"><i class="fas fa-play"></i></button>
                        </div>
                    </form>
                </div>
                <div class="single-widget colors-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{__('Colors')}}</h3>
                    <div class="colors-list">
                        @foreach($colors as $color)
                            <div class="single-colors">
                                <div class="colors-left">
                                    <input style="background: {{$color->ColorCode}}" class="form-check-input checkColorMobile"  type="checkbox" id="{{$color->ColorCode}}" value="{{$color->Name}}">
                                    <label class="form-check-label" for="{{$color->ColorCode}}">{{$color->Name}}</label>
                                </div>
                                <span class="colors-count">{{productColorCount($color->id)}}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="single-widget size-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{__('Size')}}</h3>
                    <div class="size-list">

                        @foreach($sizes as $size)
                            <div class="single-size">
                                <input class="form-check-input checkSizeMobile" type="checkbox" id="{{$size->id}}" value="{{$size->Size}}">
                                <label class="form-check-label" for="{{$size->id}}">{{$size->Size}}</label>
                            </div>
                        @endforeach

                    </div>
                </div>
              
        </div>
    </div>
    </div>
    <!-- For Mobile Filter Sidebar End -->

    <!-- Product Area End -->
    <div id="leftSideShortingUrl" data-url="{{route('product.shorting.left.side')}}"></div>
    <div id="leftCheckCategoryFilter" data-url="{{route('product.filtering.left.side')}}"></div>
    <div id="leftSideCheckCategoryFilter" data-url="{{route('product.filtering.left.side')}}"></div>
    <div id="leftSideCheckColorFilter" data-url="{{route('product.filtering.left.side')}}"></div>
    <div id="leftSideCheckBrandFilter" data-url="{{route('product.filtering.left.side')}}"></div>
    <div id="leftSideCheckSizeFilter" data-url="{{route('product.filtering.left.side')}}"></div>
    <div id="searchWidgetFilter" data-url="{{route('product.filtering.left.side')}}"></div>
    <div id="leftSideMinMaxPriceFilter" data-url="{{route('product.filtering.left.side')}}"></div>

    <div id="AddToCompareListItem" data-url="{{route('compare.list')}}"></div>
    <div id="AddToCartIntoSession" data-url="{{ route('add.to.cart') }}"></div>
    <div id="productWishlist" data-url="{{route('product.wishlist')}}"></div>
    <div id="productImgAsset" data-url="{{asset(ProductImage())}}"></div>

    @push('post_script')
        <script src="{{asset('frontend/assets/js/pages/left-sidebar-product.js')}}"></script>
    @endpush
@endsection
