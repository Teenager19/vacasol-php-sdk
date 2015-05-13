<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Value;

class Price extends Value {
    /**
     * @var float
     */
    protected $Price;

    /**
     * @var float
     */
    protected $Discount;

    /**
     * @var float
     */
    protected $CampaignDiscount;

    /**
     * @var string
     */
    protected $CurrencyCode;
}