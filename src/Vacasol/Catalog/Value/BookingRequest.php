<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Value;

class BookingRequest extends Value {
    /**
     * @var string $SalesMarketId
     */
    protected $SalesMarketId;

    /**
     * @var BookingRequestItem[] $BookingItems
     */
    protected $BookingItems;

    /**
     * @var Customer $CustomerInfo
     */
    protected $CustomerInfo;

    /**
     * @var int $GlobalReferenceNumber
     */
    protected $GlobalReferenceNumber;

    /**
     * @var string $PropertyId
     */
    protected $PropertyId;

    /**
     * @var int $BookingNumber
     */
    protected $BookingNumber;

    /**
     * @var string $Comments
     */
    protected $Comments;

    /**
     * @var string $ArrivalDate
     */
    protected $ArrivalDate;

    /**
     * @var string $DepartureDate
     */
    protected $DepartureDate;

    /**
     * @var int $NumOfAdult
     */
    protected $NumOfAdult;

    /**
     * @var int $NumOfChild
     */
    protected $NumOfChild;

    /**
     * @var int $NumOfPet
     */
    protected $NumOfPet;

    /**
     * @var boolean $SubscribeEmail
     */
    protected $SubscribeEmail;

    /**
     * @var string $LBPId
     */
    protected $LBPId;

    /**
     * @var string $CampaignId
     */
    protected $CampaignId;

    /**
     * @var ContactPerson $ContactPerson
     */
    protected $ContactPerson;

    /**
     * @var PayOnSpotBookingItem[] $PaidOnSpotItems
     */
    protected $PaidOnSpotItems;

    /**
     * @var CreditCard $CreditCard
     */
    protected $CreditCard;

    /**
     * @var string $LBPBookingID
     */
    protected $LBPBookingID;

    public function __construct($salesMarketId, array $bookingItems, Customer $customer, $propertyId, $arrivalDate,
                                $departureDate, $adultsCount, $childrenCount, CreditCard $creditCard,
                                ContactPerson $contactPerson) {
        $this->SalesMarketId = $salesMarketId;
        $this->BookingItems = $bookingItems;
        $this->CustomerInfo = $customer;
        $this->PropertyId = $propertyId;
        $this->ArrivalDate = $arrivalDate;
        $this->DepartureDate = $departureDate;
        $this->NumOfAdult = $adultsCount;
        $this->NumOfChild = $childrenCount;
        $this->CreditCard = $creditCard;
        $this->ContactPerson = $contactPerson;
    }
}