<?php

it('will not use debugging functions')
    ->expect(['dd', 'dump', 'ray'])
    ->not->toBeUsed();

arch('all everything in data folder must be dto', function () {
    expect('Mrfansi\Xendit\Data')
        ->toBeClasses()
        ->toExtend(\Spatie\LaravelData\Data::class)
        ->toHaveConstructor();
});

arch('all everything in enums folder must be enum', function () {
    expect('Mrfansi\Xendit\Enums')
        ->toBeEnums();
});
