<?php

namespace Vacasol\Catalog\Value;
use Vacasol\Catalog\Enum\ProductType;
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
     * Returns item of discount coupon if exists
     *
     * @param string $couponCode
     *
     * @return MandatoryItem|null
     */
    public function getCouponItem($couponCode) {
        if (is_null($this->getMandatoryItems())) {
            return;
        }

        foreach ($this->getMandatoryItems() as $mandatoryItem) {
            if (ProductType::DISCOUNT == $mandatoryItem->getProductType()
                && $mandatoryItem->getName() == $couponCode) {
                return $mandatoryItem;
            }
        }
    }

    /**
     * Returns the base discounted rental price (without any optional extras)
     *
     * @return float
     */
    public function getFinalBookingPrice() {
        $price = 0;
        if (is_null($mandatoryItems = $this->getMandatoryItems())) {
            return $price;
        }
        foreach ($mandatoryItems as $mandatoryItem) {
            $price += $mandatoryItem->getPrice()->getPrice();
        }
        return $price;
    }

    /**
     * Returns the discount amount of mandatory items included in the booking
     *
     * @return float
     */
    public function getDiscountBookingPrice() {
        $discountPrice = 0;
        if (is_null($mandatoryItems = $this->getMandatoryItems())) {
            return $discountPrice;
        }
        foreach ($mandatoryItems as $mandatoryItem) {
            $discountPrice += $mandatoryItem->getPrice()->getDiscount();
        }
        return $discountPrice;
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