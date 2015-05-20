<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Enum\BookingItemType;
use Vacasol\Catalog\Enum\DiscountBy;
use Vacasol\Catalog\Value;

class BookingRequestItem extends Value {
    /**
     * @var float
     */
    protected $NumOfUnit;

    /**
     * @var Price
     */
    protected $Price;

    /**
     * @var string
     */
    protected $Description;

    /**
     * @var string
     */
    protected $Name;

    /**
     * @var float
     */
    protected $VATRate = 0;

    /**
     * @var float
     */
    protected $VATAmount = 0;

    /**
     * @var BookingItemType
     */
    protected $Type;

    /**
     * @var Price
     */
    protected $CostPrice;

    /**
     * @var string
     * @access protected
     */
    protected $ProductTypeId;

    /**
     * @var string 
     */
    protected $InputDate;

    /**
     * @var ConsumptionMeterNumbers
     */
    protected $AdditionalConsumptionNumbers = 0;

    /**
     * @var bool
     */
    protected $RemovalAllowed = 0;

    /**
     * @var DiscountBy
     */
    protected $DiscountBy;

    /**
     * @var bool $BPDiscountEditable
     */
    protected $BPDiscountEditable;


    /**
     * @param DiscountBy $discountBy
     *
     * @return $this
     */
    public function setDiscountBy(DiscountBy $discountBy) {
        $this->DiscountBy = (string)$discountBy;
        return $this;
    }

    /**
     * @return DiscountBy
     */
    public function getDiscountBy() {
        return new DiscountBy($this->DiscountBy);
    }

    /**
     * @param BookingItemType $type
     *
     * @return $this
     */
    public function setType(BookingItemType $type) {
        $this->Type = (string)$type;
        return $this;
    }

    /**
     * @return BookingItemType
     */
    public function getType() {
        return new BookingItemType($this->Type);
    }

    public function __construct($unitCount, Price $price, Price $costPrice, $name,
                                $description, BookingItemType $type, $productTypeId) {
        $this->NumOfUnit = $unitCount;
        $this->Price = $price;
        $this->CostPrice = $costPrice;
        $this->Name = $name;
        $this->Description = $description;
        $this->Type = (string)$type;
        $this->ProductTypeId = $productTypeId;
    }
}