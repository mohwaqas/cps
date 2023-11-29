@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')
<!-- breadcrumb area start here  -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-wrap text-center">
            <h2 class="page-title" style="color: #fff;">Contact Us</h2>
            <ul class="breadcrumb-pages">
                <li class="page-item"><a class="page-item-link" href="{{route('front')}}">{{__('Home')}}</a></li>
                <li class="page-item">Contact Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb area end here  -->
<!-- contact us area start here  -->
<div class="contact-us-area section-bottom">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-10 offset-lg-1"> --}}
                <div class="contact-us-top">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-contact-info border-0 text-center">
                                <img class="contact-info-icon" src="{{asset('frontend/assets/images/contact-info-1.png')}}" alt="contact-info" />
                                <h3 class="contact-info-title">{{__('Message')}}</h3>
                                <p class="contact-info-content">Toll Free Send us a text & an ambassador will respond <br>+1 214-915-8802</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-contact-info text-center">
                                <img class="contact-info-icon" src="{{asset('frontend/assets/images/contact-info-2.png')}}" alt="contact-info" />
                                <h3 class="contact-info-title">{{__('Address')}}</h3>
                                <p class="contact-info-content">{{__('2626 Sea Harbor Rd, Dallas, TX 75212')}} </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-contact-info text-center">
                                <img class="contact-info-icon" src="{{asset('frontend/assets/images/contact-info-3.png')}}" alt="contact-info" />
                                <h3 class="contact-info-title">{{__("We're Open")}}</h3>
                                <p class="contact-info-content">{{__('Our store has opened for shopping, exchanges Every day 11am to 7pm')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-form-area">
                    <div class="contct-form-top text-center">
                        <h2 class="form-title">{{__('Got any questions?')}}</h2>
                        <p class="form-subtitle">{{__('Use the form below to get in touch with the sales team')}}</p>
                    </div>
                    <form method="post" action="{{route('contact.us.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="{{__('First Name')}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="{{__('Last Name')}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{__('Email Address')}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="{{__('Contact Number')}}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control message-box" id="message" name="message" rows="3" placeholder="{{__('Type Message Here..')}}"></textarea>
                                </div>
                                <?php
                                $digits = 3;
                                    $captcha_code = rand(pow(10, $digits-1), pow(10, $digits)-1);
                                ?>
                                <div class="form-button text-center">
                                    <div class="row">
                                        <div class="col-md-8"><div class="form-group"> <input type="text" onblur="check_captcha()" class="form-control" id="captcha" name="captcha" placeholder="Please enter captcha" /> </div></div>
                                        <div class="col-md-4" align="left"><div id="capt" style="    font-size: 40px; font-style: italic; margin-top: 12px;   font-family: monospace;"><?=$captcha_code?> </div></div>
                                    </div>                                   
                                    <button disabled type="submit" id="submit"  >{{__('Send Message')}}</button> 
                                    <input type="hidden" value="<?=$captcha_code?>" id="hid_c">
                                </div>
                            </div>
                        </div>
                    </form> 


                </div>
                
                <!-- <div style="width: 100%"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=2626%20Sea%20Harbor%20Rd,%20Dallas,%20TX%2075212+(cleanpowerstore)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure acres/hectares on map</a></iframe></div>
                -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13418.47043648615!2d-96.9216717!3d32.7758796!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864e85d780406327%3A0x21d4d1f6c1077dc8!2sClean%20Power%20Store!5e0!3m2!1sen!2sus!4v1678117618363!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!-- contact us area end here  -->
    @endsection

        <script>
            function check_captcha(){
                var captcha_value = $('#captcha').val();
                var captcha = $('#hid_c').val();
                  //alert(captcha); alert(captcha_value);
                if(captcha == captcha_value){   
                     $('#submit').prop('disabled', false);
                     //document.getElementById("submit").disabled = false;
                }
                else{
                     $('#submit').prop('disabled', true);
                }
                
            }
        
    </script>