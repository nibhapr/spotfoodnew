  <!-- header -->
  <section id='header' class='header section-header'>
      
      <div class='packer'>
          <div class='package'>
              
              <div class='left theProjectLogo desLogo'>
                <?php echo $__env->make('elegant-template::templates.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              
              
              <div class='right'>
                    <?php echo $__env->yieldContent('addiitional_button_1'); ?>
                    <?php echo $__env->yieldContent('addiitional_button_2'); ?>
                  <nav id='menu'>
                    
                    <!-- Buttons -->
                    <?php if(isset($restorant)): ?>
                        <?php if(config('app.isqrsaas')): ?>
                            <?php if(config('settings.enable_guest_log')): ?>
                                <a href='<?php echo e(route('register.visit',['restaurant_id'=>$restorant->id])); ?>' class='toggle-pre-wrapper'><?php echo e(__('Register visit')); ?></a>
                            <?php endif; ?>
                            <?php if(!config('settings.is_whatsapp_ordering_mode') && !$restorant->getConfig('disable_callwaiter', 0) && strlen(config('broadcasting.connections.pusher.app_id')) > 2 && strlen(config('broadcasting.connections.pusher.key')) > 2 && strlen(config('broadcasting.connections.pusher.secret')) > 2): ?>
                                <a data-toggle="modal" data-target="#modal-form" href='javascript:;' class='featured'><?php echo e(__('Call Waiter')); ?></a> 
                            <?php endif; ?>
                            <?php if(isset($hasGuestOrders)&&$hasGuestOrders): ?>
                                <a href='<?php echo e(route('guest.orders')); ?>' class='featured'><?php echo e(__('My Orders')); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!--- Languaages -->
                        <?php if(isset($showGoogleTranslate)&&$showGoogleTranslate&&!$showLanguagesSelector): ?>
                            <?php echo $__env->make('googletranslate::buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <?php if($showLanguagesSelector): ?>
                            <div class='dropdown'>
                                <a class='dropdown-toggle' href='javascript:;'><?php echo e($currentLanguage); ?></a>
                                <div class='dropdown-menu'>
                                    <div class='dropdown-menu-title'><strong><?php echo e(__('Select Language')); ?></strong></div>
                                    <?php $__currentLoopData = $restorant->localmenus()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($language->language!=config('app.locale')): ?>
                                                <a href='?lang=<?php echo e($language->language); ?>'><?php echo e($language->languageName); ?></a>
                                            <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- End Languages -->
                       
                    <?php endif; ?>
                    <!--- End buttons -->



                    
                    
                    <!-- <a href='javascript:;' class='featured'>Login/Sign up</a> -->
                    <?php if(config('app.isft')): ?>
                        
                        <?php if(auth()->guard()->check()): ?>
                            <a href='/home' class='featured'><?php echo e(__('Dashboard')); ?></a>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                            <a href='/login' class='featured'><?php echo e(__('Login')); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>


                  </nav>
              </div>
              <div class='related-mobile-menu'>
                  <a href="javascript:;" class='show-mobile-menu'><i class="las la-bars"></i></a>
              </div>
          </div>
      </div>
  </section><?php /**PATH /home/u774496545/domains/gotshi.com/public_html/modules/ElegantTemplate/Providers/../Resources/views/templates/logo_and_menu.blade.php ENDPATH**/ ?>