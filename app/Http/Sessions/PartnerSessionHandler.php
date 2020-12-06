<?php


namespace App\Http\Sessions;

use App\Http\Sessions\Traits\Partner\flushTrait;
use App\Http\Sessions\Traits\Partner\invalidDataTrait;
use App\Http\Sessions\Traits\Partner\partnerIsAuthorizingTrait;
use App\Http\Sessions\Traits\Partner\partnerIsSubmittingTrait;
use App\Http\Sessions\Traits\Partner\partnerTrait;
use App\Http\Sessions\Traits\Partner\tempUpdatedPartnerTrait;

class PartnerSessionHandler
{
    use partnerTrait ,
        tempUpdatedPartnerTrait ,
        partnerIsAuthorizingTrait ,
        invalidDataTrait ,
        partnerIsSubmittingTrait ,
        flushTrait;
}
