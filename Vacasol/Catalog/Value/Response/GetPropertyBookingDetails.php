<?php

namespace Vacasol\Catalog\Value\Response;

use Vacasol\Catalog\Value;
use Vacasol\Catalog\Value\Response;

class GetPropertyBookingDetails extends Response {
    /**
     * @var Value\PropertyBookingInfo
     */
    protected $DetailPropertyBookingInfo;

    /**
     * @var int
     */
    protected $ContractPartnerId;

    /**
     * @var string
     */
    protected $PropertyLocation;
}