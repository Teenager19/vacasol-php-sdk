<?php

namespace Vacasol\Catalog;

use Vacasol\Catalog\Exception\Value\WrongProperty;

abstract class Value {

    public function __call($methodName, $arguments) {
        if ($this->_startsWith($methodName, 'get')) {
            $fieldName = $this->_getFieldName($methodName);
            return $this->$fieldName;
        }

        if ($this->_startsWith($methodName, 'set')) {
            $fieldName = $this->_getFieldName($methodName);
            $this->$fieldName = $arguments[0];
            return $this;
        }
    }

    /**
     * @param string $methodName
     *
     * @return string
     * @throws WrongProperty
     */
    protected function _getFieldName($methodName) {
        $fieldName = substr($methodName, 3);
        if (!property_exists($this, $fieldName)) {
            throw new WrongProperty($fieldName);
        }
        return $fieldName;
    }

    /**
     * @param string $string
     * @param string $token
     *
     * @return bool
     */
    protected function _startsWith($string, $token) {
        $string = trim($string);
        $token = trim($token);
        return substr($string, 0, strlen($token)) === $token;
    }
}