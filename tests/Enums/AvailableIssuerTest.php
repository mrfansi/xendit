<?php

uses()->group('enum');

it('must to be enum', function () {
    expect('Mrfansi\Xendit\Enums\AvailableIssuer')
        ->toBeEnums()
        ->toBeStringBackedEnums();
});
