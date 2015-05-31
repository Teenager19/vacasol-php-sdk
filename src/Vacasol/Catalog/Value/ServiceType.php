<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Value;
use Vacasol\Catalog\Enum\ProductType;

class ServiceType extends BookingItem {
    /**
     * @return bool
     */
    public function isInsurance() {
        return $this->getProductType() == ProductType::INSURANCE();
    }
}