<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light " style="background-color:white!important;">
    <div class="container">
      <a class="navbar-brand mr-lg-5 h-50" href="/">
        <img src="{{ config('global.site_logo_dark') }}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
        aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="/">
                <img src="{{ config('global.site_logo') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global"
                aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
            <a data-scroll href="#features" class="nav-link ckedit">{{ __('whatsapp.Services') }}</a>
          </li>
          @if(!config('global.facebook') && !config('global.instagram'))
            <!--<li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">-->
            <!--  <a data-scroll href="#product" class="nav-link" >{{ __('Order') }}</a>-->
            <!--</li>-->
          @endif
          
          <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
            <a data-scroll href="#demo" class="nav-link">{{ __('whatsapp.Scan_me') }}</a>
          </li>
          @if(count($availableLanguages)>1)
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown" role="button">
                <i class="ni ni-collection d-lg-none"></i>
                @foreach ($availableLanguages as $short => $lang)
                  @if(strtolower($short) == strtolower($locale))<span class="nav-link-inner--text">{{ $lang }}</span>@endif
                @endforeach
              </a>
              <div class="dropdown-menu">
                @foreach ($availableLanguages as $short => $lang)
                  <a href="/{{ strtolower($short) }}" class="dropdown-item">{{ $lang }}</a>
                @endforeach
              </div>
            </li>
          @endif
          @if(config('global.facebook'))
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{ config('global.facebook') }}" target="_blank"
              data-toggle="tooltip" title="Like us on Facebook">
              <i class="fa fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          @endif
          @if(config('global.instagram'))
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{ config('global.instagram') }}" target="_blank"
              data-toggle="tooltip" title="Follow us on Instagram">
              <i class="fa fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          @endif
          
          <li class="nav-item d-lg-block ml-lg-2">
            <a class="btn btn-neutral btn-icon" href="/login">
                @auth()
                  <span class="btn-inner--icon">
                    <i class="fas fa-th-large mr-2"></i>
                  </span>
                  <span class="nav-link-inner--text">{{ __('whatsapp.dashboard')}}</span>
                @endauth
                @guest()
                  <span class="btn-inner--icon">
                    <i class="fas fa-th-large mr-2"></i>
                  </span>
                  <span class="nav-link-inner--text">{{ __('whatsapp.login')}}</span>
                @endguest
            </a>
          </li>
          @guest()
          <!--<li class="nav-item d-none d-lg-block ml-lg-2">-->
          <li class="nav-item d-lg-block ml-lg-2">
            <button type="button" class="btn btn-neutral btn-icon" data-toggle="modal" data-target="#modal-register">
              <span class="btn-inner--icon">
                <i class="fas fa-paper-plane mr-2"></i>
              </span>
              <span class="nav-link-inner--text">{{ __('whatsapp.register')}}</span>
            </button>
          </li>
          @endguest
          <!--<li class="nav-item">
            <a class="btn btn-neutral" href="https://www.creative-tim.com/builder/argon" target="_blank">
              <span class="nav-link-inner--text">adasdasd</span>
            </a>
          </li>
          <li class="nav-item d-none d-lg-block">
            <a href="https://www.creative-tim.com/product/argon-design-system-pro?ref=ads-upgrade-pro" target="_blank"
              class="btn btn-neutral btn-icon">
              <span class="btn-inner--icon">
                <i class="fa fa-shopping-cart"></i>
              </span>
              <span class="nav-link-inner--text">adasdad</span>
            </a>
          </li>-->
        </ul>
      </div>
    </div>
  </nav>