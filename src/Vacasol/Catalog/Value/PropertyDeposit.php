<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Enum\UnitType;
use Vacasol\Catalog\Value;

class PropertyDeposit extends Value {
    /**
     * @var string
     */
    protected $Name;

    /**
     * @var Price
     */
    protected $Price;

    /**
     * @var bool
     */
    protected $IsPaidOnTheBooking;

    /**
     * @var bool
     */
    protected $IsPaidOnTheSpot;

    /**
     * @var UnitType
     */
    protected $UnitType;

    /**
     * @return UnitType
     */
    public function getUnitType() {
        return new UnitType($this->UnitType);
    }
}