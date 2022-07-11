@extends('layouts.frontgr', ['class' => ''])

@section('content')
<div class="modal-dialog modal-dialog-centered modal-cart">
<div class="modal-content">
<form id="order-form" role="form" method="post" action="{{route('order.store')}}" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @if(!config('settings.social_mode'))
    @if (config('app.isft')&&count($timeSlots)>0)
    @if($restorant->can_pickup == 1)
    @if($restorant->can_deliver == 1)
    @include('cart.delivery')
    @endif
    @endif 
    @endif
    @endif
<div class="modal-header">
<h5 class="modal-title" id="add-address">your cart </h5>
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
<p class="price-2">@{{ item.quantity }} x @{{ item.attributes.friendly_price }}</p>
</div>
<div class="media">
<img v-if="item.attributes.image"class="mr-3 rounded-pill":src="item.attributes.image" alt="product">
<div class="media-body">
<h6 class="mb-1">@{{ item.name }}</h6>
<p class="price-1">@{{ item.attributes.friendly_price }}</p>														
</div>
</div>
</div>
</div>
</div>
        <div id="totalPrices" v-cloak>
          <div class="price-box-1 mb-3 bg-white rounded p-3 clearfix">
          <p v-if="totalPrice" class="mb-1 text-capitalize">subtotal <span class="float-right text-dark">@{{ totalPriceFormat }}</span></p>
          <p v-if="totalPrice" v-for="tax in taxes" class="mb-1">tax: 
        <span class="float-right text-dark">tax</span></p>
	   @if(config('app.isft')||config('settings.is_whatsapp_ordering_mode'))
		  <p v-if="totalPrice&&delivery" class="mb-1 text-capitalize">delivery fee  <span class="float-right text-dark">@{{ deliveryPriceFormated }}</span></p>
            <hr />
			<h6 v-if="totalPrice" class="font-weight-bold mb-0 text-uppercase">total  <span
			class="float-right">@{{ withDeliveryFormat   }}</span>
			</h6>
		@endif	
	</div>
    </div>
	</div>
	</div>
		 <div class="col-md-6">
		 <div class="cart-form">
		 <div class="nav nav-pills mb-3">
		 <div class="custom-control custom-radio mb-3">
          <input name="deliveryType" class="custom-control-input" id="deliveryTypeDeliver" type="radio" value="delivery" checked>
          <label class="custom-control-label" for="deliveryTypeDeliver">{{ __('Delivery') }}</label>
         </div>
		<div class="custom-control custom-radio mb-3">
          <input name="deliveryType" class="custom-control-input" id="deliveryTypePickup" type="radio" value="pickup">
          <label class="custom-control-label" for="deliveryTypePickup">{{ __('Pickup') }}</label>
        </div>
        <div class="custom-control custom-radio mb-3">
          <input name="deliveryType" class="custom-control-input" id="deliveryTypeDinein" type="radio" value="dinein">
          <label class="custom-control-label" for="deliveryTypeDinein">{{ __('Dine-In') }}</label>
        </div>										
		</div>
		<form>
		<div class="form-row">
		<div class="form-group col-md-12">
		<label>{{ __('Comment') }}</label>
		<div class="input-group mb-0">
		<div class="input-group-prepend">
		<span class="input-group-text {{ $errors->has('comment') ? ' has-danger' : '' }}"><i class="icofont-comment"></i></span>
		</div>
		<textarea name="comment" id="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" placeholder="{{ __( 'Your comment here' ) }} ..."></textarea>
																			 @if ($errors->has('comment'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('comment') }}</strong>
                </span>
            @endif
		</div>
		</div>
		<div class="form-group col-md-12">
		<!--<label>{{ __('Customer Info') }}</label>-->
		@include('partials.fields',['fields'=>[
            ['ftype'=>'input','name'=>"Customer name",'id'=>"custom[client_name]",'placeholder'=>"Customer name",'required'=>true],
        ]]) 
		</div>
		<div class="form-group col-md-12">
		@include('partials.fields',
        ['fields'=>[
            ['ftype'=>'input','name'=>"Customer phone",'id'=>"custom[client_phone]",'placeholder'=>"Please enter phone number.",'required'=>true],
          ]])
		</div>
		<div class="form-group col-md-12" id='hide4'>	
        <span class="delTime delTimeTS">{{ __('Delivery time') }}</span><span class="picTime picTimeTS">{{ __('Pickup time') }}</span>
        <select name="timeslot" id="timeslot" class="form-control{{ $errors->has('timeslot') ? ' is-invalid' : '' }}" required>
          @foreach ($timeSlots as $value => $text)
              <option value={{ $value }}>{{$text}}</option>
          @endforeach
        </select>
        </div>
  		<div class="form-group col-md-12" id="hide1">
		<label>{{ __('Delivery Info') }}</label>
			  @include('partials.fields',
        ['fields'=>[
          ['ftype'=>'input','name'=>"",'id'=>"addressID",'placeholder'=>"Your delivery address here ...",'required'=>true, 'value'=>""],
          ]])
        </div> 	
		<label id='hide2'>{{ __('Delivery area') }}</label>
        <div class="form-group col-md-12" id='hide3'>
        <select name="delivery_area" id="delivery_area" class="noselecttwo form-control{{ $errors->has('deliveryAreas') ? ' is-invalid' : '' }}" >
        <option  value="0">{{ __('Select delivery area') }}</option>
            @foreach ($restorant->deliveryAreas()->get() as $simplearea)
                <option data-cost="{{ $simplearea->cost }}" value="{{ $simplearea->id }}">{{$simplearea->getPriceFormated()}}</option>
            @endforeach
        </select>
        </div>
         <div class="form-group col-md-12">
        @include('cart.localorder.table')
        </div>
        <div class="form-group col-md-12">
           @include('cart.restaurant')
        </div>
        <div class="form-group col-md-12">
           @if (count($timeSlots)>0)
        <div class="text-center" id="totalSubmitCOD">
        <div>
            @include('cart.coupons')
        </div>
        <div class="custom-control custom-checkbox mb-3">
                <input class="custom-control-input" id="privacypolicy" type="checkbox">
                <!--<label class="custom-control-label" for="privacypolicy">{{ __('I agree to the Terms and Conditions and Privacy Policy') }}</label>-->
                <label class="custom-control-label" for="privacypolicy">
                    &nbsp;&nbsp;{{__('I agree to the')}}
                    <a href="{{config('settings.link_to_ts')}}" target="_blank" style="text-decoration: underline;">{{__('Terms of Service')}}</a> {{__('and')}}
                    <a href="{{config('settings.link_to_pr')}}" target="_blank" style="text-decoration: underline;">{{__('Privacy Policy')}}</a>.
                </label>
            </div>
        <button 
        
        v-if="totalPrice"
        type="submit"
        class="btn d-flex w-50 text-center mb-4 justify-content-center btn-whatsapp waves-effect waves-light"
        onclick="this.disabled=true;this.form.submit();"
    >
    <span class="btn-inner--icon lg"><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
    <span class="btn-inner--text">{{ __('Send Whatsapp Order') }}</span>
    </div>
	 @else
                <!-- Closed restaurant -->
    @include('cart.closed')
    @endif    
    </div>
    <div class="form-group col-md-12">
	    </div>
		</form>
		</div>
		</div>
		</div>
		</div>
		<x:notify-messages />
		</div>
		</div>
	</div>						
@endsection
@section('js')
<script async defer src= "https://maps.googleapis.com/maps/api/js?key=<?php echo config('settings.google_maps_api_key'); ?>&callback=initAddressMap"></script>
  <!-- Stripe -->
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    "use strict";
    var RESTORANT = <?php echo json_encode($restorant) ?>;
    var STRIPE_KEY="{{ config('settings.stripe_key') }}";
    var ENABLE_STRIPE="{{ config('settings.enable_stripe') }}";
    var SYSTEM_IS_QR="{{ config('app.isqrexact') }}";
    var SYSTEM_IS_WP="{{ config('app.iswp') }}";
    var initialOrderType = 'delivery';
    if(RESTORANT.can_deliver == 1 && RESTORANT.can_pickup == 0){
        initialOrderType = 'delivery';
    }else if(RESTORANT.can_deliver == 0 && RESTORANT.can_pickup == 1){
        initialOrderType = 'pickup';
    }
  </script>
  <script src="{{ asset('custom') }}/js/checkout.js"></script>
@endsection
	