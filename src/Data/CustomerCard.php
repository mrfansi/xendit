<?php

namespace Mrfansi\Xendit\Data;

use Spatie\LaravelData\Data;

class CustomerCard extends Data
{

    public function __construct(
        public string $account_number,
        public string $exp_month,
        public string $exp_year,
    )
    {
    }

}
