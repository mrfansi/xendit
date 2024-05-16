<?php

// config for mrfansi/Xendit
return [

    /**
     * The Xendit API is organized around REST. Our API has predictable, resource-oriented URLs, and uses HTTP response codes to indicate API errors. We use built-in HTTP features and HTTP verbs, which are understood by off-the-shelf HTTP clients. JSON is returned by all API responses, including errors.
     */
    'base_url' => env('XENDIT_BASE_URL', 'https://api.xendit.com'),

    /**
     * Secret keys are used to authenticate API requests coming from your servers.
     */
    'secret_key' => env('XENDIT_SECRET_KEY', ''),

    /**
     * Public keys are only used to tokenize card information on the client side.
     */
    'public_key' => env('XENDIT_PUBLIC_KEY', ''),

];
