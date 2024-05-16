<?php

namespace App\Libraries\Payment\Data;

use Illuminate\Support\Optional;
use Spatie\LaravelData\Data;

class AllowedTerm extends Data
{
    public function __construct(
        public string $issuer,
        /** @var array<int> */
        public array|Optional $terms,
    ) {
    }
}
