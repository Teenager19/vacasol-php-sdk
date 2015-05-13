<?php

namespace Vacasol\Catalog\Enum;
use Vacasol\Catalog\Enum;

class ProductType extends Enum {
    const RENTAL = 'Rental';
    const DEPOSIT = 'Deposit';
    const SP_SERVICE = 'SPService';
    const CONSUMPTION = 'Consumption';
    const BP_EXTRA_SERVICE = 'BPExtraService';
    const INSURANCE = 'Insurance';
    const OTHER = 'Other';
    const DISCOUNT = 'Discount';
}