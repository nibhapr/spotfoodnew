<?php

namespace App\Repositories\Orders\Social;
use App\Repositories\Orders\SocialOrderRepository;
use App\Traits\Payments\HasCOD;
use App\Traits\Expedition\HasDineIn;

class DineinCODOrder extends SocialOrderRepository
{
    use HasDineIn;
    use HasCOD;
}