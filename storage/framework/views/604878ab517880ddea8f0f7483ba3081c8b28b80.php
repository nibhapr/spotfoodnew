<div id="demo" class="section1 features-1">
<div class="container">
<div class="spot-home bg-mockup pb-4 rounded">
<div class="content rounded">
<div class="col-md-8 mx-auto text-center pt-4">
        <!--<span class="badge badge-success badge-pill mb-3"><?php echo e(__('whatsapp.demo_badge')); ?></span><br/>-->
        <h3 class="display-3 ckedit" key="demo_title" id="demo_title"><?php echo e(__('whatsapp.demo_title')); ?></h3>
        <p class="lead ckedit" key="demo_description" id="demo_description"><?php echo e(__('whatsapp.demo_description')); ?></p>
        <!-- DEMO QR-->
        <br />
        <img class="img-thumbnail img-fluid rounded shadow" data-toggle="tooltip" data-placement="top"
          title="<?php echo e(__('whatsapp.demo_image')); ?>" data-container="body"
          data-animation="true"
          src="http://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo e(config('settings.app_url')."/".config('settings.url_route')."/".config('settings.demo_restaurant_slug')); ?>" />
        <!-- END DEMO QR-->
        <br /> <br />
        <a type="button" target="_blank" class="btn btn-outline-success" href="<?php echo e(route('vendor',config('settings.demo_restaurant_slug'))); ?>"><?php echo e(__('whatsapp.test_on_web')); ?></a>
</div>  
</div>
</div>
</div>
</div>
<?php /**PATH /home/u774496545/domains/gotshi.com/public_html/resources/views/social/partials/demo1.blade.php ENDPATH**/ ?>