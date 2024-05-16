<?php

namespace mrfansi\Xendit;

use mrfansi\Xendit\Commands\XenditCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class XenditServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('xendit')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_xendit_table')
            ->hasCommand(XenditCommand::class);
    }
}
