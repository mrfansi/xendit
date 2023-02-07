<?php

namespace Mrfansi\Xendit\Commands;

use Illuminate\Console\Command;

class XenditCommand extends Command
{
    public $signature = 'xendit';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
