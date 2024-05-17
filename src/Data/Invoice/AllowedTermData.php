<?php

namespace Mrfansi\Xendit\Data\Invoice;

use Illuminate\Support\Optional;
use Spatie\LaravelData\Data;

class AllowedTermData extends Data
{
    public function __construct(
        public string $issuer,
        /** @var array<int> */
        public array|Optional $terms,
    ) {
    }
}
