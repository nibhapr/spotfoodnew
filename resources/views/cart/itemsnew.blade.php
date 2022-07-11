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
														<button v-on:click="decQuantity(item.id)" :value="item.id" type="button" class="btn-sm left dec btn btn-outline-secondary">
															<i class="fas fa-minus"></i>
														</button>
														
														<p class="count" value="@{{ item.quantity }}">@{{ item.quantity }}</p>
														<button v-on:click="incQuantity(item.id)" :value="item.id" type="button" class="btn-sm right inc btn btn-outline-secondary">
															<i class="fas fa-plus"></i>
														</button>
														<button type="button" v-on:click="remove(item.id)"  :value="item.id" class="btn btn-outline-primary btn-icon btn-sm page-link btn-cart-radius">
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
										

			<!--	        <div id="totalPrices">
                    
                            <div class="row">
                                <div class="col" style="margin-top: 14px;">
                                    <span v-if="totalPrice==0">{{ __('Cart is empty') }}!</span>
                                    <span v-if="totalPrice"><strong>{{ __('Subtotal') }}:</strong></span>
                                    <span v-if="totalPrice" class="ammount"><strong>@{{ totalPriceFormat }}</strong></span>
                                </div>
                                <div class="checkoutbtn" href="#" data-toggle="modal" data-backdrop="static" data-target="#cart">Checkout</div>
                                <a class="checkoutbtn" href="/cart-checkout" 
                                >Chcek</a>
                            </div>
                       
                    
                    
                </div> -->
				        
					
					