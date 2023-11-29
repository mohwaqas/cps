@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')
<!-- breadcrumb area start here  -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-wrap text-center">
            <h2 class="page-title" style="color: #fff;">{{__('About Us')}}</h2>
          <!--   <ul class="breadcrumb-pages">
                <li class="page-item"><a class="page-item-link" href="{{route('front')}}">{{__('Home')}}</a></li>
                <li class="page-item">{{__('About Us')}}</li>
            </ul> -->
        </div>
    </div>
</div>
 
<!--    <div class="about-us-area section">
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="about-us-image">
                    <img src="{{asset(aboutUsPage().siteContentAboutPage('about_us')->Image)}}" alt="{{__('about us image')}}" />
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="about-us-content">
                    <div class="section-header-area">
                        <h2 class="section-title">Our Objectives</h2>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-us-area section">
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="about-us-image">
                    <img src="{{asset(aboutUsPage().siteContentAboutPage('about_us')->Image)}}" alt="{{__('about us image')}}" />
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="about-us-content">
                    <div class="section-header-area">
                        <h2 class="section-title">{!! clean(langConverter(siteContentAboutPage('about_us')->en_Title_One,siteContentAboutPage('about_us')->fr_Title_One)) !!}</h2>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
-->






<!-- about us area end here  -->
<!-- service area start here  -->
 
  <div class="section-header-area text-center mt-5"> 
            <h2 class="section-title wow fadeInUp animated" data-wow-delay="0s">Our Clean Power Store</h2>
 </div>


<div class="service-area section-bg">
    <div class="container-fluid p-0">
        <div class="row align-items-center g-0" style="background: #fff">
            <div class="col-lg-6">
                <div class="service-left"><br><br><br>
                     <img style="width:98%;  " src="{{ URL::to('/') }}/uploaded_files/video/vid.gif" alt="{{__('about us image')}}" />  

                </div>
            </div>
              <div class="col-lg-5 col-md-6 wow fadeInRight animated" data-wow-delay="1s" >
                <div class="about-us-content">
                    <div class="section-header-area">
                       
                    </div><span style="color:rgb(85,85,85);font-family:Roboto, Arial, Helvetica, sans-serif;">
                    Clean power store is the leading store with a lot of innovations in the form of solar-based products. We are focused to bring about affordable resources for you. Therefore, we have devised the latest products of solar that are not only economic but long-lasting on their own. Our company wants to enable solar products accessible to everyone without the fear of expenses, quality, and effectiveness.</span>
                </div><br>
                <div class="about-us-content"><span style="color:rgb(85,85,85);font-family:Roboto, Arial, Helvetica, sans-serif;">
                    Clean power store is thereby getting you powered by dynamic products like Solar panels, Inverters, and batteries along with the presence of solar grid kits. Likewise, don't forget our off-grid and grid-tie products. Here you will receive products like solar starter kits, base kits, and a satisfactory list of base kits. Yet grid tie products comprise an exclusive range of power kits. Hence, with such an exclusive range of products clean power store, is endeavored to bring about better revolutions in the future.</span>
                </div><br>
                
                <div class="about-us-content">
                    {!! clean(langConverter(siteContentAboutPage('about_us')->en_Description_One,siteContentAboutPage('about_us')->fr_Description_One)) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service area end here  -->









<!-- about us area end here  -->
<!-- service area start here  -->
 
 <div class="section-header-area text-center mt-5"> 
            <h2 class="section-title wow fadeInUp animated" data-wow-delay="0s">Our Vision</h2>
 </div>


<div class="service-area section-bg">
    <div class="container-fluid p-0">
        <div class="row align-items-center g-0">
            <div class="col-lg-6 wow bounceInLeft animated" data-wow-delay="2s">
                <div class="service-left" style="background-image: url({{asset(aboutUsPage().siteContentAboutPage('comfort')->Image)}});"></div>
            </div>
            <div class="col-lg-6">
                  
                <div class="service-lsit wow lightSpeedIn animated" data-wow-delay="3s">

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="single-service">      
}
                                <div class="service-icon">
                                    <img src="{{asset(aboutUsPage().siteContentAboutPage('comfort')->Icon_One)}}" alt="{{__('service-icon')}}" />
                                </div>
                                <div class="service-info">
                                    <h3 class="service-title">{{langConverter(siteContentAboutPage('comfort')->en_Title_One,siteContentAboutPage('comfort')->fr_Title_One)}}</h3>
                                    <p class="service-content">{!!langConverter(siteContentAboutPage('comfort')->en_Description_One,siteContentAboutPage('comfort')->fr_Description_One)!!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="single-service">
                                <div class="service-icon">
                                    <img src="{{asset(aboutUsPage().siteContentAboutPage('comfort')->Icon_Two)}}" alt="{{__('service-icon')}}" />
                                </div>
                                <div class="service-info">
                                    <h3 class="service-title">{{langConverter(siteContentAboutPage('comfort')->en_Title_Two,siteContentAboutPage('comfort')->fr_Title_Two)}}</h3>
                                    <p class="service-content">{!!langConverter(siteContentAboutPage('comfort')->en_Description_Two,siteContentAboutPage('comfort')->fr_Description_Two)!!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="single-service">
                                <div class="service-icon">
                                    <img src="{{asset(aboutUsPage().siteContentAboutPage('comfort')->Icon_Three)}}" alt="service-icon" />
                                </div>
                                <div class="service-info">
                                    <h3 class="service-title">{{langConverter(siteContentAboutPage('comfort')->en_Title_Three,siteContentAboutPage('comfort')->fr_Title_Three)}}</h3>
                                    <p class="service-content">{!!langConverter(siteContentAboutPage('comfort')->en_Description_Three,siteContentAboutPage('comfort')->fr_Description_Three)!!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="single-service">
                                <div class="service-icon">
                                    <img src="{{asset(aboutUsPage().siteContentAboutPage('comfort')->Icon_Four)}}" alt="service-icon" />
                                </div>
                                <div class="service-info">
                                    <h3 class="service-title">{{langConverter(siteContentAboutPage('comfort')->en_Title_Four,siteContentAboutPage('comfort')->fr_Title_Four)}}</h3>
                                    <p class="service-content">{!!langConverter(siteContentAboutPage('comfort')->en_Description_Four,siteContentAboutPage('comfort')->fr_Description_Four)!!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service area end here  -->


<div class="our-features-area section-top pb-100">
    <div class="container">
        <div class="section-header-area text-center"> 
            <h2 class="section-title wow fadeInUp animated" data-wow-delay="1s">Why Choose Us</h2>
        </div>
        <div class="row our-features-area-wrap">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="single-features text-center wow fadeInRight animated" data-wow-delay="1s">
                    <div class="features-icon">
                        <img src="https://cleanpowerstore.com/uploaded_files/about_us_page/features-icon-1.png" alt="features-icon">
                    </div>
                    <h3 class="features-title">Introduction</h3>
                    <p class="features-content">Clean Power Store created by the industry’s leading solar pioneers to reduce solar costs. Clean Power Store fulfill their vow to get you powered by nature with high quality solar hybrid products ranging from solar panels, inverters, meters, fuses, charge controllers, batteries, and solar grid tie kits to all sorts of accessories.<br></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="single-features text-center wow fadeInRight animated" data-wow-delay="1s">
                    <div class="features-icon">
                        <img src="https://cleanpowerstore.com/uploaded_files/about_us_page/features-icon-2.png" alt="features-icon">
                    </div>
                    <h3 class="features-title">Team Work </h3>
                    <p class="features-content">We believe in developing and collaborating with our partners at Clean Power store. Our robust online presence and real-time customer support have made it much simpler for you to easily access product details, position orders and handle the solar projects. In the US, we have built our relationships with installers.<br></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="single-features text-center wow fadeInRight animated" data-wow-delay="2s">
                    <div class="features-icon">
                        <img src="https://cleanpowerstore.com/uploaded_files/about_us_page/features-icon-3.png" alt="features-icon">
                    </div>
                    <h3 class="features-title">Reliable Services</h3>
                    <p class="features-content">We have experienced team who are capable of resolving the issue in time. Clean Power Store is your reliable and clean energy collaborator from your first conversation through to design and even after the device has been built – it offers you flexibility and confidence.<br></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="single-features text-center wow fadeInRight animated" data-wow-delay="2s">
                    <div class="features-icon">
                        <img src="https://cleanpowerstore.com/uploaded_files/about_us_page/features-icon-1.png" alt="features-icon">
                    </div>
                    <h3 class="features-title">Trusted Partner</h3>
                    <p class="features-content">We are committed to excellence in every aspect of our work — from the equipment we use to the professionals, we hire to the completed solar installs and the entire customer experience we provide. But don’t just take our word for it. You sit back and enjoy the lower utility bills from your solar installation.<br></p>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
<style>
.section{padding: 40px!important}
 .service-area .service-lsit .single-service .service-icon {
    width: 7.6rem!important; 
}
h1{padding-top:20px;}
</style>