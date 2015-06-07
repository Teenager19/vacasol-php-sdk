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

    /**
     * @param int $precision
     *
     * @return float
     */
    public function getPrice($precision = 0) {
        return round($this->Price, $precision);
    }

    /**
     * @param int $precision
     *
     * @return float
     */
    public function getDiscount($precision = 0) {
        return round($this->Discount, $precision);
    }

    /**
     * Returns price without any discount
     *
     * @return float
     */
    public function getOriginalPrice() {
        return $this->getPrice() + $this->getDiscount();
    }
}