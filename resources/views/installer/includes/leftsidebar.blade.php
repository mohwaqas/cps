<div class="sidebar__area">
    <div class="sidebar__close">
        <button class="close-btn">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="sidebar__brand">
        <a href="{{route('installer.dashboard')}}">
            <img src="{{asset(IMG_LOGO_PATH.$allsettings['footer_logo'])}}" alt="icon">
        </a>
    </div>
    <ul id="sidebar-menu" class="sidebar__menu">
        <li class="{{ isset($menu) && $menu == 'dashboard' ? 'mm-active' : ''  }}">
            <a href="{{route('installer.dashboard')}}">
                <img src="{{asset('admin/images/icons/sidebar/dashboard.svg')}}" alt="icon">
                <span>{{__('Dashboard')}}</span>
            </a>
        </li>

        <li class="{{ isset($menu) && $menu == 'shipment' ? 'mm-active' : ''  }}">
            <a href="{{route('installer.orders')}}">
                <i class="fas fa-shopping-cart"></i>
                <span>{{__('My Orders')}}</span>
            </a>
        </li>
    </ul>
</div>
