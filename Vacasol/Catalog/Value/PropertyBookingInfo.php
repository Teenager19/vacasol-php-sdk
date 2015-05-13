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
        return !is_null($this->OptionalServices) ? $this->OptionalServices->ServiceType : null;
    }

    /**
     * @return MandatoryItem[]|null
     */
    public function getMandatoryItems() {
        return !is_null($this->MandatoryItems) ? $this->MandatoryItems->MandatoryItem : null;
    }

    /**
     * @return PaymentMethod[]|null
     */
    public function getPaymentInfo() {
        return !is_null($this->PaymentInfo) ? $this->PaymentInfo->PaymentMethodType : null;
    }

    /**
     * @return PayOnSpotBookingItem[]|null
     */
    public function getPaidOnSpotItems() {
        return !is_null($this->PaidOnSpotItems) ? $this->PaidOnSpotItems->BookingSpotItems : null;
    }

    /**
     * @return Consumption[]|null
     */
    public function getConsumptionProduct() {
        return !is_null($this->ConsumptionProduct) ? $this->ConsumptionProduct->ConsumptionType : null;
    }

    /**
     * Returns the base rental price (without any extras)
     *
     * @return float
     */
    public function getBaseBookingPrice() {
        $basePrice = 0;
        foreach ($this->getMandatoryItems() as $mandatoryItem) {
            $basePrice += $mandatoryItem->getPrice()->getPrice();
        }

        return $basePrice;
    }
}