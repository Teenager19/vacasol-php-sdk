<?php

namespace Vacasol\Catalog\Exception\Enum;

class InvalidKey extends \Exception {
    function __construct($enumKey) {
        parent::__construct('Key ' . $enumKey . ' is not defined as an option in this enum');
    }
}