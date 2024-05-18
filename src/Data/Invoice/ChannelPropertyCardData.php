<?php

namespace Mrfansi\Xendit\Data\Invoice;

use Illuminate\Support\Optional;
use Mrfansi\Xendit\Enums\AvailableNotificationChannel;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Normalizers\ArrayableNormalizer;
use Spatie\LaravelData\Normalizers\ArrayNormalizer;
use Spatie\LaravelData\Normalizers\JsonNormalizer;
use Spatie\LaravelData\Normalizers\ModelNormalizer;
use Spatie\LaravelData\Normalizers\ObjectNormalizer;

class ChannelPropertyCardData extends Data
{
    public function __construct(
        public array|Optional $allowed_bins,
        #[DataCollectionOf(AvailableNotificationChannel::class)]
        public array|Optional $installment_configuration,
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
