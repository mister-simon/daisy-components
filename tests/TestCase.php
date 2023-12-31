<?php

namespace MisterSimon\DaisyComponents\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use MisterSimon\DaisyComponents\DaisyComponentsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'MisterSimon\\DaisyComponents\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            DaisyComponentsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_daisy-components_table.php.stub';
        $migration->up();
        */
    }
}
