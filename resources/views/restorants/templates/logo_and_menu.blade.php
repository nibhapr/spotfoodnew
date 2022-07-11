  <!-- header -->
  <section id='header' class='header section-header'>
      <div class='packer'>
          <div class='package'>
              <div class='left'>

                @if(config('app.isft'))
                    <a href='/' class='logo'>
                        <picture style="filter: brightness(0) invert(1);">
                            <source srcset="{{ config('global.site_logo') }}" media="(min-width: 569px)" />
                            <img loading="lazy" src='{{ config('global.site_logo') }}' />
                        </picture>
                    </a>
                @else
                    @if(!config('settings.hide_project_branding')||(!isset($restorant)))
                        <!-- Project branding -->
                        <a href='/' class='logo'>
                            <picture>
                                <source srcset="{{ config('global.site_logo') }}" media="(min-width: 569px)" />
                                <img loading="lazy" src='{{ config('global.site_logo') }}' />
                            </picture>
                        </a>
                    @else
                        <a class="logo" id="topLightLogo" href="#">
                            <picture>
                                <source srcset="{{$restorant->logowide }}" media="(min-width: 569px)" />
                                <img loading="lazy" src='{{$restorant->logowide }}' />
                            </picture>
                        </a>
                    @endif
                    @endif
              </div>
              <div class='right'>
                  <nav id='menu'>

                    <!-- Buttons -->
                    @isset($restorant)
                        @if(config('app.isqrsaas'))
                            @if(config('settings.enable_guest_log'))
                                <a href='{{ route('register.visit',['restaurant_id'=>$restorant->id])}}' class='toggle-pre-wrapper'>{{ __('Register visit') }}</a>
                            @endif
                            @if(!config('settings.is_whatsapp_ordering_mode') && !$restorant->getConfig('disable_callwaiter', 0) && strlen(config('broadcasting.connections.pusher.app_id')) > 2 && strlen(config('broadcasting.connections.pusher.key')) > 2 && strlen(config('broadcasting.connections.pusher.secret')) > 2)
                                <a data-toggle="modal" data-target="#modal-form" href='javascript:;' class='featured'>{{ __('Call Waiter') }}</a> 
                            @endif
                            @if(isset($hasGuestOrders)&&$hasGuestOrders)
                                <a href='{{ route('guest.orders')}}' class='featured'>{{ __('My Orders') }}</a>
                            @endif
                        @endif

                        <!--- Languaages -->
                        @if (isset($showGoogleTranslate)&&$showGoogleTranslate&&!$showLanguagesSelector)
                            @include('googletranslate::buttons')
                        @endif
                        @if ($showLanguagesSelector)
                            <div class='dropdown'>
                                <a class='dropdown-toggle' href='javascript:;'>{{ $currentLanguage }}</a>
                                <div class='dropdown-menu'>
                                    <div class='dropdown-menu-title'><strong>{{ __('Select Language') }}</strong></div>
                                    @foreach ($restorant->localmenus()->get() as $language)
                                            @if ($language->language!=config('app.locale'))
                                                <a href='?lang={{ $language->language }}'>{{$language->languageName}}</a>
                                            @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <!-- End Languages -->
                       
                    @endisset
                    <!--- End buttons -->



                    
                    
                    <!-- <a href='javascript:;' class='featured'>Login/Sign up</a> -->
                    @if(config('app.isft'))
                        
                        @auth()
                            <a href='/home' class='featured'>{{ __('Dashboard') }}</a>
                        @endauth
                        @guest()
                            <a href='/login' class='featured'>{{ __('Login') }}</a>
                        @endguest
                    @endif


                  </nav>
              </div>
              <div class='related-mobile-menu'>
                  <a href="javascript:;" class='show-mobile-menu'><i class="las la-bars"></i></a>
              </div>
          </div>
      </div>
  </section>