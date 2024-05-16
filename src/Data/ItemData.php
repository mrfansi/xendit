<?php

namespace App\Libraries\Payment\Data;

use Illuminate\Support\Optional;
use Spatie\LaravelData\Data;

class ItemData extends Data
{
    public function __construct(
        public string $name,
        public int $quantity,
        public int $price,
        public string|Optional $category,
        public string|Optional $url,
    ) {
    }
}
