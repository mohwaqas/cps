<!-- Header section start -->
<header class="header__area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="header__navbar">
                    <div class="header__navbar__left">
                        <button class="sidebar-toggler">
                            <img src="{{asset('admin/images/icons/header/bars.svg')}}" alt="">
                        </button>
                    </div>
                    <div class="header__navbar__right">
                        <ul class="header__menu">
                            <li>
                                <a href="#" class="btn btn-dropdown user-profile" data-bs-toggle="dropdown">
                                    <img src="{{!is_null(Auth::user()->image) ? asset(AdminProfilePicture().Auth::user()->image) : Avatar::create(Auth::user()->name)->toBase64()}}" alt="{{__('icon')}}">
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{route('front')}}">
                                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                            <span>{{__('Back to Website')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header section end -->
