<?php

namespace Vacasol\Catalog\Value;
use Vacasol\Catalog\Enum\UnitType;
use Vacasol\Catalog\Value;

class Consumption extends Value {
    /**
     * @var string
     */
    protected $Name;

    /**
     * @var Price
     */
    protected $PricePerUnit;

    /**
     * @var Price
     */
    protected $CostPricePerUnit;

    /**
     * @var float
     */
    protected $VATRate;

    /**
     * @var float
     */
    protected $VATAmountPerUnit;

    /**
     * @var Period
     */
    protected $ValidPeriod;

    /**
     * @var string
     */
    protected $ConsumptionId;

    /**
     * @var bool
     */
    protected $IsPaidOnTheSpot;

    /**
     * @var bool
     */
    protected $IsShowedToCustomer;

    /**
     * @var bool
     */
    protected $IsIncludedInRentalPrice;

    /**
     * @var UnitType
     */
    protected $UnitType;

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