<?php

namespace Vacasol\Catalog\Exception\Enum;

class InvalidValue extends \Exception {
    function __construct($enumValue) {
        parent::__construct('Value ' . $enumValue . ' is not valid for this enumeration object');
    }
}