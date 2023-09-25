<?php

namespace MisterSimon\DaisyComponents;

use MisterSimon\DaisyComponents\Commands\DaisyComponentsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DaisyComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('daisy-components')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_daisy-components_table')
            ->hasCommand(DaisyComponentsCommand::class);
    }
}
