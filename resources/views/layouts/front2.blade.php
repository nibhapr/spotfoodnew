<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argonfront') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('argonfront') }}/img/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @yield('extrameta')
    <meta property="og:image" content="{{ config('global.site_logo') }}">
    <title>{{ config('global.site_name','FoodTiger') }}</title>

    @notifyCss

    <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Font Awesome Icons -->
   
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- CSS Files -->
  
    <!--<link type="text/css" href="{{ asset('custom') }}/quickzu/style.css" rel="stylesheet">-->

 <link type="text/css" href="{{ asset('custom') }}/hungry/hungry.css" rel="stylesheet">
  <link type="text/css" href="{{ asset('custom') }}/hungry/bootstrap.min.css" rel="stylesheet">
 <link type="text/css" href="{{ asset('custom') }}/hungry/icofont.min.css" rel="stylesheet">
 <link type="text/css" href="{{ asset('custom') }}/hungry/common.css" rel="stylesheet">
 <link type="text/css" href="{{ asset('custom') }}/hungry/custom.css" rel="stylesheet">
 <link type="text/css" href="{{ asset('custom') }}/hungry/timepicker.css" rel="stylesheet">
 <link type="text/css" href="{{ asset('custom') }}/hungry/swiper.css" rel="stylesheet">
 <link type="text/css" href="{{ asset('custom') }}/hungry/category1.css" rel="stylesheet">
 <link type="text/css" href="https://spotfood.in/custom/css/select2.min.css" rel="stylesheet">
    

    <!-- Select2 -->
 


    <!-- Global site tag (gtag.js) - Google Analytics -->
    @if (config('settings.google_analytics'))
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo config('settings.google_analytics'); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo config('settings.google_analytics'); ?>');
        </script>
    @endif

  @include('googletagmanager::head')
  @yield('head')
  @laravelPWA
  @include('layouts.rtl')
  

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- Custom CSS defined by admin -->
<link type="text/css" href="{{ asset('byadmin') }}/front.css" rel="stylesheet">

</head>

<body class="">
    @include('googletagmanager::body')
    @auth()
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth



    <!-- Navbar -->
    
    <!-- End Navbar -->
    <div class="wrapper">
        @yield('content')
       
        
        @if(request()->get('location') )
            @include('layouts.headers.modallocation')
        @endif
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('argonfront') }}/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('argonfront') }}/js/core/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('argonfront') }}/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('argonfront') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>

    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('argonfront') }}/js/plugins/bootstrap-switch.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('argonfront') }}/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <script src="{{ asset('argonfront') }}/js/plugins/moment.min.js"></script>

    <script src="{{ asset('argonfront') }}/js/plugins/datetimepicker.js" type="text/javascript"></script>
    <script src="{{ asset('argonfront') }}/js/plugins/bootstrap-datepicker.min.js"></script>

    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('argonfront') }}/js/argon-design-system.js?v=1.2.0" type="text/javascript"></script>
    <link href="https://spotfood.in/argonfront/css/nucleo-icons.css" rel="stylesheet">

   <!-- Import Vue -->
   <script src="{{ asset('vendor') }}/vue/vue.js"></script>
   <!-- Import AXIOS --->
   <script src="{{ asset('vendor') }}/axios/axios.min.js"></script>

    <!-- Add to Cart   -->
    <script>
        var LOCALE="<?php echo  App::getLocale() ?>";
        var CASHIER_CURRENCY = "<?php echo  config('settings.cashier_currency') ?>";
        var USER_ID = '{{  auth()->user()&&auth()->user()?auth()->user()->id:"" }}';
        var PUSHER_APP_KEY = "{{ config('broadcasting.connections.pusher.key') }}";
        var PUSHER_APP_CLUSTER = "{{ config('broadcasting.connections.pusher.options.cluster') }}";
    </script>
    <script src="{{ asset('custom') }}/js/orders.js"></script>
    <script src="{{ asset('custom') }}/js/cartFunctions.js"></script>


    <!-- Cart custom sidemenu -->
    <script src="{{ asset('custom') }}/js/cartSideMenu.js"></script>

    <!-- Notify JS -->
    <script src="{{ asset('custom') }}/js/notify.min.js"></script>

     <!-- SELECT2 -->
     <script src="{{ asset('custom') }}/js/select2.js"></script>
     <script src="{{ asset('vendor') }}/select2/select2.min.js"></script>

    <!-- All in one -->
    <script src="{{ asset('custom') }}/js/js.js?id={{ config('config.version')}}"></script>




     <!-- Google Map -->
     <script async defer src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=<?php echo config('settings.google_maps_api_key'); ?>&libraries=places&callback=js.initializeGoogle"></script>

    @if(strlen( config('broadcasting.connections.pusher.app_id'))>2)
        <!-- Pusher -->
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script src="{{ asset('custom') }}/js/pusher.js"></script>
    @endif

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @yield('js')

    @notifyJs

    <!-- Custom JS defined by admin -->
    <?php echo file_get_contents(base_path('public/byadmin/front.js')) ?>

    <script>
        window.translations = {!! Cache::get('translations'.App::getLocale()) !!};
    </script>
    
</body>

</html>
