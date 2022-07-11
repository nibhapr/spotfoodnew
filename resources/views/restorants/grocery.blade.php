<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage" lang="en">
<head>
@extends('layouts.front3', ['class' => ''])
	<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Spot mini supermarket</title>

	<link type="text/css" href="{{ asset('custom') }}/hungry/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset('argonfront') }}/css/font-awesome.css" rel="stylesheet" />
	<link href="{{ asset('argonfront') }}/css/nucleo-svg.css" rel="stylesheet" />
    <link href="{{ asset('argonfront') }}/css/nucleo-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
	<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.3.2/dist/geosearch.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css" />

	<style>#searchicon{padding:.5rem 1rem;color:#252c41}.header{background-image:url(https://thehungryman.in/default/thehungry.jpg);background-repeat:no-repeat;background-position:center center;background-size:cover;z-index:-1;height:350px;position:relative}.storename{color:#485273;font-weight:500!important;font-size:1.75rem}.truncate{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;font-size:.875rem;line-height:1.25rem}.prodtitle{font-size:1.1rem}.currencyd{font-size:1rem}.prodb{background-color:#fff;color:#485273}body{background-color:#f0f0f0;height:100%;word-wrap:break-word;white-space:normal;text-rendering:optimizeLegibility;color:#485273}.modal-content{background-color:#fff}.modal-header,.modal-footer{border-color:rgba(0,0,0,.12)}.table>tbody>tr>td,.table>tbody>tr>th,.table>tfoot>tr>td,.table>tfoot>tr>th,.table>thead>tr>td,.table>thead>tr>th{padding:8px;line-height:1.42857143;vertical-align:top;border-color:rgba(0,0,0,.12)}.table-success,.table-success>td,.table-success>th{background-color:#2595d3;color:white}.variationprice{opacity:.5;font-weight:600;margin-left:10px}.bg-success{background-color:#4caf50!important}.btn-outline-primary,.btn-outline-primary.disabled{background-color:white;border:solid 2px #2595d3;color:#2595d3;border-radius:10px;font-weight:600}.btn-check:checked+.btn-outline-primary,.btn-outline-primary:active{color:#fff;background-color:#2595d3;border-color:#2595d3}.lbtn{border-top-left-radius:10px!important;border-bottom-left-radius:10px!important}.rbtn{border-top-right-radius:10px!important;border-bottom-right-radius:10px!important}.btn-primary,.btn-primary:focus,.btn-primary:hover,.btn-primary:disabled,.btn-outline-primary:hover{color:#fff;background-color:#2595d3;border-color:#2595d3}.btn-check:disabled+.btn,.btn-check[disabled]+.btn{opacity:100}.logoimg{-webkit-border-radius:8px;border-radius:8px;object-fit:cover;width:150px;height:150px;box-shadow:0 0 10px 5px rgba(0,0,0,.2);margin-right:10px;margin-top:-95px}.category-header{color:#485273;font-weight:600;font-size:1.2em}.badgebg{background-color:#ff5da5}.badge1{position:absolute;bottom:5px;left:5px}.badge2{position:absolute;top:5px;right:5px}.discountpricecolor{color:#ff5da5!important}.nav{white-space:nowrap;overflow-x:auto;font-size:15px;font-weight:500;margin-top:10px;-webkit-transition:all .3s ease-out;transition:all .3s ease-out}.nav a{color:#252c41}.nav-item{border-bottom:4px transparent solid}ul.nav .nav-item.active a{color:#252c41;border-bottom:4px #ff5da5 solid}.fixedmenu{position:fixed;top:0;left:0;width:100%;background-color:#f0f0f0;margin:0;z-index:1000;-webkit-box-shadow:0 2px 10px 0 rgba(0,0,0,.2);box-shadow:0 2px 10px 0 rgba(0,0,0,.2);justify-content:center}.productimg{object-fit:cover;-webkit-border-radius:4px;border-radius:4px;width:14rem;height:12rem}.unavail{opacity:.5}.hiddenbtn{display:none}.form-check-label{font-size:13px}.search-input-field{margin-bottom:25px}#expireModal{margin-top:11%}.secondary{border:0;color:white;background-color:#2595d3;box-shadow:0 1px 10px 0 rgb(0 0 0 / 20%)}.modal-header,.modal-footer{border:0}.minimum-value-alert{background:#ff5da5;width:100%;position:fixed;top:0;z-index:1500;border-radius:3px}.floating-alert,.floating-wp-alert{background:#ff5da5;width:100%;position:fixed;top:0;z-index:1500;border-radius:3px}.floating-cart{position:fixed;bottom:0;z-index:999}.floating-cart-bg{background-color:#2595d3;-webkit-box-shadow:0 2px 10px 0 rgba(0,0,0,.3);box-shadow:0 2px 10px 0 rgba(0,0,0,.3);border-radius:4px}a.stretched-link:before{content:"";position:absolute;top:0;left:0;height:100%;width:100%}.floating-cart-text{font-size:14px;color:#fff;font-weight:600}.floating-cart-btn{font-size:14px;background:#2595d3}.empty-cart-alert{background:#ff5da5;width:100%;position:fixed;top:0;z-index:1500;border-radius:3px}.search-icon,.close-search-icon{cursor:pointer}#mapid{height:350px;width:100%;margin-top:0;margin-bottom:10px}#infomap{height:350px;width:100%;margin-top:0;margin-bottom:10px}.ui-widget{font-family:var(--bs-font-sans-serif);font-size:1em}.ui-autocomplete{z-index:1070!important}#storeinfoarea{color:#fff;margin-right:10px;margin-left:10px;border-bottom-left-radius:6px;border-bottom-right-radius:6px;border-top-left-radius:6px;border-top-right-radius:6px;-webkit-box-shadow:0 2px 10px 0 rgba(0,0,0,.3);box-shadow:0 2px 10px 0 rgba(0,0,0,.3)}#storeinfoarea2{border-bottom-left-radius:6px;border-bottom-right-radius:6px;border-top-left-radius:6px;border-top-right-radius:6px;-webkit-box-shadow:0 2px 10px 0 rgba(0,0,0,.3);box-shadow:0 2px 10px 0 rgba(0,0,0,.3)}.bg_t1{color:#292929;background-color:rgba(255,255,255,.8);border-color:rgba(255,255,255,.8)}.mainc{margin-bottom:60px;min-height:calc(100vh - 250px)}.iti{width:100%;color:#383838;font-weight:400}.iti__arrow{border:0}.iti input::placeholder{color:#B3B3B3!important}.iti-mobile .iti--container{top:200px;bottom:200px;left:30px;right:30px;position:fixed}@media only screen and (max-width:540px){#expireModal{margin-top:50%}.productimg{width:10rem;height:10rem}.modal-footer p{margin-top:2px}}</style></head><body>
<!-- show active shop begin -->
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
  <div class="container header">
  </div>
  <div class="container prodb">
  <div class="row">
  <div class="col-lg-4 col-sm-12 text-center text-lg-start text-sm-center">
  <div class="row">
  <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12 text-center">
  <img class="logoimg" src="{{ $restorant->logom }}" alt="">
  </div>
  <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12">
  <h3 class=" storename mt-3" data-toggle="modal" data-target="#modal-restaurant-info">{{ $restorant->name }}</h3>
  
  </div>
  </div>
  </div>
  <div class="col-lg-8 col-sm-12 text-center text-lg-end text-sm-center pt-3">
  @if(!empty($restorant->address))<i class="ni ni-pin-3"></i></i> <a target="_blank" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($restorant->address) }}"><span class="notranslate">{{ $restorant->address }}</span></a>@endif 
 
   <button type="button" id="storeinfoarea" class="btn btn-sm bg-danger me-2" data-toggle="modal" data-bs-target="#shopinformationModal"> <i class="bi bi-clock"></i> @if(!empty($openingTime))<span class="closed_time">{{__('Opens')}} {{ $openingTime }}</span>@endif @if(!empty($closingTime))<span class="opened_time">{{__('Opened until')}} {{ $closingTime }}</span> @endif</button>
   
   <button type="button" id="storeinfoarea2" class="btn btn-sm btn-outline-success bg_t1" data-toggle="modal" data-target="#modal-restaurant-info"></i>@if(!empty($restorant->phone)) <i class="ni ni-mobile-button"></i> <a href="tel:{{$restorant->phone}}">{{ $restorant->phone }} </a> @endif</button>
  </div>
  </div>
  <div class="row text-center mt-3">
  <div class="col">
  <p class="" style="white-space: pre-wrap; font-size: 13px;" > We provide these with a dedication to the highest quality of customer satisfaction delivered with a sense of warmth, friendliness, fun, individual pride, and company spirit.

  Payments on delivery: 💵 Cash or 💳 Credit Card

  🛵 Get your groceries within 30 minutes. ⏱</p>
</div>
</div>

            
<section class="section-cat">

  <div class="row">
  <div class="col d-flex justify-content-center" id="colmenu">
  <ul class="nav flex-nowrap" id="catsrow">
     
<li class="nav-item">
  @foreach ( $restorant->categories as $key => $category)
                        @if(!$category->items->isEmpty())
                        <a class="nav-link page-scroll" href="#{{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}">{{ $category->name }}</a>
                        </li>
                        @endif
                        @endforeach
  
    </ul>
    </div>
    </div>
    </div>
  </section>  
  <!------------------------------------->
    
    <div class="container mt-2 mainc gx-0 sf1">
    @foreach ( $restorant->categories as $key => $category) 
	<div class="col">
    <div class="d-flex align-items-start flex-column prodb text-center mx-0 my-2 px-3 py-3 align-items-center">
    <div class="category-header product">
    <div id="{{ $category->name }}">
    <div class="{{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}" class="{{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}" id="{{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}">
    <div class="row {{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}">
                  <h5 class="mb-4 col-md-12" style="margin-top: 0px;">{{ $category->name }}</h5>    
    </div>
    </div>
    </div>
    </div>
    </div>
	</div>
    <div class="row gx-2 gx-md-3 mb-lg-4">
      @foreach ($category->aitems as $item)
	  <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-2 d-flex sf2">
      <div class="d-flex align-items-start flex-column prodb text-center mx-0 my-2 px-3 py-3 w-100">
      <div class="align-self-center">
      @if(!empty($item->image))
      <img src="{{ $item->logom }}"  class="mr-3 rounded-pill" onclick="setCurrentItem({{ $item->id }})">
      @endif
     
			<div class="mt-2 mb-2" onclick="show_subitem('1','7.6')" data-bs-target="#modal-1">
			<span class="fw-bold lh-sm prodtitle truncate" id="{{ $item->id }}">{{ $item->name }} </span>
	  </div>
      </div>
      <div class="mb-auto align-self-center"><span class="lh-sm truncate">{{ $item->short_description}}</span> 
      </div>
      <div class="align-self-center mt-2 mb-2">
    <del class=""><span class="fw-bold currencyd"></span></del>&nbsp;
		<span class="fw-bold currencyd discountpricecolor"> @money($item->price, config('settings.cashier_currency'),config('settings.do_convertion'))</span> 
			</div> 
   <button type="button" class="btn w-100 secondary text-white "onclick="setCurrentItem({{ $item->id }})" href="javascript:void(0)" data-value="1"><i class="bi bi-cart3"></i> Add </button>
   
</div>
</div>
@endforeach
</div>
@endforeach
</div>
 @if(  !(isset($canDoOrdering)&&!$canDoOrdering)   )
            <div onClick="openNav()" class="callOutShoppingButtonBottom icon icon-shape bg-gradient-red  rounded-circle shadow mb-4">
                <i class="ni ni-cart"></i>
            </div>
@endif
@section('js')
    <script>
        var CASHIER_CURRENCY = "<?php echo  config('settings.cashier_currency') ?>";
        var LOCALE="<?php echo  App::getLocale() ?>";
        var IS_POS=false;
        var TEMPLATE_USED="<?php echo config('settings.front_end_template','defaulttemplate') ?>";
    </script>
    <script src="{{ asset('custom') }}/js/order.js"></script>
    @include('restorants.phporderinterface') 
    @if (isset($showGoogleTranslate)&&$showGoogleTranslate&&!$showLanguagesSelector)
        @include('googletranslate::scripts')
    @endif
@endsection

@if (isset($showGoogleTranslate)&&$showGoogleTranslate&&!$showLanguagesSelector)
    @section('head')
        <!-- Style  Google Translate -->
        <link type="text/css" href="{{ asset('custom') }}/css/gt.css" rel="stylesheet">
    @endsection
@endif
 
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-geosearch@3.3.2/dist/geosearch.umd.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
<script src="https://static.kiripp.com/assets/new/jquery.lazy.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
<script src="https://static.kiripp.com/assets/new/common_114.js"></script>
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
             @include('restorants.phporderinterface')
           