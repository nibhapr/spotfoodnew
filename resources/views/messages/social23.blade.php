<?php
    $dnl="\n\n";
    $nl="\n\n";
    $tabSpace="      ";
?>

@if ($order->delivery_method==1)
{{ __("Delivery Order from ").($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"")." 👇"}}
@else
{{ __("Pickup Order from ").($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"")." 👇"}}
@endif
********************************
ORDER ITEMS:
<?php
foreach ($order->items()->get() as $key => $item) {
    $lineprice = $item->pivot->qty.' X '.$item->name." - ".money($item->pivot->qty * $item->pivot->variant_price, config('settings.cashier_currency'), true);
    if(strlen($item->pivot->variant_name)>3){
        $lineprice .=$nl.$tabSpace.__('Variant:')." ".$item->pivot->variant_name;
    }
    if(strlen($item->pivot->extras)>3){
        foreach (json_decode($item->pivot->extras) as $key => $extra) {
            $lineprice .=$nl.$tabSpace.$extra;
        }
    }
?>
🔘{{ $lineprice }}
<?php
}
?>
********************************
@if ($order->delivery_method==1)
🗒 {{ __('Sub total').": ".money(($order->order_price), config('settings.cashier_currency'), config('settings.do_convertion')) }}
🛵 {{ __('Delivery').": ".money(($order->delivery_price), config('settings.cashier_currency'), config('settings.do_convertion')) }}
@endif
@if ($order->discount>0)
🏷️ {{ __('Discount').": ".money(($order->discount), config('settings.cashier_currency'), config('settings.do_convertion')) }}
@endif
🧾 {{__('Total: ').money(($order->order_price_with_discount+$order->delivery_price), config('settings.cashier_currency'), config('settings.do_convertion')) }}
********************************
<?php  //Deliver / Pickup details ?>
@if($order->delivery_method==1)
<?php  //Deliver?>
{{ __('Name').": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"") }}
{{ __('Phone Number').": ". ($order->configs&&isset($order->configs['client_phone'])?$order->configs['client_phone']:"") }}
{{ __('Address').": ".$order->whatsapp_address }}
{{ __('Delivery time').": ".$order->getTimeFormatedAttribute() }}
@endif
@if(config('settings.is_whatsapp_ordering_mode'))   
<?php //Payment ?>
💳 {{ __('Payment Options') }}
{{ $order->restorant->payment_info }}

<?php //Payment Link ?>

@if(strlen($order->payment_link)>5)
<?php //Add the payment link ?>
💳 {{ __('Pay now') }}
{{ $order->restorant->getLinkAttribute()."/?pay=".$order->id }}
@endif
@endif
