@extends('layouts.front', ['class' => ''])
@section('content')
         <div class="modal fade" id="cartmodal" tabindex="-1" aria-labelledby="CheckoutModal" aria-hidden="true">
                      <div class="modal-dialog modal-fullscreen-md-down modal-lg">
                      <div class="modal-content">
                      

                      <div class="modal-header"><h5 class="modal-title" id="CheckoutModal">Checout</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                      <div class="modal-body mb-4">
                      <div class="row mx-1 justify-content-center">
                      <div class="col-lg-6 col-sm-12">
                      <div class='text-center'>
                          
                      <div class="btn-group mt-2 mb-3" role="group" aria-label="Choose an option">
                      <input onclick="deltype()" type="radio" class="btn-check" value="1" name="optchooser" id="optchooser1" checked>
                      <label class="btn btn-outline-primary lbtn" for="optchooser1">Delivery</label>
                      <input onclick="deltype()" type="radio" class="btn-check" value="0" name="optchooser" id="optchooser2">
                      <label class="btn btn-outline-primary rbtn" for="optchooser2">Pick-up</label></div></div>
                      
                      <h5 class="mt-4">Your order</h5>
                      <p class="card-text text-center cart_empty_text">Your cart is empty</p>
                      <div id="cart-section">
                      <table class="table secondary-text table-sm"><tbody class="side-cart"></tbody></table></div>
                      <div class="order_total_price small">
                      <div class="row">
                          
                      <div class="col"><span><strong>Subtotal</strong></span></div>
                      <div class="col text-end">
                      <span class="total_price">
                      <strong>0</strong></span></div></div>
                      <div class="row" id="couponrow" style="display:none;">
                      <div class="col"><span>Coupon discount</span></div>
                      <div class="col text-end"><span>-</span>
                      <span class="discount_c">0</span></div></div>
                      <div class="row">
                      <div class="col"><span>Delivery</span></div>
                      <div class="col text-end">
                      <span class="delivery_charge">0</span></div></div>
                      <div class="row">
                      <div class="col"><span>Tax</span></div>
                      <div class="col text-end"><span class="tax_charge">0 %</span></div></div>
                      <div class="row">
                      <div class="col"><span><strong>Total <small>(with Tax)</small></strong></span></div>
                      <div class="col text-end"><strong class="payable">0</strong></div></div></div>

                      <form id="couponForm">
                        <div class="input-group input-group-sm mt-4"><input type="text" class="form-control" id="couponcode" placeholder="Have a coupon?" aria-label="Have a coupon?" aria-describedby="couponbutton"><button class="btn btn-outline-secondary" type="submit" id="couponbutton">Enter</button></div></form>
                        <div class="" id="couponmsg" style="display:none;"></div>
                        <h5 class="mt-5">Your details</h5>
                        <form id="formx" autocomplete="on" class="g-3 needs-validation" novalidate>
                            <input id="latitude" type="hidden" value=""/><input id="longitude" type="hidden" value=""/>
                        <input id="deliveryzone" type="hidden" value=""/><div class="mt-2">
                            <label for="customer_name" class="form-label">Name</label>
                            <input type="text" class="form-control customer_name" id="customer_name" required><div class="invalid-feedback">Please enter your name.</div></div><div class="mt-2"><label for="custemail" class="form-label">Email</label><input type="email" class="form-control custemail" id="custemail" pattern="^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$" required><div class="invalid-feedback">Please provide a valid email address.</div></div><div class="mt-2"><label for="custphone" class="form-label">Phone</label><input type="tel" class="form-control customer_phone" id="custphone" required><div class="invalid-feedback">Please provide a valid phone number.</div></div><div class="mt-2" id="formdelivery1"><label for="search" class="form-label">Address</label><input type="text" name="address" class="form-control customer_address" id="search" required><div class="invalid-feedback" id="invalidaddrtxt">Provide a valid address.</div></div><div class="mt-2" id="formdelivery2"><label for="reference" class="form-label">Details (Apt number or door)</label><input type="text" name="reference" class="form-control customer_reference" id="reference" required><div class="invalid-feedback">Please provide a valid reference.</div></div><div class="my-3 maphdv" id="formdelivery3" style="display:none;"><div class="text-center"><span style="font-size:.7em;">Verify your address. Reposition the icon if necessary.</span></div><div id="mapid"></div></div><div class="mt-2"><label for="special_note" class="form-label">Note</label><textarea class="form-control" id="special_note" placeholder=""></textarea>
                          <div class="invalid-feedback">Please enter a message in the textarea.</div></div>
                          <div class="d-grid gap-2 click-wp-btn mt-3">
                            <button class="btn btn-primary" id="btnlaunchorder" type="button" onclick="orderplaced()">Send order</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>

@endsection

