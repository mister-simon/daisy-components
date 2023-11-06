<?php

namespace MisterSimon\DaisyComponents;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DaisyComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
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
            \MisterSimon\DaisyComponents\Components\A::class,
            \MisterSimon\DaisyComponents\Components\Button::class,
            \MisterSimon\DaisyComponents\Components\Dropdown::class,
            \MisterSimon\DaisyComponents\Components\Modal::class,
            \MisterSimon\DaisyComponents\Components\Swap::class,

            // Data display
            \MisterSimon\DaisyComponents\Components\Accordion::class,
            \MisterSimon\DaisyComponents\Components\Alert::class,
            \MisterSimon\DaisyComponents\Components\Avatar::class,
            \MisterSimon\DaisyComponents\Components\Badge::class,
            \MisterSimon\DaisyComponents\Components\Card::class,
            \MisterSimon\DaisyComponents\Components\Carousel::class,
            \MisterSimon\DaisyComponents\Components\CarouselItem::class,
            \MisterSimon\DaisyComponents\Components\Chat::class,
            \MisterSimon\DaisyComponents\Components\Collapse::class,
            \MisterSimon\DaisyComponents\Components\Countdown::class,
            \MisterSimon\DaisyComponents\Components\CountdownItem::class,
            \MisterSimon\DaisyComponents\Components\Kbd::class,
            \MisterSimon\DaisyComponents\Components\Loading::class,
            \MisterSimon\DaisyComponents\Components\Progress::class,
            \MisterSimon\DaisyComponents\Components\RadialProgress::class,
            \MisterSimon\DaisyComponents\Components\Stats::class,
            \MisterSimon\DaisyComponents\Components\Stat::class,
            \MisterSimon\DaisyComponents\Components\Table::class,
            \MisterSimon\DaisyComponents\Components\Tooltip::class,

            // Data input
            \MisterSimon\DaisyComponents\Components\FormControl::class,
            \MisterSimon\DaisyComponents\Components\Label::class,
            \MisterSimon\DaisyComponents\Components\Checkbox::class,
            \MisterSimon\DaisyComponents\Components\FileInput::class,
            \MisterSimon\DaisyComponents\Components\Radio::class,
            \MisterSimon\DaisyComponents\Components\Range::class,
            \MisterSimon\DaisyComponents\Components\RangeMeasure::class,
            \MisterSimon\DaisyComponents\Components\Rating::class,
            \MisterSimon\DaisyComponents\Components\Select::class,
            \MisterSimon\DaisyComponents\Components\Input::class,
            \MisterSimon\DaisyComponents\Components\Textarea::class,
            \MisterSimon\DaisyComponents\Components\Toggle::class,

            // Layout
            \MisterSimon\DaisyComponents\Components\Artboard::class,
            \MisterSimon\DaisyComponents\Components\Divider::class,
            \MisterSimon\DaisyComponents\Components\Drawer::class,
            \MisterSimon\DaisyComponents\Components\Footer::class,
            \MisterSimon\DaisyComponents\Components\FooterTitle::class,
            \MisterSimon\DaisyComponents\Components\Hero::class,
            \MisterSimon\DaisyComponents\Components\Indicator::class,
            \MisterSimon\DaisyComponents\Components\Join::class,
            \MisterSimon\DaisyComponents\Components\Mask::class,

            // Navigation

            // Mockup

        ], $prefix);

    }
}
