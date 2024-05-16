<?php

namespace App\Libraries\Payment\Data;

use Illuminate\Support\Optional;
use Spatie\LaravelData\Data;

class ChannelPropertyData extends Data
{
    public function __construct(
        public array|Optional $allowed_bins,
        /** @var InstallmentConfigurationData[] */
        public array|Optional $installment_configuration,
    ) {
    }
}
