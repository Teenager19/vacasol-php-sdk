<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Enum\BookingItemType;
use Vacasol\Catalog\Enum\UnitType;
use Vacasol\Catalog\Value;

class PayOnSpotBookingItem extends Value {
    /**
     * @var string
     */
    protected $ItemId;

    /**
     * @var string
     */
    protected $ProductId;

    /**
     * @var string
     */
    protected $ProductType;

    /**
     * @var float
     */
    protected $Price;

    /**
     * @var float
     */
    protected $VATAmount;

    /**
     * @var string
     */
    protected $CurrencyCode;

    /**
     * @var string
     */
    protected $CurrencyId;

    /**
     * @var UnitType
     */
    protected $UnitType;

    /**
     * @var float
     */
    protected $NumOfUnit;

    /**
     * @var bool
     */
    protected $IsMandatory;

    /**
     * @var string
     */
    protected $ItemText;

    /**
     * @var string
     */
    protected $UnitId;

    /**
     * @var string
     */
    protected $UnitText;

    /**
     * @param BookingItemType $bookingItemType
     *
     * @return $this
     */
    public function setProductType(BookingItemType $bookingItemType) {
        $this->ProductType = (string)$bookingItemType;
        return $this;
    }

    /**
     * @return BookingItemType
     */
    public function getProductType() {
        return new BookingItemType($this->ProductType);
    }

    /**
     * @param UnitType $unitType
     *
     * @return $this
     */
    public function setUnitType(UnitType $unitType) {
        $this->UnitType = (string)$unitType;
        return $this;
    }

    /**
     * @return UnitType
     */
    public function getUnitType() {
        return new UnitType($this->UnitType);
    }
}