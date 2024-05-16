<?php

namespace App\Libraries\Payment\Data;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CreateInvoiceData extends Data
{
    public function __construct(
        public string $external_id,
        public int $amount,
        public string|Optional $description,
        public CustomerData|Optional $customer,
        public CustomerNotificationPreferenceData|Optional $customer_notification_preference,
        #[Max(31536000), Min(1)]
        public int|Optional $invoice_duration,
        #[Max(255), Min(1)]
        public string|Optional $success_redirect_url,
        #[Max(255), Min(1)]
        public string|Optional $failure_redirect_url,
        public array|Optional $payment_methods,
        public string $currency,
        public string|Optional $callback_virtual_account_id,
        public string|Optional $mid_label,
        public string|Optional $reminder_time_unit,
        #[Min(1)]
        public int|Optional $reminder_time,
        public string|Optional $locale,
        /** @var ItemData[] */
        public array $items,
        /** @var FeeData[] */
        public array $fees,
        public bool|Optional $should_authenticate_credit_card,
        public ChannelPropertyData|Optional $channel_properties
    ) {
    }
}
