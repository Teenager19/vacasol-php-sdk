<?php

namespace Vacasol\Catalog\Value;
use Vacasol\Catalog\Enum\DiscountBy;

class MandatoryItem extends BookingItem {
    /**
     * @var string
     */
    protected $ExtraInfo;

    /**
     * @var string
     */
    protected $ArrivalDate;

    /**
     * @var string
     */
    protected $DiscountBy;

    /**
     * @var bool
     */
    protected $BPDiscountEditable;

    /**
     * @param DiscountBy $discountBy
     *
     * @return $this
     */
    public function setDiscountBy(DiscountBy $discountBy) {
        $this->DiscountBy = (string)$discountBy;
        return $this;
    }

    /**
     * @return DiscountBy
     */
    public function getDiscountBy() {
        return new DiscountBy($this->DiscountBy);
    }
}