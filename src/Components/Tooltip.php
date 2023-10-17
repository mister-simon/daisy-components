<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tooltip extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Tip
        public $tip = '',

        // Position
        public $top = null,
        public $bottom = null,
        public $left = null,
        public $right = null,

        // Style
        public $primary = null,
        public $secondary = null,
        public $accent = null,
        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,

        // Force open
        public $forceOpen = null,
    ) {
        $classes = ['tooltip'];

        // Position
        if ($top) {
            $classes[] = 'tooltip-top';
        } elseif ($bottom) {
            $classes[] = 'tooltip-bottom';
        } elseif ($left) {
            $classes[] = 'tooltip-left';
        } elseif ($right) {
            $classes[] = 'tooltip-right';
        }

        // Style
        if ($primary) {
            $classes[] = 'tooltip-primary';
        } elseif ($secondary) {
            $classes[] = 'tooltip-secondary';
        } elseif ($accent) {
            $classes[] = 'tooltip-accent';
        } elseif ($info) {
            $classes[] = 'tooltip-info';
        } elseif ($success) {
            $classes[] = 'tooltip-success';
        } elseif ($warning) {
            $classes[] = 'tooltip-warning';
        } elseif ($error) {
            $classes[] = 'tooltip-error';
        }

        if ($forceOpen) {
            $classes[] = 'tooltip-open';
        }

        $this->defaultAttributes = [
            'data-tip' => $this->tip,
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.tooltip');
    }
}
