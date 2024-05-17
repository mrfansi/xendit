<?php

uses()->group('data');

it('must to be DTO', function () {
    expect('Mrfansi\Xendit\Data\Invoice\ChannelPropertyData')
        ->toHaveConstructor()
        ->toExtend(\Spatie\LaravelData\Data::class);
});
