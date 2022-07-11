@extends('layouts.front2', ['class' => ''])
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

<div v-cloak id="app"></div>
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
<img class="img-fluid mr-3 float-left" src="{{ $restorant->logom }}"alt="spotfood" />
                        <h2 class="text-white">{{ $restorant->name }}</h2>
                        <p class="text-white mb-1">
                            <i class="fa-map-marker"></i></i> {{ $restorant->address }}
                            <br>
                            <span :class="{ open: shopStatus() == 'open', closed: shopStatus() !== 'open'}"
                                  class="badge badge-status"> @if(!empty($openingTime))<span class="closed_time">{{__('Opens')}} {{ $openingTime }}</span>@endif @if(!empty($closingTime))<span class="opened_time">{{__('Opened until')}} {{ $closingTime }}</span> @endif</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="restaurant-detailed-header-right text-right">
                        <span class="shop-time"><i class="icofont-clock-time text-capitalize"></i> @if(!empty($restorant->phone)) <i class="fa fa-phone"></i> <a href="tel:{{$restorant->phone}}">{{ $restorant->phone }} </a> @endif</span>
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
<div class="row mx-2">
    <div class="col-12 col-md-8">
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
                            <span><button class="btn btn-outline-secondary btn-sm text-uppercase float-right waves-effect waves-light" onclick="setCurrentItem({{ $item->id }})" href="javascript:void(0)">{{ __('Add') }}</button></span>
                            @endif
                            <div class="media">
                            @if(!empty($item->image))
                            <img src="{{ $item->logom }}"  class="mr-3 rounded-pill" onclick="setCurrentItem({{ $item->id }})">
                            @endif
                            <div class="media-body">
                            <h6 class="mb-1"><span id="{{ $item->id }}">{{ $item->name }}</span></h6>
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
                            
                <div class="col-md-4">
                    <div class="d-inline d-md-block">
                        <div class="quick-cart">
                            <div class="quick-cart-header" style="margin-left: 19px;">
                                <h5><i class="fa fa-shopping-cart"></i> your cart  <small class="text-black-50"> items</small></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                            </div>
                            <div class="cart-detail">
                            <div class="menu-list-box scroll-box">
                                <div id="cartList" v-cloak>
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
															<i class="fa fa-minus"></i>
														</button>
														<div class="px-2" style="background: #ffa051;">
														    <p class="count" value="@{{ item.quantity }}" style="font-size: 15px!important;">@{{ item.quantity }}</p>
														</div>
														<button v-on:click="incQuantity(item.id)" :value="item.id" type="button" class="btn-sm right inc btn btn-outline-secondary m-0">
															<i class="fa fa-plus"></i>
														</button>
														<button type="button" v-on:click="remove(item.id)"  :value="item.id" class="btn btn-outline-primary btn-icon btn-sm page-link btn-cart-radius ml-3" style="border-radius: 10px;">
                                                            <span class="btn-inner--icon btn-cart-icon"><i class="fa fa-trash"></i></span>
                                                        </button>
													</span>
                                                <p class="text-gray text-dark"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div id="totalPrices" v-cloak>
                                <div class="row">
                                <div class="col" style="margin-top: 14px;padding-bottom:15px;text-align:center;">
                                            <span v-if="totalPrice==0">{{ __('Cart is empty') }}!</span>
                                            <span v-if="totalPrice"><strong>{{ __('Subtotal') }}:</strong></span>
                                            <span v-if="totalPrice" class="ammount"><strong>@{{ totalPriceFormat }}</strong></span>
                                        </div>
                                        <a v-if="totalPrice" class="checkoutbtn" href="/cart-checkout">View Cart</a>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
            @include('restorants.partials.modal')
            @endsection
            @section('js')
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
            <script>
            var CASHIER_CURRENCY = "<?php echo  config('settings.cashier_currency') ?>";
            var LOCALE="<?php echo  App::getLocale() ?>";
            var IS_POS=false;
            var TEMPLATE_USED="<?php echo config('settings.front_end_template','defaulttemplate') ?>";
            </script>
           <script src="{{ asset('custom') }}/js/order.js"></script>
            @include('restorants.phporderinterface')
            @endsection

