  <!-- mobile-menu -->
  <section id='mobile-menu'>
      <a class='close-mobile-menu' href='javascript:;'>
          <i class="las la-times"></i>
      </a>
      <div class='content'>
          
        

          <!-- <div class='login'>
              <a class='button full-button' href='javascript:;'>Login/Sign up</a>
          </div> -->
          <nav>
            <!-- Buttons -->
            <?php if(isset($restorant)): ?>
                <?php if(config('app.isqrsaas')): ?>
                    <?php if(!config('settings.is_whatsapp_ordering_mode') && !$restorant->getConfig('disable_callwaiter', 0) && strlen(config('broadcasting.connections.pusher.app_id')) > 2 && strlen(config('broadcasting.connections.pusher.key')) > 2 && strlen(config('broadcasting.connections.pusher.secret')) > 2): ?>
                        <div class='item'><a data-toggle="modal" data-target="#modal-form" href='javascript:;' class='toggle-pre-wrapper'><?php echo e(__('Call Waiter')); ?></a></div>
                    <?php endif; ?>
                    <?php if(config('settings.enable_guest_log')): ?>
                        <div class='item'><a href='<?php echo e(route('register.visit',['restaurant_id'=>$restorant->id])); ?>' class='toggle-pre-wrapper'><?php echo e(__('Register visit')); ?></a></div>
                    <?php endif; ?>
                    <?php if(isset($hasGuestOrders)&&$hasGuestOrders): ?>
                        <div class='item'><a href='<?php echo e(route('guest.orders')); ?>' class='featured'><?php echo e(__('My Orders')); ?></a></div>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if(auth()->user()&&auth()->user()->hasRole('client')): ?>
                        <div class='item'><a href="/orders" class="toggle-pre-wrapper"><?php echo e(__('My Orders')); ?></a></div>
                        <div class='item'><a href="/addresses" class="toggle-pre-wrapper"><?php echo e(__('My Addresses')); ?></a></div>
                    <?php endif; ?>
                <?php endif; ?>

            <?php endif; ?>
            <!--- End buttons -->

            <!--- Languaages -->
            <?php if(isset($showGoogleTranslate)&&$showGoogleTranslate&&!$showLanguagesSelector): ?>
                <?php echo $__env->make('googletranslate::buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if($showLanguagesSelector): ?>
                <div class='item has-submenu'>
                    <a href='javascript:;'><?php echo e($currentLanguage); ?><span class='toggle-submenu'><i class="las la-angle-down"></i></span></a>
                    <div class='submenu'>
                        <?php $__currentLoopData = $restorant->localmenus()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($language->language!=config('app.locale')): ?>
                                    <div class='item'><a href='?lang=<?php echo e($language->language); ?>'><?php echo e($language->languageName); ?></a></div>
                                <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- End Languages -->
          </nav>

          
          <?php echo $__env->make('elegant-template::templates.side_cart',['id'=>'cartListMobile','idtotal'=>"totalPricesMobile"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
  </section><?php /**PATH /home/u774496545/domains/gotshi.com/public_html/modules/ElegantTemplate/Providers/../Resources/views/templates/mobile-menu.blade.php ENDPATH**/ ?>