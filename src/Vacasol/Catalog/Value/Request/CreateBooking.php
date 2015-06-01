<?php

namespace Vacasol\Catalog\Value\Request;

use Vacasol\Catalog\Value\Request;
use Vacasol\Catalog\Value\BookingRequest;

class CreateBooking extends Request {
    
    /**
     * @var string $LanguageCode
     */
    protected $LanguageCode;

    /**
     * @var BookingRequest $BookingInfo
     */
    protected $BookingInfo;

    /**
     * @var boolean $OverrideOption
     */
    protected $OverrideOption = false;

    /**
     * @var boolean $OverrideRules
     */
    protected $OverrideRules = false;

    /**
     * @var string $BPUserName
     */
    protected $BPUserName;

    /**
     * @var string $OverrideRulesReason
     */
    protected $OverrideRulesReason;

    /**
     * @var string $OverrideOptionReason
     */
    protected $OverrideOptionReason;

    public function __construct(BookingRequest $bookingRequest) {
        $this->BookingInfo = $bookingRequest;
    }
}