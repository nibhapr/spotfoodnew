<?php
    $nl="\n\n";
    $tabSpace="      ";
   
?>
@if ($order->delivery_method==1)
{{"*". __('Delivery Order')."*"." from".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"")." 👇"}}
@endif
@if ($order->table)
{{"*". __('Dine-In Order')."*"." from".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"")." 👇"}}
@else
@if ($order->delivery_method!=1)
{{"*". __('Pickup Order')."*"." from".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"")." 👇"}}
@endif
@endif
********************************
{{"*". __('ORDERED ITEMS')."*".":"}}
<?php
foreach ($order->items()->get() as $key => $item) {$lineprice = $item->pivot->qty.' X '.$item->name." - ".money($item->pivot->qty * $item->pivot->variant_price, config('settings.cashier_currency'), true);
if(strlen($item->pivot->variant_name)>3){$lineprice .=$nl.$tabSpace.__('Variant:')." ".$item->pivot->variant_name;}
if(strlen($item->pivot->extras)>3){foreach (json_decode($item->pivot->extras) as $key => $extra) {$lineprice .=$nl.$tabSpace.$extra;}
    }
     
?>
🔘{{ $lineprice }}
<?php
}
?>
********************************
@if ($order->delivery_method==1)
🛵 {{ __('Delivery').": ".money(($order->delivery_price), config('settings.cashier_currency'), config('settings.do_convertion')) }}
@endif
@if ($order->discount>0)
🏷️ {{ __('Discount').": ".money(($order->discount), config('settings.cashier_currency'), config('settings.do_convertion')) }}
@endif
@if($order->vatvalue>0)
🗒 {{ __('Total Before VAT').": ".money(($order->order_price-$order->vatvalue), config('settings.cashier_currency'), config('settings.do_convertion')) }}
🗒 {{ __('VAT Incl').": ".money(($order->vatvalue), config('settings.cashier_currency'), config('settings.do_convertion')) }}
@endif
🧾 {{__('Total: ').money(($order->order_price_with_discount+$order->delivery_price), config('settings.cashier_currency'), config('settings.do_convertion')) }}
********************************
@if($order->delivery_method==1)
📍 {{"*". __('Delivery Details')."*"}}
{{"*". __('Name')."*".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"") }}
{{"*". __('Phone Number')."*".": ". ($order->configs&&isset($order->configs['client_phone'])?$order->configs['client_phone']:"") }}
{{"*". __('Address')."*".": ".$order->whatsapp_address }}
{{"*". __('Delivery Area')."*".": ".($order->configs&&isset($order->configs['delivery_area_name'])?$order->configs['delivery_area_name']:"") }}
{{"*". __('Delivery time')."*".": ".$order->getTimeFormatedAttribute() }}
@elseif($order->delivery_method==2)
{{"*". __('Pickup Details')."*"}}
{{"*". __('Name')."*".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"") }}
{{"*". __('Phone Number')."*".": ". ($order->configs&&isset($order->configs['client_phone'])?$order->configs['client_phone']:"") }}
{{"*". __('Pickup time')."*".": ".$order->getTimeFormatedAttribute() }}
@elseif($order->table)
{{"*". __('Dine-In Details')."*"}}
{{"*". __('Name')."*".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"") }}
{{"*". __('Phone Number')."*".": ". ($order->configs&&isset($order->configs['client_phone'])?$order->configs['client_phone']:"") }}
{{"*". __('Table')."*".": ".$order->table->name }}
@if ($order->table->restoarea)
{{"*". __('Area')."*".": ".$order->table->restoarea->name}}
@endif
@endif
@if (strlen($order->comment)>0)   
{{"*". __('Order Note')."*".":"}}{{$order->comment }}  
@endif
@if(config('settings.is_whatsapp_ordering_mode'))   
💳 {{ __('Payment Options') }}
{{ $order->restorant->payment_info }}
@if(strlen($order->payment_link)>5)
💳 {{ __('Pay now') }}
{{ $order->restorant->getLinkAttribute()."/?pay=".$order->id }}
@endif
@endif
