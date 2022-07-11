<?php

namespace App\Repositories\Orders\Social;
use App\Repositories\Orders\SocialOrderRepository;
use App\Traits\Payments\HasLinkPayment;
use App\Traits\Expedition\HasDineIn;

class DineinLinkPaymentOrder extends SocialOrderRepository
{
    use HasDineIn;
    use HasLinkPayment;
}