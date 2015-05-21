<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Value;

class Price extends Value {

    const GREAT_PRECISION = 2;

    /**
     * @var float
     */
    protected $Price;

    /**
     * @var float Percentage based discount
     */
    protected $Discount = 0;

    /**
     * @var float Percentage based campaign discount
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