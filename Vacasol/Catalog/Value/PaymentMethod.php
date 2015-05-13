<?php

namespace Vacasol\Catalog\Value;

use Vacasol\Catalog\Enum\ProviderType;
use Vacasol\Catalog\Value;

class PaymentMethod extends Value {

    /**
     * @var string
     */
    protected $Name;

    /**
     * @var string
     */
    protected $LogoId;

    /**
     * @var float
     */
    protected $FeeAmount;

    /**
     * @var string
     */
    protected $PaymentMethodId;

    /**
     * @var string
     */
    protected $NameContentId;

    /**
     * @var TranslateEntry
     */
    protected $NameLanguageContents;

    /**
     * @var ProviderType
     */
    protected $PaymentProvider;

    /**
     * @param ProviderType $providerType
     *
     * @return $this
     */
    public function setProvider(ProviderType $providerType) {
        $this->PaymentProvider = (string)$providerType;
        return $this;
    }

    /**
     * @return ProviderType
     */
    public function getProvider() {
        return new ProviderType($this->PaymentProvider);
    }
}