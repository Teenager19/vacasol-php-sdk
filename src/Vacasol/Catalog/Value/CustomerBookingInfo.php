<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Value;

class CustomerBookingInfo extends Value {
    /**
     * @var string
     */
    protected $UserName;

    /**
     * @var string
     */
    protected $BookingNumber;

    /**
     * @param string $userName
     * @param string $bookingNumber
     */
    function __construct($userName, $bookingNumber) {
        $this->UserName = $userName;
        $this->BookingNumber = $bookingNumber;
    }


}