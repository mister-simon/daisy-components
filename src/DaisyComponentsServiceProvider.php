<?php

namespace MisterSimon\DaisyComponents;

use Illuminate\Support\Facades\Blade;
use MisterSimon\DaisyComponents\Components\Accordion;
use MisterSimon\DaisyComponents\Components\Alert;
use MisterSimon\DaisyComponents\Components\Avatar;
use MisterSimon\DaisyComponents\Components\Button;
use MisterSimon\DaisyComponents\Components\Dropdown;
use MisterSimon\DaisyComponents\Components\Modal;
use MisterSimon\DaisyComponents\Components\Swap;
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
            ->hasViews();
    }

    public function packageBooted()
    {
        $prefix = config('daisy-components.prefix');

        Blade::componentNamespace(
            'MisterSimon\DaisyComponents\Components',
            'daisy-components'
        );

        Blade::components([
            // Actions
            Button::class,
            Dropdown::class,
            Modal::class,
            Swap::class,

            // Data display
            Accordion::class,
            Alert::class,
            Avatar::class,

            // Data input

            // Layout

            // Navigation

            // Mockup

        ], $prefix);

    }
}
