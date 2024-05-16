<?php

namespace App\Libraries\Payment\Data;

use Illuminate\Support\Optional;
use Spatie\LaravelData\Data;

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
}
