	<div id="features">
	<div class="services">
	    
				<div class="container">
					<div class="main-title">
					
					<h2 class="ckedit" key="demo_food" id="demo_food"><?php echo e(__('whatsapp.demo_food')); ?></h3>
					<p class="ckedit"><?php echo e(__('whatsapp.easy_order')); ?></p>
					</div>
					<!--  ---------------------------                -->
					<div class="row">
					      <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-lg-4 animated-element">
							<a href="pay-with-card-online/" class="service-link">
								<div class="box text-center">
									<div class="icon d-flex align-items-end">
									    <!--<i class="icon icofont-wallet"></i>-->
									 <img class="image-in-card"src='<?php echo e(str_contains($feature->image, "social") ? $feature->image : "/uploads/restorants/".$feature->image."_large.jpg"); ?>' />   
									    
									    </div>
									<h3 class="service-title"><?php echo e(__($feature->title)); ?></h3>
									<p><?php echo e(__($feature->description)); ?></p>
								</div>
							</a>
						</div>
						 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</div>
				</div>
			</div>
			</div>
			<!-- Services End -->
<?php /**PATH /home/u774496545/domains/gotshi.com/public_html/resources/views/social/partials/features1.blade.php ENDPATH**/ ?>