<?php

namespace Vacasol\Catalog\Value;
use Vacasol\Catalog\Value;

abstract class Response extends Value {

    /**
     * @var object
     */
    protected $Errors;

    /**
     * @return Error[]|null
     */
    public function getErrors() {
        return isset($this->Errors->ErrorType) ? $this->Errors->ErrorType : null;
    }
}