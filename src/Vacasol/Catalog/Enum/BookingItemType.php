<?php

namespace Vacasol\Catalog\Enum;

use Vacasol\Catalog\Enum;

class BookingItemType extends Enum {
    const EXTRA_SERVICE = 'ExtraService';
    const INSURANCE = 'Insurance';
    const SERVICE = 'Service';
    const RENTAL = 'Rental';
    const DEPOSIT = 'Deposit';
    const CONSUMPTION = 'Consumption';
    const ADDITIONAL_ITEM = 'AdditionalItem';
    const DISCOUNT = 'Discount';
    const GENERAL = 'General';
}