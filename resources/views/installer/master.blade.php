<!DOCTYPE html>
<html lang="en">
@include('installer.includes.head')
<body>
    @include('installer.includes.leftsidebar')
    <div class="main-content">
        @include('installer.includes.header')
        <div class="page-content-wrap">
        <!-- Container Fluid-->
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('installer.includes.footer')
        </div>

    </div>
@include('installer.includes.script')
@include('sweetalert::alert')
</body>
</html>
