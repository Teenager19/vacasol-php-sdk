<?php

namespace Vacasol\Catalog\Enum;
use Vacasol\Catalog\Enum;

class UnitType extends Enum {
    const PER_WEEK = 'PER_WEEK';
    const PER_DAY = 'PER_DAY';
    const PER_BOOKING = 'PER_BOOKING';
    const PER_SQUARE_METER = 'PER_SQUARE_METER';
    const PER_PERSON = 'PER_PERSON';
    const PER_PERSON_PER_DAY = 'PER_PERSON_PER_DAY';
    const PER_PERSON_PER_WEEK = 'PER_PERSON_PER_WEEK';
    const CUSTOM_UNIT = 'CUSTOM_UNIT';
}