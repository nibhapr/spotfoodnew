		<main>
<!-- Hero -->
		
<div class="hero-home bg-mockup hero-bottom-border">
<div class="content">
 <?php if(session('status')): ?>
    <script>
     function showModalPostRegister(){
    $('#modal-notification').modal('show');
    }
    </script>
    <?php else: ?>
    <script>
    function showModalPostRegister(){}
    </script>
     <?php endif; ?>
     <!-- #242c84 -->
     <h1 class="ckedit" key="whatsapp_order" style="color: #fff!important" id="whatsapp_order"><?php echo e(__('whatsapp.whatsapp_order')); ?></h3>
		<!--<h1 class="animated-element">Whatsapp Ordering</h1>-->
		<p class="ckedit animated-element"style="color:#fff;"><?php echo e(__('whatsapp.easy_order')); ?></p> 
		<a href="/restaurant/<?php echo e($restorant['subdomain']); ?>" class="btn-1 medium animated-element ckedit"><?php echo e(__('whatsapp.Demo')); ?></a>
		<a href="#orderFood" class="mouse-frame nice-scroll">
		<div class="mouse"></div>
		</a>
		</div>
		</div>
		
	</main>
		<!-- Main End --><?php /**PATH /home/u774496545/domains/gotshi.com/public_html/resources/views/social/partials/hero1.blade.php ENDPATH**/ ?>