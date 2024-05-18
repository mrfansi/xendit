<?php

namespace Mrfansi\Xendit\Data\Response;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class ErrorData extends Data
{
    public function __construct(
        #[MapInputName('error_code')]
        public string $code,
        public string $message
    ) {
    }
}
