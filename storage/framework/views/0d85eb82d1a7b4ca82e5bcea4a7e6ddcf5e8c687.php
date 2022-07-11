
<!-- place-header -->
<section class='section section-place-header grayscale-05'>
    <div class='packer'>
        <div class='package'>
            <div class='content'>
                <div class='place-card'>
                    <picture class='avatar'>
                        <img loading="lazy" src='<?php echo e($restorant->icon); ?>' />
                    </picture>
                    <div class='info'>
                        <h1><?php echo e($restorant->name); ?></h1>
                        <p>
                            <small>
                                <!--
                                <strong class='colorize'>
                                    <i class="las la-star"></i> 
                                    4.3
                                </strong> 
                                
                                (693) 
                                -->
                                <a href='#'><?php echo e($restorant->description); ?></a>
                            </small>
                        </p>
                        <p>
                            <!-- <small>45'</small> -->
                            <?php if($canDoOrdering): ?>
                                <small><?php echo e(__('Minimum order')); ?>  <?php echo money($restorant->minimum, config('settings.cashier_currency'),config('settings.do_convertion')); ?></small>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
                <!-- 
                <nav class='breadcrumb'>
                    <a href='index.php'>Home</a>
                    <i class="las la-angle-right"></i>
                    <a href='javascript:;'>Delivery</a>
                    <i class="las la-angle-right"></i>
                    <a href='place.php'>Place name</a>
                </nav>
                -->
            </div>
        </div>
    </div>
    <picture data-background=true >
        <source  srcset="<?php echo e($restorant->coverm); ?>" media="(min-width: 569px)" />
        <img class="grayscale-05" loading="lazy" src='<?php echo e($restorant->coverm); ?>' />
        
    </picture>
</section><?php /**PATH /home/u774496545/domains/gotshi.com/public_html/modules/ElegantTemplate/Providers/../Resources/views/templates/place-header.blade.php ENDPATH**/ ?>