<?php

namespace Vacasol\Catalog;

use Vacasol\Catalog\Exception\Enum\InvalidValue;

abstract class Enum {

    /**
     * @var mixed
     */
    protected $value;

    public function __construct($value) {
        if (!$this->isValid($value)) {
            throw new InvalidValue($value);
        }
        $this->value = $value;
    }

    public static function __callStatic($name, $arguments) {
        return new static($name);
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value) {
        return defined('static::' . $value);
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