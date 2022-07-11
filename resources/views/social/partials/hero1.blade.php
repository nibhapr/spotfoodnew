		<main>
<!-- Hero -->
		
<div class="hero-home bg-mockup hero-bottom-border">
<div class="content">
 @if (session('status'))
    <script>
     function showModalPostRegister(){
    $('#modal-notification').modal('show');
    }
    </script>
    @else
    <script>
    function showModalPostRegister(){}
    </script>
     @endif
     <!-- #242c84 -->
     <h1 class="ckedit" key="whatsapp_order" style="color: #fff!important" id="whatsapp_order">{{ __('whatsapp.whatsapp_order') }}</h3>
		<!--<h1 class="animated-element">Whatsapp Ordering</h1>-->
		<p class="ckedit animated-element"style="color:#fff;">{{ __('whatsapp.easy_order') }}</p> 
		<a href="/restaurant/{{ $restorant['subdomain'] }}" class="btn-1 medium animated-element ckedit">{{ __('whatsapp.Demo') }}</a>
		<a href="#orderFood" class="mouse-frame nice-scroll">
		<div class="mouse"></div>
		</a>
		</div>
		</div>
		
	</main>
		<!-- Main End -->