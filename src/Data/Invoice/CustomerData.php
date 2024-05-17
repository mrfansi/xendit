<?php

namespace Mrfansi\Xendit\Data\Invoice;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Normalizers\ArrayableNormalizer;
use Spatie\LaravelData\Normalizers\ArrayNormalizer;
use Spatie\LaravelData\Normalizers\JsonNormalizer;
use Spatie\LaravelData\Normalizers\ModelNormalizer;
use Spatie\LaravelData\Normalizers\ObjectNormalizer;
use Spatie\LaravelData\Optional;

class CustomerData extends Data
{
    public function __construct(
        public string|Optional $given_names,
        public string|Optional $surname,
        public string|Optional $email,
        public string|Optional $mobile_number,

        /** @var AddressData[] */
        public array|Optional $addresses,
    ) {
    }

    public static function normalizers(): array
    {
        return [
            ModelNormalizer::class,
            ArrayableNormalizer::class,
            ObjectNormalizer::class,
            ArrayNormalizer::class,
            JsonNormalizer::class,
        ];
    }
}
