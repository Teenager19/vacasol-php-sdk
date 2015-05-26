<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Enum\ProductType;
use Vacasol\Catalog\Enum\UnitType;
use Vacasol\Catalog\Value;

class BookingItem extends Value {
    /**
     * @var string
     */
    protected $Name;

    /**
     * @var Price
     */
    protected $Price;

    /**
     * @var Price
     */
    protected $CostPrice;

    /**
     * @var Price
     */
    protected $OriginalPrice;

    /**
     * @var float
     */
    protected $VATRate;

    /**
     * @var float
     */
    protected $VATAmount;

    /**
     * @var string
     */
    protected $ProductType;
    /**
     * @var string
     */
    protected $UnitType;

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
     * @var bool
     */
    protected $RemovalAllowed;

    /**
     * @var string
     */
    protected $UnitText;

    /**
     * @var int
     */
    protected $ServiceId;

    /**
     * @param UnitType $unitType
     */
    public function setUnitType(UnitType $unitType) {
        $this->UnitType = (string)$unitType;
    }

    /**
     * @return UnitType
     */
    public function getUnitType() {
        return new UnitType($this->UnitType);
    }

    /**
     * @param ProductType $productType
     */
    public function setProductType(ProductType $productType) {
        $this->ProductType = (string)$productType;
    }

    /**
     * @return ProductType
     */
    public function getProductType() {
        return new ProductType($this->ProductType);
    }

    /**
     * @return Price
     */
    public function getPrice() {
        /** @var Price $price */
        $price = $this->Price;

        if (ProductType::DISCOUNT == $this->ProductType) {
            $price->setPrice(-$price->getPrice());
        }
        return $price;
    }

    /**
     * @return BookingRequestItem
     */
    public function toBookingRequestItem() {
        return new BookingRequestItem(
            $this->Price,
            $this->CostPrice,
            $this->Name,
            $this->Name,
            $this->getProductType()->toBookingItemType(),
            $this->ServiceId
        );
    }
}