<?php

namespace test\Vacasol\Catalog\Value;

use Vacasol\Catalog\Value\MandatoryItem;
use Vacasol\Catalog\Value\Price;
use Vacasol\Catalog\Value\PropertyBookingInfo;

class PropertyBookingInfoTest extends \PHPUnit_Framework_TestCase {

    /**
     * @param int $priceAmount
     * @param int $discount
     * @param int $campaignDiscount
     * @param int $expectedPrice
     *
     * @dataProvider discountProvider
     */
    public function testGettingDiscountPrice($priceAmount, $discount, $campaignDiscount, $expectedPrice) {
        $currency = 'EUR';

        $price = new Price($priceAmount, $currency);
        $price->setDiscount($discount);
        $price->setCampaignDiscount($campaignDiscount);
        $mandatoryItem = new MandatoryItem;
        $mandatoryItem->setPrice($price);

        $propertyBookingInfo = new PropertyBookingInfo;
        $propertyBookingInfo->setMandatoryItems([$mandatoryItem]);
        $this->assertEquals($expectedPrice, $propertyBookingInfo->getDiscountBookingPrice());
    }

    public function discountProvider() {
        return [
            [1000, 20, 15, 350],
            [299, 15, 0, 44.85],
            [159, 20, 10, 47.7]
        ];
    }
}