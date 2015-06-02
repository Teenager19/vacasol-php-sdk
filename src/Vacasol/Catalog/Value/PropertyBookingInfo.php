<?php

namespace Vacasol\Catalog\Value;
use Vacasol\Catalog\Value;

class PropertyBookingInfo extends Value {

    /**
     * @var PropertyDeposit
     */
    protected $Deposit;

    /**
     * @var object
     */
    protected $OptionalServices;

    /**
     * @var object
     */
    protected $MandatoryItems;

    /**
     * @var object
     */
    protected $ConsumptionProduct;

    /**
     * @var ContactPerson
     */
    protected $ContactPerson;

    /**
     * @var string
     */
    protected $HouseRefNo;

    /**
     * @var int
     */
    protected $GlobalRef;

    /**
     * @var string
     */
    protected $CPDepartment;

    /**
     * @var string
     */
    protected $PropertyType;

    /**
     * @var string
     */
    protected $PropertyCountryCode;

    /**
     * @var int
     */
    protected $MaxPersonsAllowed;

    /**
     * @var object
     */
    protected $PaymentInfo;

    /**
     * @var object
     */
    protected $SeasonPrices;

    /**
     * @var string
     */
    protected $MainPictureID;

    /**
     * @var string
     */
    protected $CampaignID;

    /**
     * @var object
     */
    protected $PaidOnSpotItems;

    /**
     * @return ServiceType[]|null
     */
    public function getOptionalServices() {
        return isset($this->OptionalServices->ServiceType) ? $this->OptionalServices->ServiceType : null;
    }

    /**
     * @return MandatoryItem[]|null
     */
    public function getMandatoryItems() {
        return isset($this->MandatoryItems->MandatoryItem) ? $this->MandatoryItems->MandatoryItem : null;
    }

    /**
     * @param MandatoryItem[] $mandatoryItems
     *
     * @return $this
     */
    public function setMandatoryItems(array $mandatoryItems) {
        $this->MandatoryItems = (object)['MandatoryItem' => $mandatoryItems];
        return $this;
    }

    /**
     * @return PaymentMethod[]|null
     */
    public function getPaymentInfo() {
        return isset($this->PaymentInfo->PaymentMethodType) ? $this->PaymentInfo->PaymentMethodType : null;
    }

    /**
     * @return PayOnSpotBookingItem[]|null
     */
    public function getPaidOnSpotItems() {
        return isset($this->PaidOnSpotItems->BookingSpotItems) ? $this->PaidOnSpotItems->BookingSpotItems : null;
    }

    /**
     * @return Consumption[]|null
     */
    public function getConsumptionProduct() {
        return isset($this->ConsumptionProduct->ConsumptionType) ? $this->ConsumptionProduct->ConsumptionType : null;
    }

    /**
     * Returns the base rental price (without any optional extras)
     *
     * @return float
     */
    public function getFullBookingPrice() {
        $basePrice = 0;
        foreach ($this->getMandatoryItems() as $mandatoryItem) {
            $basePrice += $mandatoryItem->getPrice()->getPrice();
        }
        return $basePrice;
    }

    /**
     * Returns the base discounted rental price (without any optional extras)
     *
     * @return float
     */
    public function getFinalBookingPrice() {
        $price = 0;
        foreach ($this->getMandatoryItems() as $mandatoryItem) {
            $price += $mandatoryItem->getPrice()->getPrice();
        }
        return round($price, Price::GREAT_PRECISION);
    }

    /**
     * Returns the discount amount of mandatory items included in the booking
     *
     * @return float
     */
    public function getDiscountBookingPrice() {
        $discountPrice = 0;
        foreach ($this->getMandatoryItems() as $mandatoryItem) {
            $discountPrice += $mandatoryItem->getPrice()->getDiscount();
        }
        return round($discountPrice, Price::GREAT_PRECISION);
    }

    /**
     * Returns the original price before any discount has been applied
     *
     * @return float
     */
    public function getOriginalBookingPrice() {
        return $this->getFinalBookingPrice() + $this->getDiscountBookingPrice();
    }
}