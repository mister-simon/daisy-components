<?php

namespace MisterSimon\DaisyComponents;

use Illuminate\Support\Facades\Blade;
use MisterSimon\DaisyComponents\Components\A;
use MisterSimon\DaisyComponents\Components\Accordion;
use MisterSimon\DaisyComponents\Components\Alert;
use MisterSimon\DaisyComponents\Components\Avatar;
use MisterSimon\DaisyComponents\Components\Badge;
use MisterSimon\DaisyComponents\Components\Button;
use MisterSimon\DaisyComponents\Components\Card;
use MisterSimon\DaisyComponents\Components\Carousel;
use MisterSimon\DaisyComponents\Components\CarouselItem;
use MisterSimon\DaisyComponents\Components\Chat;
use MisterSimon\DaisyComponents\Components\Checkbox;
use MisterSimon\DaisyComponents\Components\Collapse;
use MisterSimon\DaisyComponents\Components\Countdown;
use MisterSimon\DaisyComponents\Components\CountdownItem;
use MisterSimon\DaisyComponents\Components\Dropdown;
use MisterSimon\DaisyComponents\Components\FormControl;
use MisterSimon\DaisyComponents\Components\Kbd;
use MisterSimon\DaisyComponents\Components\Label;
use MisterSimon\DaisyComponents\Components\Loading;
use MisterSimon\DaisyComponents\Components\Modal;
use MisterSimon\DaisyComponents\Components\Progress;
use MisterSimon\DaisyComponents\Components\RadialProgress;
use MisterSimon\DaisyComponents\Components\Radio;
use MisterSimon\DaisyComponents\Components\Range;
use MisterSimon\DaisyComponents\Components\RangeMeasure;
use MisterSimon\DaisyComponents\Components\Stat;
use MisterSimon\DaisyComponents\Components\Stats;
use MisterSimon\DaisyComponents\Components\Swap;
use MisterSimon\DaisyComponents\Components\Table;
use MisterSimon\DaisyComponents\Components\Tooltip;
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
            A::class,
            Button::class,
            Dropdown::class,
            Modal::class,
            Swap::class,

            // Data display
            Accordion::class,
            Alert::class,
            Avatar::class,
            Badge::class,
            Card::class,
            Carousel::class,
            CarouselItem::class,
            Chat::class,
            Collapse::class,
            Countdown::class,
            CountdownItem::class,
            Kbd::class,
            Loading::class,
            Progress::class,
            RadialProgress::class,
            Stats::class,
            Stat::class,
            Table::class,
            Tooltip::class,

            // Data input
            FormControl::class,
            Label::class,
            Checkbox::class,
            Radio::class,
            Range::class,
            RangeMeasure::class,

            // Layout

            // Navigation

            // Mockup

        ], $prefix);

    }
}
