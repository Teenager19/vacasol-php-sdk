<?php

use \Vacasol\Catalog\Value\PropertyBookingInfo;

class BookingTest extends PHPUnit_Framework_TestCase {
    public function testBooking() {
        $propertyId = '9104083a623d4af4890af3e7fb4c2b97';
        $arrivalDate = '2015-07-12';
        $departureDate = '2015-07-19';
        $adults = 1;
        $children = 0;
        $language = 'fi';
        $salesMarketId = '00BE5DE5-275D-4103-85FD-FDBD58872F4D';

        $getBookingDataRequest = new \Vacasol\Catalog\Value\Request\GetPropertyBookingDetails(
            $propertyId, $arrivalDate, $departureDate, $adults, $children, $language, $salesMarketId
        );

        $client = new \Vacasol\Catalog('sunny', 'sxZ885wc', 'http://152.115.62.19/Services/CatalogService');
        /** @var PropertyBookingInfo $detailsResponse */
        $detailsResponse = $client->getPropertyBookingDetail($getBookingDataRequest)->getDetailPropertyBookingInfo();

        $bookingItem = [];
        foreach ($detailsResponse->getMandatoryItems() as $mandatoryItem) {
            $bookingItem[] = $mandatoryItem->toBookingRequestItem();
        }

        if (!is_null($deposit = $detailsResponse->getDeposit()) || $detailsResponse->getIsPaidOnTheBooking()) {
            $depositMandatoryItem = new \Vacasol\Catalog\Value\MandatoryItem;
            $depositMandatoryItem->setPrice($deposit->getPrice())
                ->setName($deposit->getName())
                ->setUnitType($deposit->getUnitType())
                ->setProductType(\Vacasol\Catalog\Enum\ProductType::DEPOSIT());

            $bookingItem[] = $depositMandatoryItem->toBookingRequestItem();
        }

        /*$highChair = $detailsResponse->getOptionalServices()[2]->toBookingRequestItem();
        $highChair->setNumOfUnit(4);
        $bookingItem[] = $highChair;

        $finalCleaning = $detailsResponse->getOptionalServices()[3]->toBookingRequestItem();
        $finalCleaning->setNumOfUnit(3);
        $bookingItem[] = $finalCleaning;*/

        $creditCard = new \Vacasol\Catalog\Value\CreditCard(
            'VISA', '4711100000000000', '06', '24', '684'
        );
        $customer = new \Vacasol\Catalog\Value\Customer(
            'Ondrej', 'Test', 'Malmo', '12345', 'Malmo', '123456789', 'ondrej.kousal@hotmail.com'
        );
        $bookingRequest = new \Vacasol\Catalog\Value\BookingRequest(
            $salesMarketId, $bookingItem, $customer, $propertyId, $arrivalDate,
            $departureDate, $adults, $children, $creditCard, $detailsResponse->getContactPerson()
        );
        $createBookingRequest = new \Vacasol\Catalog\Value\Request\CreateBooking($bookingRequest, $language);
        $createBookingRequest->setLanguageCode($language);

        $finalRes = $client->createBooking($createBookingRequest);

        $myRes = $finalRes;
    }
}