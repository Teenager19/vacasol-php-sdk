<?php

namespace test\Vacasol\Catalog\Value;

use Vacasol\Catalog\Enum\ProductType;
use Vacasol\Catalog\Value\BookingItem;
use Vacasol\Catalog\Value\Price;

class BookingItemTest extends \PHPUnit_Framework_TestCase {

    public function testDiscountPrice() {
        $discountAmount = 100;
        $currency = 'EUR';

        $bookingItem = new BookingItem;
        $bookingItem->setProductType(new ProductType('Discount'));
        $bookingItem->setPrice(new Price($discountAmount, $currency));

        $this->assertEquals(-$discountAmount, $bookingItem->getPrice()->getPrice());
    }
}