<?php

namespace mrfansi\Xendit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \mrfansi\Xendit\Xendit
 */
class Xendit extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \mrfansi\Xendit\Xendit::class;
    }
}
