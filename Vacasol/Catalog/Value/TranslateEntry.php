<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Value;

class TranslateEntry extends Value {
    /**
     * @var string
     */
    public $LanguageId;

    /**
     * @var string
     */
    public $ContentId;

    /**
     * @var string
     */
    public $Text;
}