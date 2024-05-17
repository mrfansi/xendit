<?php

namespace Mrfansi\Xendit\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Mrfansi\Xendit\XenditServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\LaravelData\LaravelDataServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Mrfansi\\Xendit\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            XenditServiceProvider::class,
            LaravelDataServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
        config()->set('xendit.base_url', 'https://api.xendit.com');
        config()->set('xendit.secret_key', 'xnd_development_EyIed5Yqm3C1m0hQzpCT8ybd8IeT0VVFOqIJdavp7hpVDKY8lizFb6rjFtYTnmv');
        config()->set('xendit.public_key', 'xnd_public_development_ETZ3Ju7tvBdFR9o68kqo4FQ3MBiVWyIueWy8BkSTYx7JpJ8ZlciAh815STJRs');
        config()->set('xendit.webhook_token', 'zTMyWRQzooo0rerNR79cEtVbbnQBde76GhgV632NizLx5GuG');

        /*
        $migration = include __DIR__.'/../database/migrations/create_xendit_table.php.stub';
        $migration->up();
        */
    }
}
