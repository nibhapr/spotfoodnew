<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-cart" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="add-address">your cart </h5>
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
<h6 class="mb-1 text-capitalize">no items</h6>
</div>
</div>
<div class="menu-list-box scroll-box">
<div v-for="product in cart" :key="product._id" class="menu-list border-bottom">
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
																			Price
																		</p>
																	</div>
																	<div class="media">
																		<img v-if="product.picture_thumb"
																			class="mr-3 rounded-pill"
																			:src="product.picture_thumb" alt="product">
																		<div class="media-body">
																			<h6 class="mb-1">
																				<span v-if="shop.category == 'restaurant' && product.meta && product.meta.nonveg" class="mr-1 food-type non-veg"><i class="icofont-ui-press food-item"></i></span>
																				<span v-else-if="shop.category == 'restaurant' && product.meta && product.meta.egg" class="mr-1 food-type egg"><i class="icofont-ui-press food-item"></i></span>
														    					<span v-else-if="shop.category == 'restaurant'" class="mr-1 food-type veg"><i class="icofont-ui-press food-item"></i></span>
																			
																			Product name
																			</h6>
																			<p class="price-1">
																			@{{ item.attributes.friendly_price }}
																			</p>														

																		</div>
																	</div>
																</div>
															</div>
															<div class="price-box-1 mb-3 bg-white rounded p-3 clearfix">
																<p class="mb-1 text-capitalize">subtotal <span
																		class="float-right text-dark">
																	</span>
																</p>
																<p :key="tax._id" v-for="tax in taxes" class="mb-1">
																<span
																		class="float-right text-dark"></span>
																</p>
																<p class="mb-1 text-capitalize">delivery fee  <span
																		class="float-right text-dark"></span>
																</p>

																<hr />
																<h6 class="font-weight-bold mb-0 text-uppercase">total  <span
																		class="float-right"></span>
																</h6>
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
																	href="#" class="nav-link"><span>delivery</span> </a>
																<a v-if="shop.pick_up" @click="order_type = 'pick_up'"
																	:class="{'active':order_type == 'pick_up'}" href="#"
																	class="nav-link"><span>pickup</span></a>
																<a v-if="shop.dine_in && shop.category == 'restaurant'"
																	@click="order_type = 'dine_in'"
																	:class="{'active':order_type == 'dine_in'}" href="#"
																	class="nav-link"><span>dine in</span></a>
															</div>
															<div v-if="order_type == 'delivery' && shop.delivery.status && subtotal < shop.delivery.min_order"
																class="alert alert-warning">
																<h6>Minimum order is  to make delivery</h6>
																<p>Add more to go</p>
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
																			<option v-for="k in areas" :value="k._id"></option>
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
																	<button type="button" 
																		
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