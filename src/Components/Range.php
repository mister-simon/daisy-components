<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Range extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Style
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
        if ($primary) {
            $classes[] = 'range-primary';
        } elseif ($secondary) {
            $classes[] = 'range-secondary';
        } elseif ($accent) {
            $classes[] = 'range-accent';
        } elseif ($info) {
            $classes[] = 'range-info';
        } elseif ($success) {
            $classes[] = 'range-success';
        } elseif ($warning) {
            $classes[] = 'range-warning';
        } elseif ($error) {
            $classes[] = 'range-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'range-lg';
        } elseif ($md) {
            $classes[] = 'range-md';
        } elseif ($sm) {
            $classes[] = 'range-sm';
        } elseif ($xs) {
            $classes[] = 'range-xs';
        }

        $this->defaultAttributes = [
            'type' => 'range',
            'class' => implode(' ', $classes),
        ];
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
