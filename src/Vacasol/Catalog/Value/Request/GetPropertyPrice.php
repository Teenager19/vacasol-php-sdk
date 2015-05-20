<?php

namespace Vacasol\Catalog\Value\Request;

use Vacasol\Catalog\Value\Request;
use Vacasol\Catalog\Value\BookingRequestItem;

class GetPropertyPrice extends Request {
    /**
     * @var BookingRequestItem[]
     */
    protected $BookedItems;

    /**
     * @var string
     */
    protected $SalesMarketId;

    /**
     * @var int
     */
    protected $GlobalReferenceNumber;

    /**
     * @var string
     */
    protected $PropertyId;

    /**
     * @var string $ArrivalDate
     */
    protected $ArrivalDate;

    /**
     * @var string $DepartureDate
     */
    protected $DepartureDate;

    /**
     * @param string $salesMarketId
     * @param string $propertyId
     * @param string $arrivalDate
     * @param string $departureDate
     */
    public function __construct($salesMarketId, $propertyId, $arrivalDate, $departureDate) {
        $this->SalesMarketId = $salesMarketId;
        $this->PropertyId = $propertyId;
        $this->ArrivalDate = $arrivalDate;
        $this->DepartureDate = $departureDate;
    }

    /**
     * @param BookingRequestItem $bookingItem
     */
    public function addBookingItem(BookingRequestItem $bookingItem) {
        $this->BookedItems[] = $bookingItem;
    }
}