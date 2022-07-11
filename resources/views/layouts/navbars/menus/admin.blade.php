<ul class="navbar-nav">
    @if(config('app.ordering'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
            </a>
        </li>
        @if(config('app.isft'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('orders.index') }}">
                <i class="ni ni-basket text-orange"></i> {{ __('Orders') }}
            </a>
        </li>
        @endif
    @endif
 <!--<li class="nav-item">
            <a class="nav-link" href="{{ route('drivers.index') }}">
                <i class="ni ni-delivery-fast text-pink"></i> {{ __('Drivers') }}
            </a>
        </li>-->
        @if (config('app.isft'))
        <li class="nav-item">
            <a class="nav-link" href="/live">
                <i class="ni ni-basket text-success"></i> {{ __('Live Orders') }}<div class="blob red"></div>
            </a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients.index') }}">
                <i class="ni ni-single-02 text-blue"></i> {{ __('Clients') }}
            </a>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.restaurants.index') }}">
                <i class="ni ni-shop text-info"></i> {{ __('Restaurants') }}
            </a>
        </li>
        @if(config('app.isft'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reviews.index') }}">
                <i class="ni ni-diamond text-info"></i> {{ __('Reviews') }}
            </a>
        </li>
        @endif
       
        <!--<li class="nav-item">
            <a class="nav-link" href="{{ route('cities.index') }}">
                <i class="ni ni-building text-orange"></i> {{ __('Cities') }}
            </a>
        </li>-->
       
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pages.index') }}">
                <i class="ni ni-ungroup text-info"></i> {{ __('Pages') }}
            </a>
        </li>
         @if(config('settings.enable_pricing'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('plans.index') }}">
                <i class="ni ni-credit-card text-orange"></i> {{ __('Pricing plans') }}
            </a>
        </li>
        @endif
       
        @if(config('app.ordering')&&config('settings.enable_finances_admin'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('finances.admin') }}">
                <i class="ni ni-money-coins text-blue"></i> {{ __('Finances') }}
            </a>
        </li>
        @endif
        
        
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.restaurant.banners.index') }}">
                <i class="ni ni-album-2 text-green"></i> {{ __('Banners') }}
            </a>
         </li>
        
        @if(config('app.isqrsaas'))
            @if(config('settings.showlandingmanagment',false)||config('settings.is_whatsapp_ordering_mode')||config('settings.is_pos_cloud_mode'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.landing') }}">
                        <i class="ni ni-html5 text-green"></i> {{ __('Landing Page') }}
                    </a>
                </li>
            @endif
        <li class="nav-item">
            <?php
                $theLocaleToOpen=strtolower(config('settings.app_locale'));
                if( strtolower(session('applocale_change')).""!=""){
                    $theLocaleToOpen=strtolower(session('applocale_change'));
                }
            ?>
            <a class="nav-link" target="_blank" href="{{ url('/admin/languages')."/".$theLocaleToOpen."/translations" }}">
                <i class="ni ni-world text-orange"></i>{{ __('Translations') }}
            </a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" target="_blank" href="{{ url('/admin/languages')."/".strtolower(config('settings.app_locale'))."/translations" }}">
                <i class="ni ni-world text-orange"></i> {{ __('Translations') }}
            </a>
        </li>
        @endif

        @foreach (auth()->user()->getExtraMenus() as $menu)
            <li class="nav-item">
                    <a class="nav-link" href="{{ route($menu['route']) }}">
                        <i class="{{ $menu['icon'] }}"></i> {{ __($menu['name']) }}
                    </a>
            </li>
        @endforeach

        <li class="nav-item">
            <a class="nav-link" href="{{ route('settings.index') }}">
                <i class="ni ni-settings text-black"></i> {{ __('Site Settings ') }}
            </a>
        </li>

 
</ul>
