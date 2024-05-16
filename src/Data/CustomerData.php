<?php

namespace App\Libraries\Payment\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomerData extends Data
{
    public function __construct(
        public string|Optional $given_names,
        public string|Optional $surname,
        public string|Optional $email,
        public string|Optional $mobile_number,

        /** @var AddressData[] */
        public array|Optional $address,
    ) {
    }
}
