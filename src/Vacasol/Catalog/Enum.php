<?php

namespace Vacasol\Catalog;

use Vacasol\Catalog\Exception\Enum\InvalidKey;
use Vacasol\Catalog\Exception\Enum\InvalidValue;

abstract class Enum {

    /**
     * @var mixed
     */
    protected $value;

    public function __construct($value, $validate = true) {
        if ($validate && !$this->isValid($value)) {
            throw new InvalidValue($value);
        }
        $this->value = $value;
    }

    public static function __callStatic($name, $arguments) {
        $reflectionClass = new \ReflectionClass(get_called_class());
        if (!$reflectionClass->hasConstant($name)) {
            throw new InvalidKey($name);
        }
        return new static($reflectionClass->getConstant($name), false);
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value) {
        $reflectionClass = new \ReflectionClass($this);
        return in_array($value, array_values($reflectionClass->getConstants()));
    }

    /**
     * @return mixed
     */
    final public function get() {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->get();
    }
}