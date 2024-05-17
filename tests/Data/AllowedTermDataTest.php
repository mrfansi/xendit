<?php

use Mrfansi\Xendit\Data\Invoice\AllowedTermData;

uses()->group('data');

it('must to be DTO', function () {
    expect('Mrfansi\Xendit\Data\Invoice\AllowedTermData')
        ->toHaveConstructor()
        ->toExtend(\Spatie\LaravelData\Data::class);
});

it('can as a valid object and array', function () {
    $payloadAddress = [
        'issuer' => 'BCA',
        'terms' => [3, 6, 12],
    ];

    $result = AllowedTermData::validateAndCreate($payloadAddress);

    expect($result)
        ->toBeObject()
        ->toMatchObject(
            [
                'issuer' => 'BCA',
                'terms' => [3, 6, 12],
            ]
        )
        ->and($result->toArray())
        ->toBeArray()
        ->toMatchArray(
            [
                'issuer' => 'BCA',
                'terms' => [3, 6, 12],
            ]
        );
});

it('cannot skip required key when null in array', function () {
    $payloadAddress = [
        'terms' => [3, 6, 12],
    ];

    $result = AllowedTermData::validateAndCreate($payloadAddress);

})->throws(\Illuminate\Validation\ValidationException::class);
