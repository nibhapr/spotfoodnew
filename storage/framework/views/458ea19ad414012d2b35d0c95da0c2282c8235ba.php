
<div id="featured" class="section features-6">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
            <h3 class="display-3 ckedit" key="featured_clients" id="featured_clients"><?php echo e(__('whatsapp.featured_clients')); ?></h3>
            <p class="lead ckedit" key="list_of_featured_clients" id="list_of_featured_clients"><?php echo e(__('whatsapp.list_of_featured_clients')); ?></p>
            </div>
          </div>
          <br />
      <div class="row">
          <?php $i = 0; ?>
        <?php $__currentLoopData = $featured_vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-md-4 col-lg-3 mb-5">
            <div class="card cardWithShadow cardWithShadowAnimated">
                <div class="card-header p-0">
                    <a href="<?php echo e($vendor->getLinkAttribute()); ?>"><img src="<?php echo e($vendor->logom); ?>"class="card-img-top rounded-top" alt="image"></a>
                </div>
                <div class="card-body">
                    <h4 class="mb-3 text-black"><?php echo e($vendor->name); ?></h4>
                     <p class="card-text">
                         <?php if(!empty($st[$i])): ?>
                        <span class="closed_time px-2 rounded shadow-sm" style="color: red;font-size:.8rem; border-color: #ff9999; border-width: medium; "><?php echo e(__('Opens')); ?> <?php echo e($st[$i]); ?></span>
                        <?php endif; ?>
                        <?php if(!empty($ct[$i])): ?>
                        <span class="opened_time px-2 rounded shadow-sm" style="color: green;font-size:.8rem; border-color: #309b60; border-width: medium;"><?php echo e(__('Opened until')); ?> <?php echo e($ct[$i]); ?></span>
                        <?php endif; ?>
                    </p>
                   
                </div>
            </div>
        </div>
        <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
<?php /**PATH /home/u774496545/domains/gotshi.com/public_html/modules/Feautureclients/Providers/../Resources/views/whatsapp.blade.php ENDPATH**/ ?>