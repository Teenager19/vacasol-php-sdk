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
    protected $Discount = 0;

    /**
     * @var float
     */
    protected $CampaignDiscount = 0;

    /**
     * @var string
     */
    protected $CurrencyCode;

    public function __construct($price, $currencyCode) {
        $this->Price = $price;
        $this->CurrencyCode = $currencyCode;
    }
}