<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') {{__('| '. $allsettings['app_title'])}}</title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="author" content="{{$allsettings['meta_author']}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="canonical" href="{{url()->current()}}">


    <!-- fonts file -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allison&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- css file  -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/extra.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/cookie-consent.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/custom.css')}}">


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset(GeneralSettingsImage().GeneralSettings()->Favicon)}}" type="image/x-icon">

    <!-- Animation setup -->
   <!--  <script src="https://bizneez.net/assets/login/assets/js/wow.js"></script> -->
   <script src="https://cleanpowerstore.com/frontend/assets/js/wow.min.js"></script>


 
              <script>
              new WOW().init();
              </script>
              




    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-F4L5MRN0D3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-F4L5MRN0D3');
</script>

    @yield('style')

<meta name="google-site-verification" content="5L9694gUa8clhiSGTzZxZKqTPdvjSW5RcuTkvGVL6_0" />
</head>
