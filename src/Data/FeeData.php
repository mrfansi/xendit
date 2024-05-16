<?php

namespace App\Libraries\Payment\Data;

use Spatie\LaravelData\Data;

class FeeData extends Data
{
    public function __construct(
        public string $type,
        public int $value,
    ) {
    }
}
