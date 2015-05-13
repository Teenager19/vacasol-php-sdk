<?php

namespace Vacasol\Catalog\Exception\Client;

class EmptyResponse extends \Exception {
    function __construct() {
        parent::__construct('Vacasol API returned an empty response object');
    }
}