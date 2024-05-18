<?php

namespace Mrfansi\Xendit\Enums\Error;

enum CreateInvoiceResponseError: string
{
    case API_VALIDATION_ERROR = 'API_VALIDATION_ERROR';
    case INVALID_JSON_FORMAT = 'INVALID_JSON_FORMAT';
    case NO_COLLECTION_METHODS_ERROR = 'NO_COLLECTION_METHODS_ERROR';
    case UNAVAILABLE_PAYMENT_METHOD_ERROR = 'UNAVAILABLE_PAYMENT_METHOD_ERROR';
    case REQUEST_FORBIDDEN_ERROR = 'REQUEST_FORBIDDEN_ERROR';
    case UNIQUE_ACCOUNT_NUMBER_UNAVAILABLE_ERROR = 'UNIQUE_ACCOUNT_NUMBER_UNAVAILABLE_ERROR';
    case CALLBACK_VIRTUAL_ACCOUNT_NOT_FOUND_ERROR = 'CALLBACK_VIRTUAL_ACCOUNT_NOT_FOUND_ERROR';
    case AVAILABLE_PAYMENT_CODE_NOT_FOUND_ERROR = 'AVAILABLE_PAYMENT_CODE_NOT_FOUND_ERROR';
    case INVALID_REMINDER_TIME = 'INVALID_REMINDER_TIME';
    case INSTALLMENT_CONFIGURATION_NOT_AVAILABLE = 'INSTALLMENT_CONFIGURATION_NOT_AVAILABLE';
    case INSTALLMENT_NOT_ENABLED = 'INSTALLMENT_NOT_ENABLED';
    case AMOUNT_BELOW_MINIMUM_LIMIT = 'AMOUNT_BELOW_MINIMUM_LIMIT';

    public function status(): int
    {
        return match ($this) {
            self::API_VALIDATION_ERROR, self::NO_COLLECTION_METHODS_ERROR, self::INVALID_JSON_FORMAT, self::UNAVAILABLE_PAYMENT_METHOD_ERROR, self::INVALID_REMINDER_TIME, self::INSTALLMENT_CONFIGURATION_NOT_AVAILABLE, self::INSTALLMENT_NOT_ENABLED, self::AMOUNT_BELOW_MINIMUM_LIMIT => 400,
            self::REQUEST_FORBIDDEN_ERROR => 403,
            self::UNIQUE_ACCOUNT_NUMBER_UNAVAILABLE_ERROR, self::CALLBACK_VIRTUAL_ACCOUNT_NOT_FOUND_ERROR, self::AVAILABLE_PAYMENT_CODE_NOT_FOUND_ERROR => 404,

        };
    }

    public function description(): string
    {
        return match ($this) {
            self::API_VALIDATION_ERROR => 'Inputs are failing validation. The errors field contains details about which fields are violating validation.',
            self::INVALID_JSON_FORMAT => 'The request body is not a valid JSON format.',
            self::NO_COLLECTION_METHODS_ERROR => 'Your account has no payment methods configured (virtual account, credit card). Please contact support and we will set this up for you.',
            self::UNAVAILABLE_PAYMENT_METHOD_ERROR => 'The payment method choices did not match with the available one on this business.',
            self::REQUEST_FORBIDDEN_ERROR => 'API key in use does not have necessary permissions to perform the request. Please assign proper permissions for the key. Learn more https://docs.xendit.co/api-integration',
            self::UNIQUE_ACCOUNT_NUMBER_UNAVAILABLE_ERROR => 'There is no available virtual account in your non-fixed virtual account range.',
            self::CALLBACK_VIRTUAL_ACCOUNT_NOT_FOUND_ERROR => "Fixed virtual account id that you've specified not found",
            self::AVAILABLE_PAYMENT_CODE_NOT_FOUND_ERROR => 'There is no available payment code in your retail outlet range.',
            self::INVALID_REMINDER_TIME => 'The reminder_time value is not allowed.',
            self::INSTALLMENT_CONFIGURATION_NOT_AVAILABLE => 'The installment bank_code (ABC) configuration is not available for your business. Please contact our CS to enable it',
            self::INSTALLMENT_NOT_ENABLED => 'The installment option is not available for your business. Please contact our CS to enable it',
            self::AMOUNT_BELOW_MINIMUM_LIMIT => 'Requested amount 51000 is lower than installment minimum limit',
        };
    }
}
