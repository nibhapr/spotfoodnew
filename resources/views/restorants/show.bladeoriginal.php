@extends('layouts.front', ['class' => ''])
@section('extrameta')
<title>{{ $restorant->name }}</title>
<meta property="og:image" content="{{ $restorant->logom }}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="590">
<meta property="og:image:height" content="400">
<meta name="og:title" property="og:title" content="{{ $restorant->name }}">
<meta name="description" content="{{ $restorant->description }}">
<!--<script src="https://spotfood.in/vendor/axios/axios.min.js"></script>-->
<!--<script src="https://spotfood.in/vendor/vue/vue.js"></script>-->
@endsection
@section('content')

<?php
    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     }
?>

@include('restorants.partials.modals')

	<div v-cloak id="app">
	    </div>
	<div class="image-zoom-modal" style="display: none;">
    <span @click="show_zoom_image = false" class="image-zoom-close">&times;</span>
    <img class="image-zoom-modal-content" ref="imageFlex">
    <div id="image-zoom-caption"></div>
</div>
		<section class="restaurant-detailed-banner">
			<div class="text-center">
				<img class="img-fluid cover" src="{{ $restorant->coverm }}" alt="Le Cafe" />
			</div>
			<div class="restaurant-detailed-header">
				<div class="container">
					<div class="row d-flex align-items-end">
						<div class="col-md-8">
							<div class="restaurant-detailed-header-left">
								<img class="img-fluid mr-3 float-left" src="{{ $restorant->logom }}"
									alt="Le Cafe" />
								<h2 class="text-white">{{ $restorant->name }}</h2>
								<p class="text-white mb-1">
									<i class="icofont-location-pin"></i> {{ $restorant->address }}
									<br>
									<span :class="{ open: shopStatus() == 'open', closed: shopStatus() !== 'open'}"
										class="badge badge-status"> @if(!empty($openingTime))<span class="closed_time">{{__('Opens')}} {{ $openingTime }}</span>@endif @if(!empty($closingTime))<span class="opened_time">{{__('Opened until')}} {{ $closingTime }}</span> @endif</span>
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="restaurant-detailed-header-right text-right">
								<span class="shop-time"><i class="icofont-clock-time text-capitalize"></i> @if(!empty($restorant->phone)) <i class="fas fa-phone"></i> <a href="tel:{{$restorant->phone}}">{{ $restorant->phone }} </a> @endif</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<section class="section-cat">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="swiper-container swiper-categories">
						<div class="swiper-wrapper category-menu">
						    @foreach ( $restorant->categories as $key => $category)
                            @if(!$category->items->isEmpty())
							<div class="swiper-slide menu-item"><a href="#{{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}">{{ $category->name }}</a></div>
							@endif
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	 <!--  @if(!$restorant->categories->isEmpty())
		<section class="offer-dedicated-body pt-2 mt-4"> 
			<div class="container">
				<div class="row">
				    
					<div class="menu-sidebar col-md-4">
						<div class="menu filters shadow-sm rounded bg-white mb-4">
							<div class="filters-header border-bottom pl-4 pr-4 pt-3 pb-3">
								<h5 class="m-0 text-capitalize"><a>{{ __('All categories') }}</a></h5>
								<!--<h5 id="modalID" type=""></h5>-->
								<!--<h5 id="modalTitle" type=""></h5>-->
								<!--<input id="modalPrice" type="hidden"></input>-->
								<!--<input id="modalDescription" type="hidden"></input>-->
								<!--<input id="quantity"  type="hidden" value="0">
							</div>
				
							<div class="menu-area scroll-box">
						    @foreach ( $restorant->categories as $key => $category)
                            @if(!$category->items->isEmpty())	
							<div class="menu-item">
                                <a href="#{{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}">{{ $category->name }}</a>
							</div>
							@endif
							@endforeach
							</div>
						</div>
					</div> 
					
					
                    
        @endif   -->
                    
					<div class="main-content">
						<div class="offer-dedicated-body-left">
						    <div class="container-fluid">
						        <div class="row">
						            
							<!--<form action="" class="explore-outlets-search mb-4 rounded overflow-hidden border">-->
							<!--	<div class="input-group">-->
							<!--		<input :value="searchText" @input="e => searchText = e.target.value" type="text"-->
							<!--			placeholder="search your favourite items..." class="form-control border-0">-->
							<!--		<div class="input-group-append">-->
							<!--			<button type="button" class="btn btn-primary">-->
							<!--				<i class="icofont-search"></i>-->
							<!--			</button>-->
							<!--		</div>-->
							<!--	</div>-->
							<!--</form>-->
							<div class="col-md-8 col-sm-7">
                            @foreach ( $restorant->categories as $key => $category)
                           
							<div id="{{ $category->name }}">
							   <div class="{{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}" class="{{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}" id="{{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}">
								<div class="row {{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}">
									<h5 class="mb-4 col-md-12" style="margin-top: 0px;">{{ $category->name }}</h5>
									<div class="col-md-12">
										<div class="bg-white rounded border shadow-sm mb-4">
										    
										    @foreach ($category->aitems as $item)
										    <div class="menu-list p-3 border-bottom">
										    @if(!(isset($canDoOrdering)&&!$canDoOrdering))
											<span>
											    
                                                    <button class="btn btn-outline-secondary btn-sm text-uppercase float-right waves-effect waves-light" onclick="setCurrentItem({{ $item->id }})" href="javascript:void(0)">{{ __('Add To Cart') }}</button>
                                                    
                                               
											</span>
											@endif
												<div class="media">
												    @if(!empty($item->image))
													<img src="{{ $item->logom }}"  class="mr-3 rounded-pill" onclick="setCurrentItem({{ $item->id }})">
													@endif	
													<div class="media-body">
														<h6 class="mb-1">
													    <span id="{{ $item->id }}">{{ $item->name }}</span>
														</h6>
														<span class="text-muted">{{ $item->short_description}}</span>	
														<p class="text-gray mb-0">
														@money($item->price, config('settings.cashier_currency'),config('settings.do_convertion'))
														</p>
													</div>
													
													
													
												</div>
											</div>
											@endforeach
										</div>
									</div>
									
									</div>
								</div>
								
							</div>
							
							@endforeach
							</div>
						<!--	<div class="myCart text-center" id="mycartt" style="display: none;"> //VIEW CART
								<button class="btn btn-primary btn-menu menu-closed"><span><i
											class="icofont-navigation-menu"></i></span> Menu</button>
								<button class="btn btn-primary btn-menu menu-opened"><span><i
											class="icofont-close-line"></i></span> Menu</button>
								<a href="#"
									class="btn btn-primary btn-lg btn-cart">
									<i class="fas fa-shopping-cart" id="totq" style="font-style: unset;"></i>
									<span class="text-capitalize"> view cart <i class="icofont-long-arrow-right"></i></span>
								</a>
								
							</div> 
			<!---------------------------------------------------------------------------------------------------->
		 <!--   <div class="searchable-container">
                <div id="cartList">
                    <div v-for="item in items" class="menu-list border-bottom">
                        <div class="info-block block-info clearfix">
                            <div class="square-box pull-left">
                                <img :src="item.attributes.image"  class="productImage" width="100" height="105" alt="">
                            </div>
                            <h6 class="product-item_title">@{{ item.name }}</h6>
                            <p class="product-item_quantity">@{{ item.quantity }} x @{{ item.attributes.friendly_price }}</p>
                            <div class="row">
                                <button type="button" v-on:click="decQuantity(item.id)" :value="item.id" class="btn btn-outline-primary btn-icon btn-sm page-link btn-cart-radius">
                                    <span class="btn-inner--icon btn-cart-icon"><i class="fa fa-minus"></i></span>
                                </button>
                                <button type="button" v-on:click="incQuantity(item.id)" :value="item.id" class="btn btn-outline-primary btn-icon btn-sm page-link btn-cart-radius">
                                    <span class="btn-inner--icon btn-cart-icon"><i class="fa fa-plus"></i></span>
                                </button>
                                <button type="button" v-on:click="remove(item.id)"  :value="item.id" class="btn btn-outline-primary btn-icon btn-sm page-link btn-cart-radius">
                                    <span class="btn-inner--icon btn-cart-icon"><i class="fa fa-trash"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> 
						<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-cart" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="product-item_title" id="add-address">Shopping Cart</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="">
												<div class="row">
													<div class="col-md-6">
														<div class="cart-detail mb-4">
															<div class="d-flex mb-1 osahan-cart-item-profile">
																<div class="d-flex flex-column">
																	<h6 class="mb-1 text-capitalize"></h6>
																</div>
															</div>
															<div id="cartList">
															<div class="menu-list-box scroll-box" id="cartList">
																<div v-for="item in items"
																	class="menu-list border-bottom">
																	<div class="float-right">
																		<span class="count-number float-right mb-1">
																			<button @click="subFromCart(product)"
																				class="btn btn-outline-secondary btn-sm left dec">
																				<i class="icofont-minus"></i> </button>
																			<input class="count-number-input"
																				type="text"
																				:value="product.qty"
																				readonly="">
																			<button @click="addToCart(product)"
																				class="btn btn-outline-secondary btn-sm right inc">
																				<i class="icofont-plus"></i> </button>
																		</span>
																		<p class="price-2">
																			shop.currency_data.symbol_nativecalculateProductPrice
																		</p>
																	</div>
																	<div class="media">
																		<img v-if="product.picture_thumb"
																			class="mr-3 rounded-pill"
																			:src="product.picture_thumb" alt="product">
																		<div class="media-body">
																			<h6 class="mb-1">
																			<span v-else-if="shop.category == 'restaurant'" class="mr-1 food-type veg">@{{ item.name }}<i class="icofont-ui-press food-item"></i></span>
																			
																			
																			</h6>
																			<p class="price-1">
																			
																			</p>														

																		</div>
																	</div>
																</div>
															</div>
															
															<div class="price-box-1 mb-3 bg-white rounded p-3 clearfix">
																<p class="mb-1 text-capitalize">subtotal <span
																		class="float-right text-dark"></span>
																</p>
																<p :key="tax._id" v-for="tax in taxes" class="mb-1">
																	taxname
																		class="float-right text-dark">currency
																</p>
																<p class="mb-1 text-capitalize">delivery fee  <span
																		class="float-right text-dark">currency
																</p>

																<hr />
																<h6 class="font-weight-bold mb-0 text-uppercase">total  <span
																		class="float-right">shop currency
																</h6>
															</div>
														</div>
													</div>
													</div>
													<div class="col-md-6">
														<div class="cart-form">
															<div class="nav nav-pills mb-3">
																<a v-if="shop.delivery.status"
																	:disabled="subtotal < shop.delivery.min_order"
																	@click="order_type = 'delivery'"
																	:class="{'active':order_type == 'delivery'}"
																	href="#" class="nav-link">delivery </a>
																<a v-if="shop.pick_up" @click="order_type = 'pick_up'"
																	:class="{'active':order_type == 'pick_up'}" href="#"
																	class="nav-link">pickup</a>
																<a v-if="shop.dine_in && shop.category == 'restaurant'"
																	@click="order_type = 'dine_in'"
																	:class="{'active':order_type == 'dine_in'}" href="#"
																	class="nav-link">dine in</a>
															</div>
															<div v-if="order_type == 'delivery' && shop.delivery.status && subtotal < shop.delivery.min_order"
																class="alert alert-warning">
																<h6>Minimum order is </h6>
																<p>Add  more to go</p>
															</div>

															<div v-else-if="order_type == 'delivery' && shop.delivery.status && subtotal < shop.delivery.free"
																class="alert alert-success">
																<p>Add  to make delivery free</p>
															</div>

															<form>
																<div class="form-row">
																	<div class="form-group col-md-12">
																		<label>Special instructions (optional) </label>
																		<div class="input-group mb-0">
																			<div class="input-group-prepend">
																				<span class="input-group-text"><i
																						class="icofont-comment"></i></span>
																			</div>
																			<textarea v-model="instruction" rows="1"
																				class="form-control"
																				placeholder="Write here... "></textarea>
																		</div>
																	</div>
																	<div class="form-group col-md-12">
																		<input v-model="customer.full_name" name="name"
																			type="text" class="form-control"
																			placeholder="Full Name " required />
																	</div>
																	<div class="form-group col-md-12">
																		<input type="tel" maxlength="13" v-model="customer.phone"
																			class="form-control" name="phone"
																			placeholder="Phone / Mobile No. " />
																	</div>
																	<div v-if="order_type == 'delivery'"
																		class="form-group col-md-12">
																		<textarea rows="2" v-model="customer.address"
																			name="address" class="form-control"
																			placeholder="Address "></textarea>
																	</div>
																	<div v-if="order_type == 'delivery' && shop.use_area_list" class="form-group col-md-12">
																		<select class="form-control" placeholder="Area " v-model="area" name="deliveries">
																			<option v-for="k in areas" :value="k._id">na</option>
																		</select>
																	</div>
																	<div v-show="order_type == 'pick_up'"
																		class="form-group col-md-12">
																		<input type="text" @input="pickup_timing = $event.target.value"
																			class="form-control timepicker"
																			placeholder="Pickup Time ">
																	</div>
																	<div v-if="order_type == 'dine_in'"
																		class="form-group col-md-12">
																		<input type="number" v-model="table_number"
																			name="table_number" class="form-control"
																			placeholder="Table Number ">
																	</div>

																</div>


																<div class="form-group">
																	<button type="button" @click="createOrder"
																		:disabled="!isOrderable"
																		class="btn d-flex w-50 text-center mb-4 justify-content-center btn-whatsapp"><i
																			class="icofont-brand-whatsapp "></i>
																	</button>
																</div>

															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> 
							
						</div> -->
						<div class="col-md-4">        
				            <div class="modal-content1">
								<div class="quick-cart">
									<div class="quick-cart-header" style="margin-left: 19px;">
										<h5><i class="fas fa-shopping-cart"></i> your cart  <small class="text-black-50"> items</small></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
									</div>
									<div class="cart-detail">
									    <div id="cartList">
										<div class="cart-items">
											<div v-for="item in items" class="product-details-2">
												<div class="product-image-2">
													<img :src="item.attributes.image"  class="productImage" width="100" height="105" alt="">
												</div>
												<div class="product-desc-2">
													<p class="product-item_title">
														@{{ item.name }}
													</p>
													<p></p>
													<p class="text-gray text-muted">@{{item.quantity}} x @{{ item.attributes.friendly_price }}</p>
												</div>
												<div class="product-count-2">
												    
													<span class="count-number" style="display: flex;">
														<button v-on:click="decQuantity(item.id)" :value="item.id" type="button" class="btn-sm left dec btn btn-outline-secondary m-0">
															<i class="fas fa-minus"></i>
														</button>
														
														<div class="px-2" style="background: #ffa051;">
														    <p class="count" value="@{{ item.quantity }}" style="font-size: 15px!important;">@{{ item.quantity }}</p>
														</div>
														<button v-on:click="incQuantity(item.id)" :value="item.id" type="button" class="btn-sm right inc btn btn-outline-secondary m-0">
															<i class="fas fa-plus"></i>
														</button>
														<button type="button" v-on:click="remove(item.id)"  :value="item.id" class="btn btn-outline-primary btn-icon btn-sm page-link btn-cart-radius ml-3" style="border-radius: 10px;">
                                                            <span class="btn-inner--icon btn-cart-icon"><i class="fa fa-trash"></i></span>
                                                        </button>
													</span>
													
													<p class="text-gray text-dark"></p>
												</div>
											</div>
										</div>
										
										
							<!--			 <div id="totalPrices">-->
							<!--			     <div  class="card card-stats mb-4 mb-xl-0">-->
										      
							<!--<div class="card-body">-->
       <!--                     <div class="row">-->
       <!--                     <div class="col">-->
							<!--	<span>{{ __('Cart is empty') }}!</span>-->
       <!--                             <span><strong>{{ __('Subtotal') }}:</strong></span>-->
       <!--                             <span class="ammount"><strong>@{{ totalPriceFormat }}</strong></span>-->
							<!--	</div>-->
       <!--                         </div>-->
       <!--                          </div>-->
       <!--                         </div>-->
       <!--                        </div>-->
			<!--------------------------------------------------------------------->							
							<!--			<div class="service-type">
											
											<div>
												<div class="alert alert-warning alert-delivery">
													Minimum order is  to make delivery.
													<span>Add  more to go.</span>
												</div>
												<div class="alert alert-success alert-free-delivery">
													Add  to make delivery free.
												</div>
												
											</div>
										</div> -->
										
          
										<!--<div id="totalPrices">-->

										<!--<div class="sub-total">-->
										<!--	<p class="mb-1"><span class="float-right text-dark"></span></p>-->
										<!--	<p :key="tax._id" v-for="tax in taxes" class="mb-1"><span class="float-right text-dark"></span></p>-->
										<!--	<p class="mb-1">delivery fee <span class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark"></span></p>-->
										<!--	<hr>-->
										<!--	<h6 class="ammount">@{{ totalPriceFormat }}</h6>-->
										<!--</div>-->
										<!--</div>-->
										
				        </div>
				        <div id="totalPrices">
                    
                            <div class="row">
                                <div class="col" style="margin-top: 14px;">
                                    <span v-if="totalPrice==0">{{ __('Cart is empty') }}!</span>
                                    <span v-if="totalPrice"><strong>{{ __('Subtotal') }}:</strong></span>
                                    <span v-if="totalPrice" class="ammount"><strong>@{{ totalPriceFormat }}</strong></span>
                                </div>
                                
                                <a class="checkoutbtn" href="/cart-checkout" 
                                >Checkout</a>
                            </div>
                       
                    
                    
                </div>
				    </div>    
					</div>
					</div>
					</div>
		<div class="bottom-cart fixed-bottom">
		<div class="row">
			<div class="col-md-12">
				<a href="/cart-checkout"  data-backdrop="static" data-target="#cart" class="btn btn-primary btn-block btn-lg myCart">
					<span style="float: left;"><i class="fa fa-shopping-cart"></i> </span>
					<span class="text-capitalize" style="float: right; text-align: right;">view cart <i class="fa fa-long-arrow-alt-right"></i></span>
				</a>
			</div>
		</div>
	</div>
</div>
@include('restorants.partials.modal')

        
     
                
                <!--<div id="totalPrices">-->
                    
                <!--            <div class="row">-->
                <!--                <div class="col">-->
                <!--                    <span v-if="totalPrice==0">{{ __('Cart is empty') }}!</span>-->
                <!--                    <span v-if="totalPrice"><strong>{{ __('Subtotal') }}:</strong></span>-->
                <!--                    <span v-if="totalPrice" class="ammount"><strong>@{{ totalPriceFormat }}</strong></span>-->
                <!--                </div>-->
                <!--            </div>-->
                       
                    
                    
                <!--</div>-->
          



@endsection


	 <script type="text/x-template" id="modal-template">
  <div class="m-4">
         <div class="media">
                 <img height="60" v-if="product.picture_thumb" class="mr-3 rounded-pill"
                     :src="product.picture_thumb" alt="">
                 <div class="media-body">
                     <h6 class="mb-1"></h6>
                     <p class="text-gray mb-0"></p>
                 </div>
                 <button type="button" @click="$emit('close')" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
         </div>
         <div v-if="product.variants.length" class="variant">
             <h5 class="mt-3">Variants</h5>
             <hr>
             <div v-for="option in product.options">
                  <h6 class="text-dark">option.nam</h6>
                 <div v-for="item in option.values" class="form-check form-check-inline">
                     <input  class="form-check-input" type="radio" v-model="variant[option._id]" :id="option._id+item" :value="item" :name="option._id">
                         <label class="form-check-label" @click="item == variant[option._id] ? variant[option._id] = null:null; " :for="option._id+item">
                           item
                         </label>
                 </div>
             </div>
         </div>
         <div v-if="product.addons.length" class="extras">
             <h5 class="mt-3">Extras</h5>
             <ul class="list-group list-group-flush text-left">
                 <li v-for="addon in product.addons" class="list-group-item">
                     <div class="custom-control custom-checkbox">
                         <input :id="addon._id" type="checkbox" v-model="extra[addon._id]" class="custom-control-input" >
                         <label class="custom-control-label" :for="addon._id"></label>
                     </div>
                 </li>
             </ul>
         </div>
         <div  class="mt-4">
             <div class="row">
                 <div class="col-4">
                     <h4>Symbol calculatedPric</h4>
                 </div>
                 <div class="col-4">
                     <span class="count-number float-right mb-1">
                         <button @click="qty > 1 ? qty-- : ''"
                             class="btn btn-outline-secondary btn-sm left dec"> <i
                                 class="icofont-minus"></i> </button>
                         <input class="count-number-input" type="text"
                             :value="qty"
                             readonly="">
                         <button @click="qty++"
                             class="btn btn-outline-secondary btn-sm right inc"
                             data-toggle="modal" data-backdrop="static"
                             data-target="#customization-type-2"> <i
                                 class="icofont-plus"></i> </button>
                     </span>
                 </div>
                 <div class="col-4">
                     <button :disabled="Object.keys(variant).length !== product.options.length" @click="addToCart()" class="btn btn-sm btn-primary">ADD TO CART</button>

                 </div>
             </div>

         </div>
     </div>
</script> 

	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/timepicker.js"></script> 
	<script>
		$(function () {
			$(".datepicker").datepicker();
			$(".timepicker").timepicki();
		});
	</script>
@section('js')
    <script>
        var CASHIER_CURRENCY = "<?php echo  config('settings.cashier_currency') ?>";
        var LOCALE="<?php echo  App::getLocale() ?>";
        var IS_POS=false;
        var TEMPLATE_USED="<?php echo config('settings.front_end_template','defaulttemplate') ?>";
    </script>
    <script src="{{ asset('custom') }}/js/order.js"></script>
    @include('restorants.phporderinterface') 
@endsection	



<!--<script>-->
<!--    Vue.use(window["vue-js-modal"].default);-->
<!--    const modal = Vue.component('cart-modal', {-->
<!--        template: '#modal-template',-->
<!--        data() {-->
<!--            return {-->
<!--                pSymbol: shop_data.currency_data.symbol_native,-->
<!--                extra: {},-->
<!--                qty: 1,-->
<!--                variant: {}-->
<!--            }-->
<!--        },-->
<!--        props: {-->
<!--            product: {-->
<!--                type: Object,-->
<!--                default() { ({ addons: [], variants: [] }) }-->
<!--            }-->
<!--        },-->
<!--        watch: {-->
<!--            variant() {-->

<!--            }-->
<!--        },-->
<!--        methods: {-->
<!--            addToCart() {-->
<!--                this.$parent.$emit('add', {-->
<!--                    price: this.calculatedPrice,-->
<!--                    variant: this.variant,-->
<!--                    addon: this.extra,-->
<!--                    qty: this.qty,-->
<!--                    product: this.product-->
<!--                })-->
<!--            }-->
<!--        },-->
<!--        computed: {-->
<!--            price() {-->
<!--                if ((variant = Object.entries(this.variant).length, variant)) {-->
<!--                    const full_match = this.product.variants.find(i => i.options.every(v => Object.values(this.variant).includes(v.value)))-->
<!--                    if (full_match) {-->
<!--                        return full_match.price;-->
<!--                    }-->
<!--                    return this.product.price-->
<!--                }-->
<!--                return this.product.price;-->
<!--            },-->
<!--            calculatedPrice() {-->
<!--                return (this.price + Object.entries(this.extra).filter(([key, val]) => {-->
<!--                    return val;-->
<!--                }).reduce((a, [key, val]) => {-->
<!--                    return a + this.product.addons.find(i => i._id == key).price-->
<!--                }, 0))-->
<!--            }-->
<!--        }-->
<!--    });-->
<!--    new Vue({-->
<!--        el: '#app',-->
<!--        data: () => {-->
<!--            return {-->
<!--                selectedCartProduct: null,-->
<!--                categories: categories_data,-->
<!--                areas: [],-->
<!--                area: '',-->
<!--                shop: shop_data,-->
<!--                order_type: null,-->
<!--                errMsg: '',-->
<!--                pickup_timing: '',-->
<!--                table_number: '',-->
<!--                searchText: '',-->
<!--                instruction: '',-->
<!--                customer: {-->
<!--                    full_name: '',-->
<!--                    phone: '',-->
<!--                    address: ''-->
<!--                },-->
<!--                isOrdered: false,-->
<!--                taxes: taxes_data,-->
<!--                cart: [],-->
<!--                show_zoom_image: false-->
<!--            }-->
<!--        },-->
<!--        mounted: function () {-->
<!--            this.fetchAreas();-->
<!--            if (this.shop.delivery.status) {-->
<!--                return this.order_type = 'delivery';-->
<!--            }-->
<!--            else if (this.shop.pick_up) {-->
<!--                this.order_type = 'pick_up';-->
<!--            }-->
<!--            else if (this.shop.dine_in) {-->
<!--                this.order_type = 'dine_in';-->
<!--            } else {-->
<!--                this.errMsg = "This store is not accepting any orders."-->
<!--                alert(this.errMsg)-->
<!--            }-->
<!--        },-->
<!--        methods: {-->
<!--            addToCartModal(product) {-->
<!--                if (product.addons.length || product.variants.length) {-->
<!--                    this.$modal.show(modal, {-->
<!--                        product: product,-->
<!--                    }, {-->
<!--                        height: 'auto',-->
<!--                        width: '100%',-->
<!--                        scrollable: true-->
<!--                    }, {-->
<!--                        'add': this.addToCartCb,-->
<!--                    })-->
<!--                }-->
<!--                else {-->
<!--                    this.addToCart(product)-->
<!--                }-->
<!--            },-->
<!--            zoomImage(product) {-->
<!--                this.$refs.imageFlex.src = product.picture;-->
<!--                this.show_zoom_image = true;-->
<!--            },-->
<!--            addToCartCb(prod) {-->
<!--                let items = this.cart.filter(_prod => _prod._id == prod.product._id);-->
<!--                if (items.length && (item = items.find(_item => Object.entries(_item.variant).every(([key, val]) => prod.variant[key] == val) && Object.entries(_item.addon).every(([key, val]) => prod.addon[key] == val)), item)) {-->
<!--                    if (item) item.qty += prod.qty;-->
<!--                }-->
<!--                else {-->
<!--                    this.cart.push({-->
<!--                        ...prod.product,-->
<!--                        ...prod-->
<!--                    })-->
<!--                }-->
<!--                this.$modal.hideAll()-->
<!--            },-->
<!--            addToCart(product) {-->
<!--                let item = this.cart.find(_prod => _prod._id == product._id);-->
<!--                if (item) {-->
<!--                    item.qty += 1;-->
<!--                }-->
<!--                else {-->
<!--                    this.cart.push({-->
<!--                        ...product,-->
<!--                        qty: 1-->
<!--                    })-->
<!--                }-->
<!--            },-->
<!--            availability(product) {-->
<!--                return !this.shop.is_onlymenu && this.shopStatus() == 'open' && product.availability-->
<!--            },-->
<!--            subFromCart(product) {-->
<!--                let item = this.cart.find(_prod => _prod == product);-->
<!--                if (item) {-->
<!--                    if (item.qty == 1)-->
<!--                        return this.cart = this.cart.filter(_prod => _prod !== product);-->
<!--                    else-->
<!--                        item.qty -= 1;-->
<!--                }-->
<!--            },-->
<!--            calculateProductPrice(product) {-->
<!--                const prod = this.cart.find(_prod => _prod == product);-->
<!--                if (prod)-->
<!--                    return (prod.qty * prod.price).toFixed(this.shop.currency_data.decimal_digits);-->
<!--                else-->
<!--                    return product.price.toFixed(this.shop.currency_data.decimal_digits);-->
<!--            },-->
<!--            fetchAreas() {-->
<!--                if (this.shop.use_area_list) {-->
<!--                    fetch('/api/customer/orders/areas/?shop=' + this.shop._id).then(response => response.json())-->
<!--                        .then(data => {-->
<!--                            this.areas = data;-->
<!--                        });-->
<!--                }-->
<!--            },-->
<!--            createOrder() {-->
<!--                const data = {-->
<!--                    products: this.cart.map(_prod => {-->
<!--                        return { product: _prod._id, qty: _prod.qty, variant: _prod.variant || {}, addon: _prod.addon || {} };-->
<!--                    })-->
<!--                };-->
<!--                data.shop = this.shop._id;-->
<!--                data.order_type = this.order_type;-->
<!--                data.currency = this.shop.currency;-->
<!--                data.instruction = this.instruction;-->
<!--                data.customer = this.customer;-->
<!--                if (this.shop.use_area_list && this.order_type == 'delivery') {-->
<!--                    data.area = this.area;-->
<!--                }-->
<!--                data.calculated_amount = this.total.toFixed(this.shop.currency_data.decimal_digits);-->
<!--                if (this.order_type == 'pick_up') {-->
<!--                    delete data.customer.address;-->
<!--                    data.calculated_amount = (this.total - this.delivery).toFixed(this.shop.currency_data.decimal_digits);-->
<!--                    data.pickup_timing = this.pickup_timing;-->
<!--                }-->
<!--                if (this.order_type == 'dine_in') {-->
<!--                    delete data.customer.address;-->
<!--                    data.calculated_amount = (this.total - this.delivery).toFixed(this.shop.currency_data.decimal_digits);-->
<!--                    data.table_number = this.table_number;-->
<!--                }-->
<!--                fetch('/api/customer/orders', {-->
<!--                    method: 'POST',-->
<!--                    headers: {-->
<!--                        'Accept': 'application/json',-->
<!--                        'Content-Type': 'application/json'-->
<!--                    },-->
<!--                    body: JSON.stringify(data)-->
<!--                }).then(response => response.json())-->
<!--                    .then(data => {-->
<!--                        if (data.status) {-->
<!--                            this.isOrdered = true;-->
<!--                            this.cart = []-->
<!--                            if (this.shop.receive_on === 'website') {-->
                            
<!--                                alert('Order has been placed!');-->
<!--                            }-->
<!--                            return window.location.href = data.link-->
<!--                        }-->
<!--                        if (data.errors && Array.isArray(data.errors)) {-->
<!--                            return alert(data.errors[0].message);-->
<!--                        }-->
<!--                        alert(data.message || "Server Error")-->
<!--                    })-->
<!--                    .catch(error => console.error(error));-->
<!--            },-->
<!--            shopTiming() {-->
<!--                const today = new Date();-->
<!--                if (!this.shop.timing) {-->
<!--                    return ''-->
<!--                }-->
<!--                const timing = this.shop.timing[today.getDay()];-->
<!--                const startTime = timing.start;-->
<!--                const endTime = timing.end;-->

<!--                var H = +startTime.substr(0, 2);-->
<!--                var h = H % 12 || 12;-->
<!--                var ampm = (H < 12 || H === 24) ? "AM" : "PM";-->
<!--                formatedStartTime = h + startTime.substr(2, 3) + ampm;-->

<!--                var H = +endTime.substr(0, 2);-->
<!--                var h = H % 12 || 12;-->
<!--                var ampm = (H < 12 || H === 24) ? "AM" : "PM";-->
<!--                formatedEndTime = h + endTime.substr(2, 3) + ampm;-->

<!--                return formatedStartTime + ' - ' + formatedEndTime-->
<!--            },-->
<!--            shopStatus() {-->
<!--                if (this.shop.is_closed) {-->
<!--                    return 'temporarily closed'-->
<!--                }-->
<!--                const today = new Date();-->
<!--                if (!this.shop.timing) {-->
<!--                    return 'closed'-->
<!--                }-->
<!--                const timing = this.shop.timing[today.getDay()];-->
<!--                if (timing.status == false) {-->
<!--                    return 'closed'-->
<!--                }-->
<!--                const startTime = timing.start;-->
<!--                const endTime = timing.end;-->
<!--                startDate = new Date(today.getTime());-->
<!--                startDate.setHours(startTime.split(":")[0]);-->
<!--                startDate.setMinutes(startTime.split(":")[1]);-->

<!--                endDate = new Date(today.getTime());-->
<!--                endDate.setHours(endTime.split(":")[0]);-->
<!--                endDate.setMinutes(endTime.split(":")[1]);-->

<!--                if (startDate < today && endDate > today) {-->
<!--                    return 'open'-->
<!--                }-->
<!--                return 'closed'-->
<!--            },-->
<!--            getDiscount(product) {-->
<!--                if (product.mrp > product.price) {-->
<!--                    return Math.round((1 - product.price / product.mrp) * 100)-->
<!--                }-->
<!--                return 0;-->
<!--            },-->
<!--            translate(text) {-->
<!--                return trans[text];-->
<!--            }-->
<!--        },-->
<!--        filters: {-->
<!--            truncate: function (text, length, suffix) {-->
<!--                if (text.length > length) {-->
<!--                    return text.substring(0, length) + suffix;-->
<!--                } else {-->
<!--                    return text;-->
<!--                }-->
<!--            },-->
<!--        },-->
<!--        computed: {-->
<!--            subtotal() {-->
<!--                return this.cart.reduce((acc, _prod,) => _prod.price * _prod.qty + acc, 0)-->
<!--            },-->
<!--            min_price() {-->
<!--                return shop.currency_data.symbol_native + " " + shop.delivery.min_order.toFixed(shop.currency_data.decimal_digits);-->
<!--            },-->
<!--            min_more_price(){-->
<!--                return shop.currency_data.symbol_native + " " + (shop.delivery.min_order - subtotal).toFixed(shop.currency_data.decimal_digits);-->
<!--            },-->
<!--            free_price(){-->
<!--                return shop.currency_data.symbol_native + " " + (shop.delivery.free - subtotal).toFixed(shop.currency_data.decimal_digits);-->
<!--            },-->
<!--            taxable_amount() {-->
<!--                return this.cart.reduce((acc, _prod,) => {-->
<!--                    if (_prod.exclude_tax) {-->
<!--                        return acc;-->
<!--                    }-->
<!--                    return _prod.price * _prod.qty + acc-->
<!--                }, 0)-->
<!--            },-->
<!--            taxes_amount() {-->
<!--                return this.taxes.reduce((acc, _tax) => _tax.percent / 100 * this.taxable_amount + acc, 0)-->
<!--            },-->
<!--            delivery() {-->
<!--                if (this.order_type == 'delivery') {-->
<!--                    if (this.shop.use_area_list && this.area) {-->
<!--                        return this.subtotal < this.shop.delivery.free ? this.areas.find(area => area._id == this.area).price : 0;-->
<!--                    }-->
<!--                    console.log(this.shop.delivery);-->
<!--                    return this.subtotal < this.shop.delivery.free ? this.shop.delivery.cost : 0-->
<!--                }-->
<!--                return 0;-->
<!--            },-->
<!--            total() {-->
<!--                return this.subtotal + this.taxes_amount + this.delivery;-->
<!--            },-->
<!--            cartLength() {-->
<!--                return this.cart.reduce((prev, acc) => {-->
<!--                    return prev + acc.qty-->
<!--                }, 0)-->
<!--            },-->
<!--            isOrderable() {-->
<!--                if (this.shop.is_onlymenu) return false-->
<!--                if (this.isOrdered) return false;-->
<!--                if (this.cartLength == 0) {-->
<!--                    return false;-->
<!--                }-->
<!--                if (this.errMsg) {-->
<!--                    return false;-->
<!--                }-->
<!--                if (this.shopStatus() != 'open') {-->
<!--                    return false;-->
<!--                }-->
<!--                if (!this.customer.full_name) {-->
<!--                    return false;-->
<!--                }-->
<!--                if (this.order_type == 'delivery' && this.subtotal < this.shop.delivery.min_order) {-->
<!--                    return false;-->
<!--                }-->
<!--                if (!this.customer.phone) {-->
<!--                    return false;-->
<!--                }-->
<!--                if ((this.order_type == 'delivery' && !this.customer.address) || (this.order_type == 'pick_up' && !this.pickup_timing) || (this.order_type == 'dine_in' && !this.table_number)) {-->
<!--                    return false;-->
<!--                }-->
<!--                return true-->
<!--            },-->
<!--            categoriesSearch() {-->
<!--                return this.categories.filter((_categ => {-->
<!--                    return _categ.products.some(_prod => {-->
<!--                        return _prod.name.toLowerCase().includes(this.searchText.trim().toLowerCase())-->
<!--                    })-->
<!--                })).map((_categ => {-->
<!--                    return {-->
<!--                        ..._categ, products: _categ.products.filter(_prod => {-->
<!--                            return _prod.name.toLowerCase().includes(this.searchText.trim().toLowerCase())-->
<!--                        })-->
<!--                    }-->
<!--                }))-->
<!--            }-->
<!--        }-->
<!--    })-->
<!--</script>-->

<!-- <script>
		let mainNavLinks = document.querySelectorAll(".menu-sidebar .menu .menu-area .menu-item a");
		let mainSections = document.querySelectorAll(".main-content .offer-dedicated-body-left cat");
		let lastId;
		let cur = [];
		window.addEventListener("scroll", (event) => {
			let fromTop = window.scrollY;
			mainNavLinks.forEach((link) => {
				let section = document.querySelector(link.hash);
				if (section.offsetTop <= fromTop && section.offsetTop + section.offsetHeight > fromTop) {
					link.classList.add("active");
				} else {
					link.classList.remove("active");
				}
			});
		});
</script>
<script>
		$(document).ready(function () {
			resizeMid();
			$(window).resize(function () {
				resizeMid();
			});
		});
		function resizeMid() {
			var cart_width = $(".offer-dedicated-body-left").width();
			$(".myCart").css({ width: cart_width });
		}
</script>

<script>
		$(document).mouseup(function (e) {
			var container = $(".menu-sidebar");
			if ($(this).width() <= 599) {
				if (!container.is(e.target) && container.has(e.target).length === 0) {
					$(".menu-sidebar").hide();
					$(".menu-opened").hide();
					$(".menu-closed").show();
				}
				$(".menu-item").click(function () {
					$(".menu-sidebar").hide();
					$(".menu-opened").hide();
					$(".menu-closed").show();
				});
				$(".menu-closed").click(function () {
					$(".menu-sidebar").show();
					$(".menu-closed").hide();
					$(".menu-opened").show();
				});
				$(".menu-opened").click(function () {
					$(".menu-sidebar").hide();
					$(".menu-opened").hide();
					$(".menu-closed").show();
				});
			}
		});
</script>
	
	
 <!--OUR CODE -->


