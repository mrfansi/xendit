<?php

namespace Mrfansi\Xendit\Data\Invoice;

use Illuminate\Support\Optional;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Normalizers\ArrayableNormalizer;
use Spatie\LaravelData\Normalizers\ArrayNormalizer;
use Spatie\LaravelData\Normalizers\JsonNormalizer;
use Spatie\LaravelData\Normalizers\ModelNormalizer;
use Spatie\LaravelData\Normalizers\ObjectNormalizer;

/**
 * @property array<string> $invoice_created
 * @property array<string> $invoice_reminder
 * @property array<string> $invoice_paid
 */
class CustomerNotificationPreferenceData extends Data
{
    public function __construct(
        public array|Optional $invoice_created,
        public array|Optional $invoice_reminder,
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
