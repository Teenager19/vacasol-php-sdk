<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Value;

class CreditCard extends Value {
    /**
     * @var string $CardHolder
     */
    protected $CardHolder;

    /**
     * @var string $CardNumber
     */
    protected $CardNumber;

    /**
     * @var string $CardType
     */
    protected $CardType;

    /**
     * @var int $ExpirationMonth
     */
    protected $ExpirationMonth;

    /**
     * @var int $ExpirationYear
     */
    protected $ExpirationYear;

    /**
     * @var string $CardSecurityCode
     */
    protected $CardSecurityCode;

    /**
     * @var string $BankName
     */
    protected $BankName;

    /**
     * @var string $eOLVAccount
     */
    protected $eOLVAccount;

    /**
     * @var string $eOLVRegistrationNumber
     */
    protected $eOLVRegistrationNumber;

    public function __construct($cardType, $cardNumber, $expirationMonth, $expirationYear, $securityCode) {
        $this->CardType = $cardType;
        $this->CardNumber = $cardNumber;
        $this->ExpirationMonth = $expirationMonth;
        $this->ExpirationYear = $expirationYear;
        $this->CardSecurityCode = $securityCode;
    }
}