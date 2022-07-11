


<?php $__env->startSection('content'); ?>
<div id="minPrice" hidden><?php echo e($minPrice); ?></div>
<div class="modal-dialog modal-dialog-centered modal-cart">
<div class="modal-content">
<form id="order-form" role="form" method="post" action="<?php echo e(route('order.store')); ?>" autocomplete="off" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php if(!config('settings.social_mode')): ?>
    <?php if(config('app.isft')&&count($timeSlots)>0): ?>
    <?php if($restorant->can_pickup == 1): ?>
    <?php if($restorant->can_deliver == 1): ?>
    <?php echo $__env->make('cart.delivery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?> 
    <?php endif; ?>
    <?php endif; ?>
<div class="modal-header">
<h5 class="modal-title" id="add-address"><?php echo e(__('your cart')); ?></h5>
</div>
<div class="modal-body">
<div class="">
<div class="row">
<div class="col-md-6">
<div class="cart-detail mb-4">
<div class="menu-list-box scroll-box1">
<div id="cartList" v-cloak>
<div v-for="item in items" class="items menu-list border-bottom clearfix">
<div class="float-right">
<span class=""><button type="button" v-on:click="decQuantity(item.id)" :value="item.id" class="btn btn-outline-secondary btn-sm left dec"><i class="fa fa-minus"></i> </button>
<button type="button" v-on:click="remove(item.id)"  :value="item.id" class="btn btn-outline-secondary btn-sm left dec"><i class="fa fa-trash"></i> </button>	    
<button type="button" v-on:click="incQuantity(item.id)" :value="item.id" class="btn btn-outline-secondary btn-sm left dec"><i class="fa fa-plus"></i> </button>   
</span>
<p class="price-2">{{ item.quantity }} x {{ item.attributes.friendly_price }}</p>
</div>
<div class="media">
<img v-if="item.attributes.image"class="mr-3 rounded-pill":src="item.attributes.image" alt="product">
<div class="media-body">
<h6 class="mb-1">{{ item.name }}</h6>
<p class="price-1">{{ item.attributes.friendly_price }}</p>														
</div>
</div>
</div>
</div>
</div>
        <div id="totalPrices" v-cloak>
          <div class="price-box-1 mb-3 bg-white rounded p-3 clearfix">
          <p v-if="totalPrice" class="mb-1 text-capitalize"><?php echo e(__('Subtotal')); ?><span class="float-right text-dark">{{ totalPriceFormat }}</span></p>
          
          <!--<p v-if="totalPrice" v-for="tax in taxes" class="mb-1">tax:                 setup TAXES 
        <span class="float-right text-dark">tax</span></p> -->
        
        
	   <?php if(config('app.isft')||config('settings.is_whatsapp_ordering_mode')): ?>
		  <p v-if="totalPrice&&delivery" class="mb-1 text-capitalize"><?php echo e(__('delivery fee')); ?>  <span class="float-right text-dark">{{deliveryPriceFormated }}</span></p>
            <hr />
            <!--<h6 class="text-success" id="showMinPrice" v-if="deliveryPrice>0&&delivery"></h6>-->
            <?php if(isset($doWeHaveMinimumPrice)&&$doWeHaveMinimumPrice): ?>
                <h6 class="text-success" id="showMinPrice" v-if="delivery"></h6>
               
            <?php endif; ?>
            
			<h6 v-if="totalPrice" class="font-weight-bold mb-0 text-uppercase"><?php echo e(__('total')); ?><span
			class="float-right">{{ withDeliveryFormat   }}</span>
			</h6>
		<?php endif; ?>	
	</div>
    </div>
	</div>
	</div>
		 <div class="col-md-6">
		 <div id="no-delivery" style="display: none;">
		     <div class="cart-detail mb-4">
		         <label class="text-danger">Currently Unavailable</label>
		     </div>
		 </div>
		 <div class="cart-form">
		 <div class="nav nav-pills mb-3">
		  <div class="custom-control custom-radio mb-3">
          <input name="deliveryType" class="custom-control-input" id="deliveryTypeDinein" type="radio" value="dinein"checked>
          <label class="custom-control-label" for="deliveryTypeDinein"><?php echo e(__('Dine-In')); ?></label>
        </div>										
		 <div class="custom-control custom-radio mb-3">
          <input name="deliveryType" class="custom-control-input" id="deliveryTypeDeliver" type="radio" value="delivery">
          <label class="custom-control-label" for="deliveryTypeDeliver"><?php echo e(__('Delivery')); ?></label>
         </div>
		<div class="custom-control custom-radio mb-3">
          <input name="deliveryType" class="custom-control-input" id="deliveryTypePickup" type="radio" value="pickup">
          <label class="custom-control-label" for="deliveryTypePickup"><?php echo e(__('Pickup')); ?></label>
        </div>
       
		</div>
		<form>
		<input name="free_delivery" id="free_delivery" type="hidden" value=0>
		<div class="form-row">
		<div class="form-group col-md-12">
		<label><?php echo e(__('Comment')); ?></label>
		<div class="input-group mb-0">
		<div class="input-group-prepend">
		<span class="input-group-text <?php echo e($errors->has('comment') ? ' has-danger' : ''); ?>"><i class="icofont-comment"></i></span>
		</div>
		<textarea name="comment" id="comment" class="form-control<?php echo e($errors->has('comment') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__( 'Your comment here' )); ?> ..."></textarea>
																			 <?php if($errors->has('comment')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('comment')); ?></strong>
                </span>
            <?php endif; ?>
		</div>
		</div>
		<div class="form-group col-md-12">
		<!--<label><?php echo e(__('Customer Info')); ?></label>-->
		<?php echo $__env->make('partials.fields',['fields'=>[
            ['ftype'=>'input','name'=>"Customer name",'id'=>"custom[client_name]",'placeholder'=>"Customer name",'required'=>true],
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
		</div>
		<div class="form-group col-md-12">
		<?php echo $__env->make('partials.fields',
        ['fields'=>[
            ['ftype'=>'input','name'=>"Customer phone",'id'=>"custom[client_phone]",'placeholder'=>"Please enter phone number.",'required'=>true],
          ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
		<div class="form-group col-md-12" id='hide4'>	
        <span class="delTime delTimeTS"><?php echo e(__('Delivery time')); ?></span><span class="picTime picTimeTS"><?php echo e(__('Pickup time')); ?></span>
        <select name="timeslot" id="timeslot" class="form-control<?php echo e($errors->has('timeslot') ? ' is-invalid' : ''); ?>" required>
          <?php $__currentLoopData = $timeSlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value=<?php echo e($value); ?>><?php echo e($text); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>
  		<div class="form-group col-md-12" id="hide1">
		<label><?php echo e(__('Delivery Info')); ?></label>
			  <?php echo $__env->make('partials.fields',
        ['fields'=>[
          ['ftype'=>'input','name'=>"",'id'=>"addressID",'placeholder'=>"Your delivery address here ...",'required'=>true, 'value'=>""],
          ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div> 	
		<label id='hide2'><?php echo e(__('Delivery area')); ?></label>
        <div class="form-group col-md-12" id='hide3'>
        <select name="delivery_area" id="delivery_area" class="noselecttwo form-control<?php echo e($errors->has('deliveryAreas') ? ' is-invalid' : ''); ?>" >
        <option  value="0"><?php echo e(__('Select delivery area')); ?></option>
            <?php $__currentLoopData = $restorant->deliveryAreas()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $simplearea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option data-cost="<?php echo e($simplearea->cost); ?>" value="<?php echo e($simplearea->id); ?>"><?php echo e($simplearea->getPriceFormated()); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>
         <div class="form-group col-md-12">
        <?php echo $__env->make('cart.localorder.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="form-group col-md-12">
           <?php echo $__env->make('cart.restaurant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="form-group col-md-12">
           <?php if(count($timeSlots)>0): ?>
        <div class="text-center" id="totalSubmitCOD">
        <div>
            <?php echo $__env->make('cart.coupons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="custom-control custom-checkbox mb-3">
                <input class="custom-control-input" id="privacypolicy" type="checkbox">
                <!--<label class="custom-control-label" for="privacypolicy"><?php echo e(__('I agree to the Terms and Conditions and Privacy Policy')); ?></label>-->
                <label class="custom-control-label" for="privacypolicy">
                    &nbsp;&nbsp;<?php echo e(__('I agree to the')); ?>

                    <a href="<?php echo e(config('settings.link_to_ts')); ?>" target="_blank" style="text-decoration: underline;"><?php echo e(__('Terms of Service')); ?></a> <?php echo e(__('and')); ?>

                    <a href="<?php echo e(config('settings.link_to_pr')); ?>" target="_blank" style="text-decoration: underline;"><?php echo e(__('Privacy Policy')); ?></a>.
                </label>
            </div>
        <button 
        
        v-if="totalPrice"
        type="submit"
        class="btn d-flex w-50 text-center mb-4 justify-content-center btn-whatsapp waves-effect waves-light paymentbutton"
        onclick="this.disabled=true;this.form.submit();"
    >
    <span class="btn-inner--icon lg"><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
    <span class="btn-inner--text"><?php echo e(__('Send Whatsapp Order')); ?></span>
    </div>
	 <?php else: ?>
                <!-- Closed restaurant -->
    <?php echo $__env->make('cart.closed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>    
    </div>
    <div class="form-group col-md-12">
	    </div>
		</form>
		</div>
		</div>
		</div>
		</div>
		<?php if (isset($component)) { $__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c = $component; } ?>
<?php $component = $__env->getContainer()->make(Mckenziearts\Notify\NotifyComponent::class, []); ?>
<?php $component->withName('notify-messages'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c)): ?>
<?php $component = $__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c; ?>
<?php unset($__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
		</div>
		</div>
	</div>						
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script async defer src= "https://maps.googleapis.com/maps/api/js?key=<?php echo config('settings.google_maps_api_key'); ?>&callback=initAddressMap"></script>
  <!-- Stripe -->
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    "use strict";
    var RESTORANT = <?php echo json_encode($restorant) ?>;
    var STRIPE_KEY="<?php echo e(config('settings.stripe_key')); ?>";
    var ENABLE_STRIPE="<?php echo e(config('settings.enable_stripe')); ?>";
    var SYSTEM_IS_QR="<?php echo e(config('app.isqrexact')); ?>";
    var SYSTEM_IS_WP="<?php echo e(config('app.iswp')); ?>";
    var initialOrderType = null;
    if (RESTORANT.self_deliver == 1) {
        initialOrderType = 'dinein';
    } else {
        if(RESTORANT.can_deliver == 1 && RESTORANT.can_pickup == 0){
            initialOrderType = 'delivery';
        }else if(RESTORANT.can_deliver == 0 && RESTORANT.can_pickup == 1){
            initialOrderType = 'pickup';
        }
    }        
  </script>
  <script src="<?php echo e(asset('custom')); ?>/js/checkout.js"></script>
<?php $__env->stopSection(); ?>
	
<?php echo $__env->make('layouts.front2', ['class' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u774496545/domains/gotshi.com/public_html/resources/views/cart2.blade.php ENDPATH**/ ?>