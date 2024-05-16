<?php

namespace Mrfansi\Xendit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mrfansi\Xendit\Xendit
 */
class Xendit extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Mrfansi\Xendit\Xendit::class;
    }
}
