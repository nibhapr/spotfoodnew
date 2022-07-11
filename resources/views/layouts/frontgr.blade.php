<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argonfront') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('argonfront') }}/img/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:image" content="{{ config('global.site_logo') }}">
    <title>{{ config('global.site_name','FoodTiger') }}</title>
    @notifyCss
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="{{ asset('argonfront') }}/css/font-awesome.css" rel="stylesheet" />
    <link href="{{ asset('argonfront') }}/css/nucleo-svg.css" rel="stylesheet" />
    <link href="{{ asset('argonfront') }}/css/nucleo-icons.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('argonfront') }}/css/argon-design-system.min.css?v=1.4.0" rel="stylesheet" />
    <!-- Custom CSS -->
    <link type="text/css" href="{{ asset('custom') }}/css/custom.css" rel="stylesheet">
    <!-- Select2 -->
    <link type="text/css" href="{{ asset('custom') }}/css/select2.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <style>#searchicon{padding:.5rem 1rem;color:#252c41}.header{background-image:url(https://thehungryman.in/default/thehungry.jpg);background-repeat:no-repeat;background-position:center center;background-size:cover;z-index:-1;height:350px;position:relative}.storename{color:#485273;font-weight:500!important;font-size:1.75rem}.truncate{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;font-size:.875rem;line-height:1.25rem}.prodtitle{font-size:1.1rem}.currencyd{font-size:1rem}.prodb{background-color:#fff;color:#485273}body{background-color:#f0f0f0;height:100%;word-wrap:break-word;white-space:normal;text-rendering:optimizeLegibility;color:#485273}.modal-content{background-color:#fff}.modal-header,.modal-footer{border-color:rgba(0,0,0,.12)}.table>tbody>tr>td,.table>tbody>tr>th,.table>tfoot>tr>td,.table>tfoot>tr>th,.table>thead>tr>td,.table>thead>tr>th{padding:8px;line-height:1.42857143;vertical-align:top;border-color:rgba(0,0,0,.12)}.table-success,.table-success>td,.table-success>th{background-color:#2595d3;color:white}.variationprice{opacity:.5;font-weight:600;margin-left:10px}.bg-success{background-color:#4caf50!important}.btn-outline-primary,.btn-outline-primary.disabled{background-color:white;border:solid 2px #2595d3;color:#2595d3;border-radius:10px;font-weight:600}.btn-check:checked+.btn-outline-primary,.btn-outline-primary:active{color:#fff;background-color:#2595d3;border-color:#2595d3}.lbtn{border-top-left-radius:10px!important;border-bottom-left-radius:10px!important}.rbtn{border-top-right-radius:10px!important;border-bottom-right-radius:10px!important}.btn-primary,.btn-primary:focus,.btn-primary:hover,.btn-primary:disabled,.btn-outline-primary:hover{color:#fff;background-color:#2595d3;border-color:#2595d3}.btn-check:disabled+.btn,.btn-check[disabled]+.btn{opacity:100}.logoimg{-webkit-border-radius:8px;border-radius:8px;object-fit:cover;width:150px;height:150px;box-shadow:0 0 10px 5px rgba(0,0,0,.2);margin-right:10px;margin-top:-95px}.category-header{color:#485273;font-weight:600;font-size:1.2em}.badgebg{background-color:#ff5da5}.badge1{position:absolute;bottom:5px;left:5px}.badge2{position:absolute;top:5px;right:5px}.discountpricecolor{color:#ff5da5!important}.nav{white-space:nowrap;overflow-x:auto;font-size:15px;font-weight:500;margin-top:10px;-webkit-transition:all .3s ease-out;transition:all .3s ease-out}.nav a{color:#252c41}.nav-item{border-bottom:4px transparent solid}ul.nav .nav-item.active a{color:#252c41;border-bottom:4px #ff5da5 solid}.fixedmenu{position:fixed;top:0;left:0;width:100%;background-color:#f0f0f0;margin:0;z-index:1000;-webkit-box-shadow:0 2px 10px 0 rgba(0,0,0,.2);box-shadow:0 2px 10px 0 rgba(0,0,0,.2);justify-content:center}.productimg{object-fit:cover;-webkit-border-radius:4px;border-radius:4px;width:14rem;height:12rem}.unavail{opacity:.5}.hiddenbtn{display:none}.form-check-label{font-size:13px}.search-input-field{margin-bottom:25px}#expireModal{margin-top:11%}.secondary{border:0;color:white;background-color:#2595d3;box-shadow:0 1px 10px 0 rgb(0 0 0 / 20%)}.modal-header,.modal-footer{border:0}.minimum-value-alert{background:#ff5da5;width:100%;position:fixed;top:0;z-index:1500;border-radius:3px}.floating-alert,.floating-wp-alert{background:#ff5da5;width:100%;position:fixed;top:0;z-index:1500;border-radius:3px}.floating-cart{position:fixed;bottom:0;z-index:999}.floating-cart-bg{background-color:#2595d3;-webkit-box-shadow:0 2px 10px 0 rgba(0,0,0,.3);box-shadow:0 2px 10px 0 rgba(0,0,0,.3);border-radius:4px}a.stretched-link:before{content:"";position:absolute;top:0;left:0;height:100%;width:100%}.floating-cart-text{font-size:14px;color:#fff;font-weight:600}.floating-cart-btn{font-size:14px;background:#2595d3}.empty-cart-alert{background:#ff5da5;width:100%;position:fixed;top:0;z-index:1500;border-radius:3px}.search-icon,.close-search-icon{cursor:pointer}#mapid{height:350px;width:100%;margin-top:0;margin-bottom:10px}#infomap{height:350px;width:100%;margin-top:0;margin-bottom:10px}.ui-widget{font-family:var(--bs-font-sans-serif);font-size:1em}.ui-autocomplete{z-index:1070!important}#storeinfoarea{color:#fff;margin-right:10px;margin-left:10px;border-bottom-left-radius:6px;border-bottom-right-radius:6px;border-top-left-radius:6px;border-top-right-radius:6px;-webkit-box-shadow:0 2px 10px 0 rgba(0,0,0,.3);box-shadow:0 2px 10px 0 rgba(0,0,0,.3)}#storeinfoarea2{border-bottom-left-radius:6px;border-bottom-right-radius:6px;border-top-left-radius:6px;border-top-right-radius:6px;-webkit-box-shadow:0 2px 10px 0 rgba(0,0,0,.3);box-shadow:0 2px 10px 0 rgba(0,0,0,.3)}.bg_t1{color:#292929;background-color:rgba(255,255,255,.8);border-color:rgba(255,255,255,.8)}.mainc{margin-bottom:60px;min-height:calc(100vh - 250px)}.iti{width:100%;color:#383838;font-weight:400}.iti__arrow{border:0}.iti input::placeholder{color:#B3B3B3!important}.iti-mobile .iti--container{top:200px;bottom:200px;left:30px;right:30px;position:fixed}@media only screen and (max-width:540px){#expireModal{margin-top:50%}.productimg{width:10rem;height:10rem}.modal-footer p{margin-top:2px}}</style>
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
    @if(config('app.isft'))
       @include('layouts.menu.top')
       @else
        @include('layouts.menu.top_justlogo')
   @endif

    <!-- End Navbar -->
    <div class="wrapper">
        @yield('content')
        @include('layouts.navbars.cartSideMenu')
        @include('layouts.footers.front')
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

</body>
</html>
