@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')
    <!-- breadcrumb area start here  -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-wrap text-center">
                <h2 class="page-title">{{ __('Sign Up')}}</h2>
                <ul class="breadcrumb-pages">
                    <li class="page-item"><a class="page-item-link" href="{{route('front')}}">{{ __('Home')}}</a></li>
                    <li class="page-item">{{ __('Sign Up')}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end here  -->

    <!-- about us area start here  -->
    <div class="sign-in-page sign-up-page section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-5">
                    <div class="login-wrap">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="far fa-user"></span>
                        </div>
                        <h1 class="text-center mb-4">{{ __('Sign Up')}}</h1>
                        <form class="login-form" action="{{route('user.sign.up.post')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" placeholder="{{__('Name')}}" name="name" required="">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control rounded-left" placeholder="{{__('Email')}}" name="email" required="">
                            </div>
                            <div class="form-group" id="user_type_div">
                                <select name="user_type" id="user_type" class="form-control rounded-left user-type-dropdown" required="">
                                    <option value="" disabled selected>Select User Type</option>
                                    <option value="installer">Installer</option>
                                    <option value="non-installer">Non-Installer</option>
                                </select>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" placeholder="{{__('Password')}}" name="password" required="">
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" placeholder="{{__('Confirm Password')}}" name="confirm_password" required="">
                            </div>
                            <div class="form-group d-flex">
                                <input type="number" class="form-control rounded-left" placeholder="{{__('Phone Number')}}" name="phone"  />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3 primary-btn auth-btn">{{ __('Sign Up')}}</button>
                            </div>
                            <hr>
                            <div class="form-group">
                                <a href="{{route('user.redirect_google')}}" class="form-control btn btn-primary rounded submit px-3 google-btn"><i class="fab fa-google"></i> {{ __('Login With Google')}}</a>
                            </div>
                            <div class="form-group">
                                <a href="{{route('user.redirect_facebook')}}" class="form-control btn btn-primary rounded submit px-3 facebook-btn"><i class="fab fa-facebook-f fa-fw"></i> {{ __('Login With Facebook')}}</a>
                            </div>
                            <hr>

                            <div class="already-have-account">
                               {{ __('Already have an account?')}}<a href="{{route('user.sign.in')}}" class="forget-password-link">{{ __('Sign In')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>

        $("#user_type").change(function(){
            let user_type = $("#user_type").val();
            if(user_type === 'installer') {
                $('#user_type_div').after('<div class="form-group" id="registration_number_div"><input type="text" class="form-control rounded-left" placeholder="Registration Number" name="registration_number" required=""></div>'); 
            } else if(user_type === 'non-installer') {
                $("#registration_number_div").remove();
            }
        });

    </script>
    <!-- about us area end here  -->
@endsection