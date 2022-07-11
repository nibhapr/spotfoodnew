
<!-- section-place-content-menu -->
<section class='section section-place-content-menu'>
    <div class='packer'>
        <div class="package">
            <nav>
                <a href='#place-menu' class='current menu-tab'><?php echo e(__('Menu')); ?></a>
                <a class='menu-tab' href='#place-info'><?php echo e(__('Info')); ?></a>
            </nav>
        </div>
    </div>
</section>
<!-- section-place-content -->
<section class='section section-place-content'>
    <div class='packer'>
        <div class='package'>
            <div id="theCartBottomButton" onClick="openNav()" class=" close-mobile-menu circle callOutShoppingButtonBottom icon icon-shape bg-gradient-red text-white rounded-circle shadow mb-4" style=" background: linear-gradient(87deg, #ffffff 0, #ffffff 100%) !important;">
                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_atunf5kv.json"  background="transparent"  speed="0.5"  style="width: 50px; height:50px;" loop autoplay></lottie-player>
            </div>
            <div class='content'>
                
                <!-- tab menu -->
                <div id='place-menu' class='holder-left <?php echo e(!$canDoOrdering?"fullHolder":""); ?> content-tab expanded'>
                    <div class='content-left'>
                        
                        <div class='categories'>
                            <div class='categories_title'><?php echo e(__('Categories')); ?></div>
                            <nav>

                            <?php $__currentLoopData = $restorant->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!$category->items->isEmpty()): ?>
                                    <div class='item'>
                                        <a href='#subsection-<?php echo $category->id; ?>'><?php echo $category->name ?></a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                               
                            </nav>



                            <!-- alergens legend -->
                                <?php if(count($allergens)>0): ?>
                                
                                    <br /><br />
                                    <div class='categories_title'><?php echo e(__('Allergens')); ?></div>
                                    <nav>

                                    <?php $__currentLoopData = $allergens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $allergen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <div class='item'>
                                            <div class='allergen' >
                                                <img  src="<?php echo e($allergen->image_link); ?>" />
                                            </div>
                                            <?php echo " ".$allergen->title ?>
                                        </div>
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                    </nav>
                        
                            <?php endif; ?>
                            <!-- alergens legend -->

                        </div>

                        

                        
                        


                    </div>
                    <div class='content-center'>

                        
                 

                        <?php if(!$restorant->categories->isEmpty()): ?>
                            <?php $__currentLoopData = $restorant->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div id='subsection-<?php echo $category->id; ?>' class='box-info'>
                                <div class='head align-center'>
                                    <h3><?php echo $category->name; ?></h3>
                                </div>
                                <div class='content'>
                                    <?php $__currentLoopData = $category->aitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href='javascript:;' onClick="setCurrentItem(<?php echo e($item->id); ?>)" class='item-offer-horizontal'>
                                            <div class='info'>
                                                <h4 class="title"><?php echo e($item->name); ?></h4>
                                                <p><?php echo e($item->short_description); ?></p>
                                                <div class='extras'>
                                                    <div class='price'>
                                                        <?php if($item->discounted_price>0): ?>
                                                        <span class="text-muted" style="text-decoration: line-through;"><?php echo money($item->discounted_price, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                                    <?php endif; ?>
                                                        <?php echo money($item->price, config('settings.cashier_currency'),config('settings.do_convertion')); ?>
                                                    </div>
                                                    

                                                       <div class="allergens">
                                                           <?php $__currentLoopData = $item->allergens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allergen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class='allergen' data-toggle="tooltip" data-placement="bottom" title="<?php echo e($allergen->title); ?>" >
                                                                <img  src="<?php echo e($allergen->image_link); ?>" />
                                                            </div>
                                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            
                                                       </div>
                                                        
                                                    
                                                </div>
                                            </div>
                                            <picture>
                                                <source srcset="<?php echo e($item->logom); ?>" media="(min-width: 569px)" />
                                                <img loading="lazy" src='<?php echo e($item->logom); ?>' />
                                            </picture>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>




                       
                    </div>
                </div>

                <!-- tab info -->
                <div id='place-info' class='holder-left <?php echo e(!$canDoOrdering?"fullHolder":""); ?> content-tab'>
                    <div class='full-width'>
                        <div class='box-info'>
                            <div class='head'>
                                <h3><i class="las la-map-marker"></i><?php echo e(__('Address')); ?></h3>
                                <div class='info'>
                                    <p><strong><?php echo e($restorant->address); ?></strong></p>
                                    <p><?php echo e($restorant->phone); ?></p>
                                </div>
                            </div>
                            <div class='content'>
                                <div class='schedule-map'>
                                    <div class='schedule'>
                                        <h4><?php echo e(__('Working Hours')); ?></h4>
                                        <ol class='items'>
                                            <?php $__currentLoopData = $wh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day=>$hours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <?php if($day==$currentDay): ?>
                                                        <div class='day'><?php echo e(__(ucfirst($day))); ?>

                                                            <span class='tag'>
                                                                <?php echo e(__('Today')); ?>

                                                            </span>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class='day'><?php echo e(__(ucfirst($day))); ?> </div>
                                                    <?php endif; ?>
                                                    <?php $__currentLoopData = $hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeRange): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class='hours'><?php echo e($timeRange->start()); ?> - <?php echo e($timeRange->end()); ?> </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </ol>
                                        
                                    </div>
                                    <div class="map">
                                        <iframe src="https://maps.google.com/maps?q=<?php echo e($restorant->lat); ?>,<?php echo e($restorant->lng); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if($canDoOrdering): ?>
                    <div class='holder-right'>
                        <!-- New cart -->
                            <?php echo $__env->make('elegant-template::templates.side_cart',['id'=>'cartList','idtotal'=>'totalPrices'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- End New cart -->
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>

   
           

</section><?php /**PATH /home/u774496545/domains/gotshi.com/public_html/modules/ElegantTemplate/Providers/../Resources/views/templates/place-content.blade.php ENDPATH**/ ?>