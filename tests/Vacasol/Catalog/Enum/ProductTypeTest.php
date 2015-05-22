<?php

namespace test\Vacasol\Catalog\Enum;

use Vacasol\Catalog\Enum\ProductType;

class ProductTypeTest extends \PHPUnit_Framework_TestCase {

    /**
     * @param string $productType
     * @param string $expectedBookingItemType
     *
     * @dataProvider productTypesProvider
     */
    public function testConversionToBookingItemType($productType, $expectedBookingItemType) {
        $productType = new ProductType($productType);
        $this->assertEquals($expectedBookingItemType, $productType->toBookingItemType());
    }

    public function productTypesProvider() {
        return [
            ['Rental', 'Rental'],
            ['Other', 'General'],
            ['SPService', 'Service'],
            ['BPExtraService', 'ExtraService']
        ];
    }
}