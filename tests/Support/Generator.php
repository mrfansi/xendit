<?php

namespace Mrfansi\Xendit\Tests\Support;

use Illuminate\Support\Str;

class Generator
{
    public static function generateId(): string
    {
        return Str::uuid()->toString();
    }

    public static function description(): string
    {
        $last = Str::afterLast(Str::uuid()->toString(), '-');

        return 'Invoice Demo #'.$last;
    }
}
