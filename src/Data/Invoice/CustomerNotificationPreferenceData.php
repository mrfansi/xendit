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

class CustomerNotificationPreferenceData extends Data
{
    public function __construct(
        #[DataCollectionOf(AvailableNotificationChannel::class)]
        public array|Optional $invoice_created,

        #[DataCollectionOf(AvailableNotificationChannel::class)]
        public array|Optional $invoice_reminder,

        #[DataCollectionOf(AvailableNotificationChannel::class)]
        public array|Optional $invoice_paid,
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
