<!-- footer area start here -->
 
<footer class="footer-area wow fadeInUp animated" data-wow-delay="1s">
    <div class="footer-widget-area">
        <div class="container-fluid">
            <div class="row" style="margin-right: -15px;
    margin-left: -15px;">
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                    <div class="single-widget about-widget">
                        <a href="{{route('front')}}" class="footer-brand-logo mb-25"><img src="{{asset(IMG_LOGO_PATH.$allsettings['footer_logo'])}}" alt="footer-logo" /></a>
                        <p class="address-text">
                           2626 Sea Harbor Rd, Dallas, TX 75212                         
                            
                        </p>
                        <div class="block-content mb-30">
                            <p class="contact">{{__('Call us:')}} {{$allsettings['call_us']}}</p>
                            <p class="contact">{{__('Email:')}} {{$allsettings['email']}}</p>
                        </div>
                        <br>

 


                        <ul class="social-media">
                            @if(getSocialLink()->Facebook)
                            <li class="social-media-item"><a   class="social-media-link" href="https://facebook.com/CleanPowerStore"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                           
                            @if(getSocialLink()->Twitter)
                            <li class="social-media-item"><a class="social-media-link" href="https://twitter.com/CleanPowerStore"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            
                            @if(getSocialLink()->Instagram)
                            <li class="social-media-item"><a class="social-media-link" href="https://www.instagram.com/cleanpowerstore"><i class="fab fa-instagram"></i></a></li>
                             @endif
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-md-8 col-sm-8" style="    width: 66%;">
                    <div class="row" style="width: 100%;">
                          <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="single-widget">
                                <h3 class="widget-title">{{ __('Category')}}</h3>
                                <ul class="widget-menu show">
                                    @foreach(Category() as $item)
                                    <li class="menu-item"><a class="menu-link" href="https://cleanpowerstore.com/product/category/{{$item->id}}">{{langConverter($item->en_Category_Name,$item->fr_Category_Name)}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                      
                            <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="single-widget"> 
                                 <h3 class="widget-title">{{ __('Brand')}}</h3>
                                <ul class="widget-menu">

                                    @foreach(Brnad6() as $item)
                                        <li class="menu-item"><a class="menu-link" href="{{route('brand.product',$item->id)}}">{{langConverter($item->en_BrandName,$item->fr_BrandName)}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                          <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="single-widget">
                                @if(url()->current()=='https://cleanpowerstore.com')                              
                                    <ul class="widget-menu" style="margin-top:72px">
                                @else
                                    <ul class="widget-menu" style="margin-top:54px"> 
                                @endif    
                                    @foreach(Brnad7() as $item)
                                        <li class="menu-item"><a class="menu-link" href="{{route('brand.product',$item->id)}}">{{langConverter($item->en_BrandName,$item->fr_BrandName)}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                          <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="single-widget">
                                <h3 class="widget-title">Services</h3>
                                <ul class="widget-menu">
                                    <li class="menu-item"><a class="menu-link" href="{{route('faq')}}">{{ __('Help & FAQ')}}</a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{route('terms.conditions')}}">{{ __('Terms of Conditions')}}</a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{route('privacy.policy')}}">{{ __('Privacy Policy')}}</a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{route('refund.policy')}}">{{ __('Online Returns Policy')}}</a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{route('shipping.return')}}">{{ __('Shipping & Return')}}</a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{route('contact.us')}}">{{ __('Contact Us')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
         
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container-fluid">
            <div class="footer-bottom-wrap">
                {{ $allsettings['footer_title'] }}
            </div>
        </div>
    </div>
</footer>
<!-- footer area end here -->


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ea2f2bc69e9320caac6f654/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


<style>
    .footer-area{
        background-color: #f8f8f8!important;
        padding-top: 5px;
    }
    .footer-area .footer-widget-area .single-widget .widget-title {
    margin-bottom: 3rem!important;
    font-size: 2rem!important;
    font-weight: 600!important;
    text-transform: capitalize!important;
    color: var(--black)!important;
}
.social-media-link{color: #000!important}
.footer-area .footer-widget-area{padding:0px!important}
.menu-item-new{    text-transform: uppercase!important; font-size: 18px;
    font-weight: bold!important;
    color: #000!important;}
 .page-item{display: none!important;}   
.single-grid-product .product-info .product-price .price{width: 80px!important;}
.regular-price{display: none!important;}
</style>
