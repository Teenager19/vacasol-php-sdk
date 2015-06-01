<?php

namespace Vacasol;

use Vacasol\Catalog\Exception\Client\EmptyResponse;
use Vacasol\Catalog\Exception\Client\ApiException;
use Vacasol\Catalog\Value\Request;
use Vacasol\Catalog\Value\Response;

class Catalog {

    /**
     * @var string
     */
    protected $_wsdl;

    /**
     * @var string
     */
    protected $_apiLogin;

    /**
     * @var string
     */
    protected $_apiPassword;

    /**
     * @var \SoapClient
     */
    protected $_soapClient;

    /**
     * @var array
     */
    protected $_classMap = [
        // Responses
        'GetPropertyBookingDetailsResponseMessage' => '\Vacasol\Catalog\Value\Response\GetPropertyBookingDetails',
        'GetPropertyPriceResponseMessage' => '\Vacasol\Catalog\Value\Response\GetPropertyPrice',
        'CreateBookingResponseMessage' => '\Vacasol\Catalog\Value\Response\CreateBooking',
        // Booking items
        'ServiceType' => '\Vacasol\Catalog\Value\ServiceType',
        'MandatoryItem' => '\Vacasol\Catalog\Value\MandatoryItem',
        'ConsumptionType' => '\Vacasol\Catalog\Value\Consumption',
        'BookingSpotItem' => '\Vacasol\Catalog\Value\PayOnSpotBookingItem',
        // Values
        'PriceType' => '\Vacasol\Catalog\Value\Price',
        'ErrorType' => '\Vacasol\Catalog\Value\Error',
        'PeriodType' => '\Vacasol\Catalog\Value\Period',
        'CreditCardInfo' => '\Vacasol\Catalog\Value\CreditCard',
        'CustomerBasicInfo' => '\Vacasol\Catalog\Value\Customer',
        'InstallmentInfo' => '\Vacasol\Catalog\Value\Installment',
        'LanguageContent' => '\Vacasol\Catalog\Value\TranslateEntry',
        'PropertyDeposit' => '\Vacasol\Catalog\Value\PropertyDeposit',
        'ContactPersonType' => '\Vacasol\Catalog\Value\ContactPerson',
        'PaymentMethodType' => '\Vacasol\Catalog\Value\PaymentMethod',
        'BookingRequestInfo' => '\Vacasol\Catalog\Value\BookingRequest',
        'ConsumptionMeterNumbers' => '\Vacasol\Catalog\Value\ConsumptionMeterNumbers',
        // Data wrappers
        'PropertyBookingDetailType' => '\Vacasol\Catalog\Value\PropertyBookingInfo',
        'BookingRequestItem' => '\Vacasol\Catalog\Value\BookingRequestItem',
    ];

    public function __construct($apiLogin, $apiPassword, $wsdl = 'http://xml.vacasol.dk/Services/CatalogService') {
        $this->_apiLogin = $apiLogin;
        $this->_apiPassword = $apiPassword;
        $this->_wsdl = $wsdl;
    }

    /**
     * @param object
     */
    public function setClient($soapClient) {
        $this->_soapClient = $soapClient;
    }

    /**
     * @return object
     */
    protected function _getClient() {
        if (empty($this->_soapClient)) {
            $this->_soapClient = $this->_getDefaultClient();
        }

        return $this->_soapClient;
    }

    /**
     * @return \SoapClient
     */
    protected function _getDefaultClient() {
        return new \SoapClient(
            $this->_wsdl,
            [
                'soap_version' => SOAP_1_1,
                'login' => $this->_apiLogin,
                'password' => $this->_apiPassword,
                'classmap' => $this->_classMap,
                'features' => SOAP_SINGLE_ELEMENT_ARRAYS
            ]
        );
    }

    /**
     * @param string  $methodName
     * @param Request $request
     *
     * @return Response
     * @throws ApiException
     * @throws EmptyResponse
     */
    protected function _makeRequest($methodName, Request $request) {
        $soapClient = $this->_getClient();

        /** @var object $response */
        $response = $soapClient->{$methodName}(['request' => $request]);
        if (is_null($response)) {
            throw new EmptyResponse;
        }

        /** @var Response $responseObject */
        $responseObject = $response->{$methodName . 'Result'};
        if (!is_null($errors = $responseObject->getErrors())) {
            throw new ApiException($errors);
        }

        return $responseObject;
    }

    /**
     * @param Request\GetPropertyBookingDetails $request
     *
     * @return Response\GetPropertyBookingDetails
     */
    public function getPropertyBookingDetail(Request\GetPropertyBookingDetails $request) {
        return $this->_makeRequest('GetPropertyBookingDetail', $request);
    }

    /**
     * @param Request\GetPropertyPrice $request
     *
     * @return Response\GetPropertyPrice
     */
    public function getPropertyPrice(Request\GetPropertyPrice $request) {
        return $this->_makeRequest('GetPropertyPrice', $request);
    }

    /**
     * @param Request\CreateBooking $request
     *
     * @return Response\CreateBooking
     */
    public function createBooking(Request\CreateBooking $request){
        return $this->_makeRequest('CreateBooking', $request);
    }
}