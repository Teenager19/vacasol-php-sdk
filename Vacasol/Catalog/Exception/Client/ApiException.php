<?php

namespace Vacasol\Catalog\Exception\Client;

use Vacasol\Catalog\Value\Error;

class ApiException extends \Exception {
    /**
     * @param Error[] $errors
     */
    function __construct(array $errors) {
        $message = '';
        foreach ($errors as $error) {
            $message .= $error->getDescription();
        }
        parent::__construct('API returned an following errors: ' . $message);
    }
}