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

    /**
     * Converts product type to booking type
     *
     * @return BookingItemType
     */
    public function toBookingItemType() {
        /** @var array $incompatibleTypesMap Defines map for  */
        $incompatibleTypesMap = [
            self::SP_SERVICE => BookingItemType::SERVICE,
            self::BP_EXTRA_SERVICE => BookingItemType::EXTRA_SERVICE,
            self::OTHER => BookingItemType::GENERAL
        ];

        $value = $this->get();
        return new BookingItemType(
            !array_key_exists($value, $incompatibleTypesMap) ? $value : $incompatibleTypesMap[$value]
        );
    }
}