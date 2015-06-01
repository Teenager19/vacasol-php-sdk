<?php

namespace Vacasol\Catalog\Value\Response;

use Vacasol\Catalog\Value\Response;
use Vacasol\Catalog\Value\BookingRequest;

class CreateBooking extends Response {
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
    protected $OverrideOption;

    /**
     * @var boolean $OverrideRules
     */
    protected $OverrideRules;

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
}