<?php

namespace Mrfansi\Xendit;

class Xendit
{
    public function __construct(
        public string $baseUrl
    ) {
        $this->baseUrl = 'https://api.xendit.com';
    }
}
