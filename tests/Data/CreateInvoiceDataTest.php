<?php

uses()->group('data');

it('must to be DTO', function () {
    expect('Mrfansi\Xendit\Data\Invoice\CreateInvoiceData')
        ->toHaveConstructor()
        ->toExtend(\Spatie\LaravelData\Data::class);
});
