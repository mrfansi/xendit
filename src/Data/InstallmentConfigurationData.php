<?php

namespace App\Libraries\Payment\Data;

use Spatie\LaravelData\Data;

class InstallmentConfigurationData extends Data
{
    public function __construct(
        public bool $allow_full_payment,
        /** @var AllowedTerm[] */
        public array $allowed_terms
    ) {
    }
}
