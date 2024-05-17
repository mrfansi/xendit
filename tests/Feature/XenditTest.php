<?php

use Mrfansi\Xendit\Xendit;

uses()->group('feature');

it('can send request into api', function () {
    $xendit = new Xendit();
    $response = $xendit->request('GET', '/balance');

    expect($response->status())
        ->toEqual(200)
        ->and($response->object())
        ->toBeObject('result not an object')
        ->toHaveProperty('balance', message: 'result doesnt have balance property');
});

it('can setter and getter the base url', function () {
    $xendit = new Xendit();
    $response = $xendit->setBaseUrl('the base url')->getBaseUrl();

    expect($response)
        ->not->toBeNull()
        ->toBeString()
        ->toEqual('the base url');
});

it('can setter and getter the secret key', function () {
    $xendit = new Xendit();
    $response = $xendit->setSecretKey('the secret key')->getSecretKey();

    expect($response)
        ->not->toBeNull()
        ->toBeString()
        ->toEqual('the secret key');
});

it('can setter and getter the public key', function () {
    $xendit = new Xendit();
    $response = $xendit->setPublicKey('the public key')->getPublicKey();

    expect($response)
        ->not->toBeNull()
        ->toBeString()
        ->toEqual('the public key');
});

it('can setter and getter the webhook token', function () {
    $xendit = new Xendit();
    $response = $xendit->setWebhookToken('the webhook token')->getWebhookToken();

    expect($response)
        ->not->toBeNull()
        ->toBeString()
        ->toEqual('the webhook token');
});
