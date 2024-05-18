<?php

use Mrfansi\Xendit\Exceptions\ResponseException;

uses()->group('feature');

arch('xendit invoice must have create method', function () {
    expect('Mrfansi\Xendit\XenditInvoice')
        ->toHaveMethod('create');
});

arch('xendit invoice must have constructor', function () {
    expect('Mrfansi\Xendit\XenditInvoice')
        ->toHaveConstructor();
});

it('can create new invoice with required params', function () {
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description(),
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
});

it('can create new invoice with customer data', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description(),
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
});

it('can create new invoice with invoice duration', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description(),
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
});

it('can create new invoice with success redirect url and failure redirect url', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description(),
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
                'success_redirect_url' => $customer->success_redirect_url(),
                'failure_redirect_url' => $customer->failure_redirect_url(),
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
});

it('can create new invoice with payment methods CC', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description().' by CC',
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
                'success_redirect_url' => $customer->success_redirect_url(),
                'failure_redirect_url' => $customer->failure_redirect_url(),
                'payment_methods' => [
                    // CREDIT CARD
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::CREDIT_CARD, // global
                ],
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
});

it('can create new invoice with payment methods BANK', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description().' by BANK ACCOUNT',
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
                'success_redirect_url' => $customer->success_redirect_url(),
                'failure_redirect_url' => $customer->failure_redirect_url(),
                'payment_methods' => [
                    // CREDIT CARD
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::CREDIT_CARD, // global

                    // BANK TRANSFER
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BCA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BNI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BSI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::MANDIRI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::PERMATA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::SAHABAT_SAMPOERNA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BNC, // indonesia
                ],
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
});

it('can create new invoice with payment methods RETAIL OUTLET', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description().' by RETAIL OUTLET',
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
                'success_redirect_url' => $customer->success_redirect_url(),
                'failure_redirect_url' => $customer->failure_redirect_url(),
                'payment_methods' => [
                    // CREDIT CARD
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::CREDIT_CARD, // global

                    // BANK TRANSFER
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BCA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BNI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BSI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::MANDIRI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::PERMATA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::SAHABAT_SAMPOERNA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BNC, // indonesia

                    // RETAIL OUTLET
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::ALFAMART, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::INDOMARET, // indonesia
                ],
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
});

it('can create new invoice with payment methods EWALLET', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description().' by EWALLET',
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
                'success_redirect_url' => $customer->success_redirect_url(),
                'failure_redirect_url' => $customer->failure_redirect_url(),
                'payment_methods' => [
                    // CREDIT CARD
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::CREDIT_CARD, // global

                    // BANK TRANSFER
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BCA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BNI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BSI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::MANDIRI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::PERMATA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::SAHABAT_SAMPOERNA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BNC, // indonesia

                    // RETAIL OUTLET
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::ALFAMART, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::INDOMARET, // indonesia

                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::OVO, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::DANA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::SHOPEEPAY, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::LINKAJA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::JENIUSPAY, // indonesia
                ],
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
});

it('can create new invoice with payment methods DIRECT DEBIT', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description().' by DIRECT DEBIT',
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
                'success_redirect_url' => $customer->success_redirect_url(),
                'failure_redirect_url' => $customer->failure_redirect_url(),
                'payment_methods' => [
                    // CREDIT CARD
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::CREDIT_CARD, //global

                    // BANK TRANSFER
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BCA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BNI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BSI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::MANDIRI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::PERMATA,
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::SAHABAT_SAMPOERNA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::BNC, // indonesia

                    // RETAIL OUTLET
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::ALFAMART, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::INDOMARET, // indonesia

                    // EWALLET
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::OVO, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::DANA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::SHOPEEPAY, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::LINKAJA, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::JENIUSPAY, // indonesia

                    // DIRECT DEBIT
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::DD_BRI, // indonesia
                    \Mrfansi\Xendit\Enums\AvailablePaymentMethod::DD_BCA_KLIKPAY, // indonesia

                ],
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
});

it('can create new invoice with currency IDR', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description().' by All Supported Payment with IDR',
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
                'success_redirect_url' => $customer->success_redirect_url(),
                'failure_redirect_url' => $customer->failure_redirect_url(),
                'payment_methods' => \Mrfansi\Xendit\Enums\AvailablePaymentMethod::cases(),
                'currency' => \Mrfansi\Xendit\Enums\AvailableCurrency::IDR,
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
});

it('can create new invoice with currency PHP', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description().' by All Supported Payment with PHP',
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
                'success_redirect_url' => $customer->success_redirect_url(),
                'failure_redirect_url' => $customer->failure_redirect_url(),
                'payment_methods' => \Mrfansi\Xendit\Enums\AvailablePaymentMethod::cases(),
                'currency' => \Mrfansi\Xendit\Enums\AvailableCurrency::PHP,
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
})->throws(ResponseException::class);

it('can create new invoice with currency THB', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description().' by All Supported Payment with THB',
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
                'success_redirect_url' => $customer->success_redirect_url(),
                'failure_redirect_url' => $customer->failure_redirect_url(),
                'payment_methods' => \Mrfansi\Xendit\Enums\AvailablePaymentMethod::cases(),
                'currency' => \Mrfansi\Xendit\Enums\AvailableCurrency::THB,
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
})->throws(ResponseException::class);

it('can create new invoice with currency VND', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description().' by All Supported Payment with VND',
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
                'success_redirect_url' => $customer->success_redirect_url(),
                'failure_redirect_url' => $customer->failure_redirect_url(),
                'payment_methods' => \Mrfansi\Xendit\Enums\AvailablePaymentMethod::cases(),
                'currency' => \Mrfansi\Xendit\Enums\AvailableCurrency::VND,
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
})->throws(ResponseException::class);

it('can create new invoice with currency MYR', function () {
    $customer = new \Mrfansi\Xendit\Tests\Support\FakeCustomer();
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => \Mrfansi\Xendit\Tests\Support\Generator::generateId(),
                'amount' => 510000,
                'description' => \Mrfansi\Xendit\Tests\Support\Generator::description().' by All Supported Payment with MYR',
                'customer' => [
                    'given_names' => $customer->given_names(),
                    'surname' => $customer->surname(),
                    'email' => $customer->email(),
                    'mobile_number' => $customer->mobile_number(),
                    'addresses' => [
                        $customer->addresses(),
                    ],
                ],
                'invoice_duration' => 3600,
                'success_redirect_url' => $customer->success_redirect_url(),
                'failure_redirect_url' => $customer->failure_redirect_url(),
                'payment_methods' => \Mrfansi\Xendit\Enums\AvailablePaymentMethod::cases(),
                'currency' => \Mrfansi\Xendit\Enums\AvailableCurrency::MYR,
            ]
        );

    expect($response->toJson())
        ->toBeArray()
        ->and($response->ok());
})->throws(ResponseException::class);

it('can set for-user-id in header request', function () {
    $headers = \Mrfansi\Xendit\Xendit::invoice()
        ->setForUserID('for-user-id')
        ->getHeaders();

    $for_user_id = \Mrfansi\Xendit\Xendit::invoice()
        ->setForUserID('for-user-id')
        ->getForUserID();

    expect($headers)
        ->toBeArray()
        ->toHaveKey('for-user-id', 'for-user-id')
        ->and($for_user_id)
        ->toEqual('for-user-id');
});

it('can set with-split-rule in header request', function () {
    $headers = \Mrfansi\Xendit\Xendit::invoice()
        ->setWithSplitRule('with-split-rule')
        ->getHeaders();

    $with_split_rule = \Mrfansi\Xendit\Xendit::invoice()
        ->setWithSplitRule('with-split-rule')
        ->getWithSplitRule();

    expect($headers)
        ->toBeArray()
        ->toHaveKey('with-split-rule', 'with-split-rule')
        ->and($with_split_rule)
        ->toEqual('with-split-rule');
});
