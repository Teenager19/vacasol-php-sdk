<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Value;

class Customer extends Value {
    
    /**
     * @var string $FirstName
     */
    protected $FirstName;

    /**
     * @var string $LastName
     */
    protected $LastName;

    /**
     * @var string $Address
     */
    protected $Address;

    /**
     * @var string $ZipCode
     */
    protected $ZipCode;

    /**
     * @var string $City
     */
    protected $City;

    /**
     * @var string $Phone
     */
    protected $Phone;

    /**
     * @var string $CellPhone
     */
    protected $CellPhone;

    /**
     * @var string $Email
     */
    protected $Email;

    /**
     * @var string $CountryCode
     */
    protected $CountryCode;

    /**
     * @var string $Username
     */
    protected $Username = '';

    public function __construct($firstName, $lastName, $address, $zipCode, $city, $countryCode, $phone, $email) {
        $this->FirstName = $firstName;
        $this->LastName = $lastName;
        $this->Address = $address;
        $this->ZipCode = $zipCode;
        $this->City = $city;
        $this->CountryCode = $countryCode;
        $this->Phone = $phone;
        $this->Email = $email;
    }
}