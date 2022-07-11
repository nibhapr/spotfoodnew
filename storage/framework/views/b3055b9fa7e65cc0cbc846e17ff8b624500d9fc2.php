
    <?php if(config('app.isft')): ?>
        <a href='/' class='logo'>
            <picture style="filter: brightness(0) invert(1);">
                <source srcset="<?php echo e(config('global.site_logo')); ?>" media="(min-width: 569px)" />
                <img loading="lazy" src='<?php echo e(config('global.site_logo')); ?>' />
            </picture>
        </a>
    <?php else: ?>
        <?php if(!config('settings.hide_project_branding')||(!isset($restorant))): ?>
            <!-- Project branding -->
            <a href='/' class='logo'>
                <picture>
                    <source srcset="<?php echo e(config('global.site_logo')); ?>" media="(min-width: 569px)" />
                    <img loading="lazy" src='<?php echo e(config('global.site_logo')); ?>' />
                </picture>
            </a>
        <?php else: ?>
            <a class="logo" id="topLightLogo" href="#">
                <picture>
                    <source srcset="<?php echo e($restorant->logowide); ?>" media="(min-width: 569px)" />
                    <img loading="lazy" src='<?php echo e($restorant->logowide); ?>' />
                </picture>
            </a>
        <?php endif; ?>
        <?php endif; ?>
<?php /**PATH /home/u774496545/domains/gotshi.com/public_html/modules/ElegantTemplate/Providers/../Resources/views/templates/logo.blade.php ENDPATH**/ ?>