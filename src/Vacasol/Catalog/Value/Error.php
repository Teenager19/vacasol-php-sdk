<?php

namespace Vacasol\Catalog\Value;
use Vacasol\Catalog\Value;

class Error extends Value {
    /**
     * @var int
     */
    protected $ErrorCode;

    /**
     * @var string
     */
    protected $Description;
}