<?php

uses()->group('feature');

arch('xendit invoice must have create method', function () {
    expect('Mrfansi\Xendit\XenditInvoice')
        ->toHaveMethod('create');
});

arch('xendit invoice must have constructor', function () {
    expect('Mrfansi\Xendit\XenditInvoice')
        ->toHaveConstructor();
});

it('can create new invoice and submit into api', function () {
    $response = \Mrfansi\Xendit\Xendit::invoice()
        ->create(
            [
                'external_id' => 'x'.now(),
                'amount' => 510000,
                'description' => 'Invoice Demo #123',
                'invoice_duration' => 86400,
                'customer' => [
                    'given_names' => 'John',
                    'surname' => 'Doe',
                    'email' => 'johndoe@example.com',
                    'mobile_number' => '+6287774441111',
                    'addresses' => [
                        [
                            'city' => 'Jakarta Selatan',
                            'country' => 'Indonesia',
                            'postal_code' => '12345',
                            'state' => 'Daerah Khusus Ibukota Jakarta',
                            'street_line1' => 'Jalan Makan',
                            'street_line2' => 'Kecamatan Kebayoran Baru',
                        ],
                    ],
                ],
                'customer_notification_preference' => [
                    'invoice_created' => [
                        'whatsapp',
                        'email',
                        'viber',
                    ],
                    'invoice_reminder' => [
                        'whatsapp',
                        'email',
                        'viber',
                    ],
                    'invoice_paid' => [
                        'whatsapp',
                        'email',
                        'viber',
                    ],
                ],
                'success_redirect_url' => 'https://www.google.com',
                'failure_redirect_url' => 'https://www.google.com',
                'currency' => 'IDR',
                'items' => [
                    [
                        'name' => 'Air Conditioner',
                        'quantity' => 1,
                        'price' => 100000,
                        'category' => 'Electronic',
                        'url' => 'https://yourcompany.com/example_item',
                    ],
                ],
                'fees' => [
                    [
                        'type' => 'ADMIN',
                        'value' => 5000,
                    ],
                ],
                'payment_methods' => [
                    'CREDIT_CARD',
                ],
                'channel_properties' => [
                    'cards' => [
                        'allowed_bins' => [
                            '400000',
                            '52000000',
                        ],
                        'installment_configuration' => [
                            'allow_full_payment' => false,
                            'allowed_terms' => [
                                [
                                    'issuer' => 'BCA',
                                    'terms' => [
                                        3,
                                        6,
                                        12,
                                    ],
                                ],
                                [
                                    'issuer' => 'BNI',
                                    'terms' => [
                                        3,
                                        6,
                                    ],
                                ],
                                [
                                    'issuer' => 'MANDIRI',
                                    'terms' => [
                                        6,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

    expect($response->json())
        ->toBeArray();
});

it('can set for-user-id in header request', function () {
    $for_user_id = \Mrfansi\Xendit\Xendit::invoice()
        ->setForUserID('for-user-id')
        ->getHeaders();

    expect($for_user_id)
        ->toBeArray()
        ->toHaveKey('for-user-id', 'for-user-id');
});

it('can set with-split-rule in header request', function () {
    $with_split_rule = \Mrfansi\Xendit\Xendit::invoice()
        ->setWithSplitRule('with-split-rule')
        ->getHeaders();

    expect($with_split_rule)
        ->toBeArray()
        ->toHaveKey('with-split-rule', 'with-split-rule');
});
