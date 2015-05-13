<?php

namespace Vacasol\Catalog\Value\Request;

use Vacasol\Catalog\Value\Request;
use Vacasol\Catalog\Value\CustomerBookingInfo;

class GetPropertyBookingDetails extends Request {
    /**
     * @var int
     */
    protected $GlobalReferenceNumber;

    /**
     * @var string
     */
    protected $PropertyId;

    /**
     * @var string
     */
    protected $ArrivalDate;

    /**
     * @var string
     */
    protected $DepartureDate;

    /**
     * @var int
     */
    protected $NumberOfAdults;

    /**
     * @var int
     */
    protected $NumberOfChildren;

    /**
     * @var string
     */
    protected $SalesMarketId;

    /**
     * @var string
     */
    protected $LanguageCode;

    /**
     * @var bool
     */
    protected $IgnorePropertyCanBeBooked;

    /**
     * @var CustomerBookingInfo
     */
    protected $CustomerBookingInfo;

    /**
     * @var string
     */
    protected $CampaignId;

    /**
     * @param string $propertyId
     * @param string $arrivalDate
     * @param string $departureDate
     * @param int    $numberOfAdults
     * @param int    $numberOfChildren
     * @param string $languageCode
     * @param string $salesMarketId
     */
    function __construct($propertyId, $arrivalDate, $departureDate, $numberOfAdults, $numberOfChildren,
                         $languageCode, $salesMarketId) {
        $this->PropertyId = $propertyId;
        $this->ArrivalDate = $arrivalDate;
        $this->DepartureDate = $departureDate;
        $this->NumberOfAdults = $numberOfAdults;
        $this->NumberOfChildren = $numberOfChildren;
        $this->LanguageCode = $languageCode;
        $this->SalesMarketId = $salesMarketId;
    }
}