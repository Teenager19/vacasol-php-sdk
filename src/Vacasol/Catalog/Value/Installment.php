<?php

namespace Vacasol\Catalog\Value;
use Vacasol\Catalog\Value;

class Installment extends Value {
    /**
     * @var string
     */
    protected $Name;

    /**
     * @var string
     */
    protected $DueDate;

    /**
     * @var string
     */
    protected $AnnulmentDate;

    /**
     * @var float
     */
    protected $VATAmount;

    /**
     * @var float
     */
    protected $Price;

    /**
     * @var float
     */
    protected $PriceBeforeRounded;

    /**
     * @var float
     */
    protected $VATAmountBeforeRounded;

    /**
     * @var string
     */
    protected $CurrencyCode;

    /**
     * @var string
     */
    protected $InstallmentID;
}