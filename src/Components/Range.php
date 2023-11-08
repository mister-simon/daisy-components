<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Range extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Style
        public $color = null,

        public $primary = null,
        public $secondary = null,
        public $accent = null,
        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,

        // Measure
        public $measure = null,
    ) {
        $classes = ['range'];

        // Style
        $classes[] = match ($this->colorEnum()) {
            Type::PRIMARY => 'range-primary',
            Type::SECONDARY => 'range-secondary',
            Type::ACCENT => 'range-accent',
            Type::INFO => 'range-info',
            Type::SUCCESS => 'range-success',
            Type::WARNING => 'range-warning',
            Type::ERROR => 'range-error',
            default => '',
        };

        // Sizes
        $classes[] = match (true) {
            $lg => 'range-lg',
            $md => 'range-md',
            $sm => 'range-sm',
            $xs => 'range-xs',
            default => '',
        };

        $this->defaultAttributes = [
            'type' => 'range',
            'class' => implode(' ', $classes),
        ];
    }

    public function colorEnum()
    {
        return $this->color !== null
            ? Type::tryFrom($this->color)
            : match (true) {
                $this->primary => Type::PRIMARY,
                $this->secondary => Type::SECONDARY,
                $this->accent => Type::ACCENT,
                $this->info => Type::INFO,
                $this->success => Type::SUCCESS,
                $this->warning => Type::WARNING,
                $this->error => Type::ERROR,
                default => null,
            };
    }

    /**
     * The x padding for each size should be exactly 1/2 the range input's height.
     */
    public function defaultMeasureClass()
    {
        $md = (
            $this->lg === null
            && $this->md === null
            && $this->sm === null
            && $this->xs === null
        );

        return match (true) {
            $this->lg => 'px-4',
            $this->sm => 'px-[0.625rem]',
            $this->xs => 'px-2',
            $md => 'px-3',
            default => 'px-3',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.range');
    }
}
