<?php

use Mrfansi\Xendit\Data\Invoice\AddressData;

uses()->group('data');

it('must to be DTO', function () {
    expect('Mrfansi\Xendit\Data\Invoice\AddressData')
        ->toHaveConstructor()
        ->toExtend(\Spatie\LaravelData\Data::class);
});

it('can as a valid object and array', function () {
    $payloadAddress = [
        'city' => 'Jakarta Selatan',
        'country' => 'Indonesia',
        'state' => 'Daerah Khusus Ibukota Jakarta',
        'street_line1' => 'Jalan Makan',
        'street_line2' => 'Kecamatan Kebayoran Baru',
        'postal_code' => '12345',
    ];

    $result = AddressData::validateAndCreate($payloadAddress);

    expect($result)
        ->toBeObject()
        ->toMatchObject([
            'city' => 'Jakarta Selatan',
            'country' => 'Indonesia',
            'state' => 'Daerah Khusus Ibukota Jakarta',
            'street_line1' => 'Jalan Makan',
            'street_line2' => 'Kecamatan Kebayoran Baru',
            'postal_code' => '12345',
        ])
        ->and($result->toArray())
        ->toBeArray()
        ->toMatchArray([
            'city' => 'Jakarta Selatan',
            'country' => 'Indonesia',
            'state' => 'Daerah Khusus Ibukota Jakarta',
            'street_line1' => 'Jalan Makan',
            'street_line2' => 'Kecamatan Kebayoran Baru',
            'postal_code' => '12345',
        ]);
});

it('can hide optional key when null in array', function () {
    $payloadAddress = [
        'city' => 'Jakarta Selatan',
        'country' => 'Indonesia',
        'state' => 'Daerah Khusus Ibukota Jakarta',
        'street_line1' => 'Jalan Makan',
        'postal_code' => '12345',
    ];

    $result = AddressData::validateAndCreate($payloadAddress);
    expect($result->toArray())
        ->toBeArray()
        ->not->toHaveProperties(['street_line2']);
});
