<?php

namespace Vacasol\Catalog\Exception\Value;

class WrongProperty extends \Exception {
    function __construct($propertyName) {
        parent::__construct('Property ' . $propertyName . 'does not exists');
    }
}