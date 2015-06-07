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

    /**
     * @param ProductType $productType
     *
     * @return $this
     */
    public function setProductType(ProductType $productType) {
        $this->ProductType = (string)$productType;
        return $this;
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
        $price = clone $this->Price;

        if (ProductType::DISCOUNT() == $this->getProductType()) {
            $price->setPrice(-$price->getPrice());
        }
        return $price;
    }

    /**
     * @return BookingRequestItem
     */
    public function toBookingRequestItem() {
        /** @var Price $costPrice */
        $costPrice = is_null($this->getCostPrice())
            ? new Price(0, $this->getPrice()->getCurrencyCode())
            : $this->getCostPrice();

        /** @var Price $price */
        $price = clone $this->getPrice();
        $price->setPrice(abs($price->getPrice()));
        return new BookingRequestItem(
            $price,
            $costPrice,
            $this->Name,
            $this->Name,
            $this->getProductType()->toBookingItemType(),
            $this->ServiceId
        );
    }
}