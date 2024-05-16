<?php

namespace App\Libraries\Payment\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AddressData extends Data
{
    public function __construct(
        public string|Optional $country,
        public string|Optional $state,
        public string|Optional $city,
        public string|Optional $street,
    ) {
    }
}
