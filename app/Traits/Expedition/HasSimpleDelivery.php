<?php

namespace App\Traits\Expedition;

use App\Address;
use App\Models\SimpleDelivery;

trait HasSimpleDelivery
{
    public function expeditionRules(){
        return [
            'deliveryAreaId' => ['required','not_in:0']
        ];
    }

    public function setAddressAndApplyDeliveryFee(){
            $this->order->whatsapp_address=$this->request->address_id;
            if($this->request->deliveryAreaId && $this->request->free_delivery!=true){
                $this->order->delivery_price = SimpleDelivery::findOrFail($this->request->deliveryAreaId)->cost;
            }else{
                $this->order->delivery_price = 0;
            }

            $this->order->update();
    }

    public function setTimeSlot(){
        $this->order->delivery_pickup_interval=$this->request->timeslot;
        $this->order->update();
    }
}
