<?php

namespace test\Vacasol\Catalog\Value;

use Vacasol\Catalog\Enum\ProductType;
use Vacasol\Catalog\Value\MandatoryItem;
use Vacasol\Catalog\Value\Price;
use Vacasol\Catalog\Value\PropertyBookingInfo;

class PropertyBookingInfoTest extends \PHPUnit_Framework_TestCase {

    /**
     * @param string $discountCode
     *
     * @dataProvider couponCodeProvider
     */
    public function testGettingCouponItem($discountCode) {
        $couponItem = new MandatoryItem;
        $couponItem->setProductType(ProductType::DISCOUNT())
            ->setName($discountCode);

        $propertyBookingInfo = new PropertyBookingInfo;
        $propertyBookingInfo->setMandatoryItems([$couponItem]);

        $this->assertEquals($couponItem, $propertyBookingInfo->getCouponItem($discountCode));
    }

    /**
     * @param string $couponCode
     *
     * @dataProvider couponCodeProvider
     */
    public function testGettingCouponItemIfCouponNotPresent($couponCode) {
        $propertyBookingItem = new PropertyBookingInfo;
        $this->assertNull($propertyBookingItem->getCouponItem($couponCode));
    }

    public function couponCodeProvider() {
        return [
            ['ABC123'],
            ['SALE20'],
            ['DISC23']
        ];
    }

    /**
     * @param int $firstItemDiscount
     * @param int $secondItemDiscount
     *
     * @dataProvider discountProvider
     */
    public function testGettingDiscountPrice($firstItemDiscount, $secondItemDiscount) {
        $currency = 'EUR';
        $productPrice = 100;

        $mandatoryItems = [
            $this->_createMandatoryItemObject($productPrice, $currency, $firstItemDiscount),
            $this->_createMandatoryItemObject($productPrice, $currency, $secondItemDiscount)
        ];

        $propertyBookingInfo = new PropertyBookingInfo;
        $propertyBookingInfo->setMandatoryItems($mandatoryItems);

        $this->assertEquals(
            $firstItemDiscount + $secondItemDiscount,
            $propertyBookingInfo->getDiscountBookingPrice()
        );
    }

    /**
     * @param int    $priceAmount
     * @param string $currency
     * @param int    $discountPriceAmount
     *
     * @return MandatoryItem
     */
    protected function _createMandatoryItemObject($priceAmount, $currency, $discountPriceAmount) {
        $price = new Price($priceAmount, $currency);
        $price->setDiscount($discountPriceAmount);

        $mandatoryItem = new MandatoryItem;
        $mandatoryItem->setPrice($price);

        return $mandatoryItem;
    }

    public function discountProvider() {
        return [
            [30, 20],
            [40, 15],
            [60, 20]
        ];
    }
}