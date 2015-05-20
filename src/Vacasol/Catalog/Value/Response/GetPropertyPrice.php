<?php

namespace Vacasol\Catalog\Value\Response;

use Vacasol\Catalog\Value;
use Vacasol\Catalog\Value\Response;

class GetPropertyPrice extends Response {
    /**
     * @var object
     */
    protected $Installments;

    /**
     * @var Value\Price
     */
    protected $TotalPrice;

    /**
     * @var Value\Error[]
     */
    protected $Errors;

    /**
     * @return Value\Installment[]|null
     */
    public function getInstallments() {
        return !is_null($this->Installments) ? $this->Installments->InstallmentInfo : null;
    }
}