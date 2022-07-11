<?php
    $nl="\n\n";
    $tabSpace="      ";
   
?>
<?php if($order->delivery_method==1): ?>
<?php echo e("*". __('Delivery Order')."*"." from".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"")." 👇"); ?>

<?php endif; ?>
<?php if($order->table): ?>
<?php echo e("*". __('Dine-In Order')."*"." from".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"")." 👇"); ?>

<?php else: ?>
<?php if($order->delivery_method!=1): ?>
<?php echo e("*". __('Pickup Order')."*"." from".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"")." 👇"); ?>

<?php endif; ?>
<?php endif; ?>
********************************
<?php echo e("*". __('ORDERED ITEMS')."*".":"); ?>

<?php
foreach ($order->items()->get() as $key => $item) {$lineprice = $item->pivot->qty.' X '.$item->name." - ".money($item->pivot->qty * $item->pivot->variant_price, config('settings.cashier_currency'), true);
if(strlen($item->pivot->variant_name)>3){$lineprice .=$nl.$tabSpace.__('Variant:')." ".$item->pivot->variant_name;}
if(strlen($item->pivot->extras)>3){foreach (json_decode($item->pivot->extras) as $key => $extra) {$lineprice .=$nl.$tabSpace.$extra;}
    }
     
?>
🔘<?php echo e($lineprice); ?>

<?php
}
?>
********************************
<?php if($order->delivery_method==1): ?>
🛵 <?php echo e(__('Delivery').": ".money(($order->delivery_price), config('settings.cashier_currency'), config('settings.do_convertion'))); ?>

<?php endif; ?>
<?php if($order->discount>0): ?>
🏷️ <?php echo e(__('Discount').": ".money(($order->discount), config('settings.cashier_currency'), config('settings.do_convertion'))); ?>

<?php endif; ?>
<?php if($order->vatvalue>0): ?>
🗒 <?php echo e(__('Total Before VAT').": ".money(($order->order_price-$order->vatvalue), config('settings.cashier_currency'), config('settings.do_convertion'))); ?>

🗒 <?php echo e(__('VAT Incl').": ".money(($order->vatvalue), config('settings.cashier_currency'), config('settings.do_convertion'))); ?>

<?php endif; ?>
🧾 <?php echo e(__('Total: ').money(($order->order_price_with_discount+$order->delivery_price), config('settings.cashier_currency'), config('settings.do_convertion'))); ?>

********************************
<?php if($order->delivery_method==1): ?>
📍 <?php echo e("*". __('Delivery Details')."*"); ?>

<?php echo e("*". __('Name')."*".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"")); ?>

<?php echo e("*". __('Phone Number')."*".": ". ($order->configs&&isset($order->configs['client_phone'])?$order->configs['client_phone']:"")); ?>

<?php echo e("*". __('Address')."*".": ".$order->whatsapp_address); ?>

<?php echo e("*". __('Delivery Area')."*".": ".($order->configs&&isset($order->configs['delivery_area_name'])?$order->configs['delivery_area_name']:"")); ?>

<?php echo e("*". __('Delivery time')."*".": ".$order->getTimeFormatedAttribute()); ?>

<?php elseif($order->delivery_method==2): ?>
<?php echo e("*". __('Pickup Details')."*"); ?>

<?php echo e("*". __('Name')."*".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"")); ?>

<?php echo e("*". __('Phone Number')."*".": ". ($order->configs&&isset($order->configs['client_phone'])?$order->configs['client_phone']:"")); ?>

<?php echo e("*". __('Pickup time')."*".": ".$order->getTimeFormatedAttribute()); ?>

<?php elseif($order->table): ?>
<?php echo e("*". __('Dine-In Details')."*"); ?>

<?php echo e("*". __('Name')."*".": ". ($order->configs&&isset($order->configs['client_name'])?$order->configs['client_name']:"")); ?>

<?php echo e("*". __('Phone Number')."*".": ". ($order->configs&&isset($order->configs['client_phone'])?$order->configs['client_phone']:"")); ?>

<?php echo e("*". __('Table')."*".": ".$order->table->name); ?>

<?php if($order->table->restoarea): ?>
<?php echo e("*". __('Area')."*".": ".$order->table->restoarea->name); ?>

<?php endif; ?>
<?php endif; ?>
<?php if(strlen($order->comment)>0): ?>   
<?php echo e("*". __('Order Note')."*".":"); ?><?php echo e($order->comment); ?>  
<?php endif; ?>
<?php if(config('settings.is_whatsapp_ordering_mode')): ?>   
💳 <?php echo e(__('Payment Options')); ?>

<?php echo e($order->restorant->payment_info); ?>

<?php if(strlen($order->payment_link)>5): ?>
💳 <?php echo e(__('Pay now')); ?>

<?php echo e($order->restorant->getLinkAttribute()."/?pay=".$order->id); ?>

<?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/u774496545/domains/gotshi.com/public_html/resources/views/messages/social.blade.php ENDPATH**/ ?>