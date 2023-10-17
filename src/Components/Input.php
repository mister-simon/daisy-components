<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Style
        public $bordered = null,

        public $primary = null,
        public $secondary = null,
        public $accent = null,
        public $ghost = null,
        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,
    ) {
        $classes = ['input'];

        // Style
        if ($bordered) {
            $classes[] = 'input-bordered';
        }

        if ($primary) {
            $classes[] = 'input-primary';
        } elseif ($secondary) {
            $classes[] = 'input-secondary';
        } elseif ($accent) {
            $classes[] = 'input-accent';
        } elseif ($ghost) {
            $classes[] = 'input-ghost';
        } elseif ($info) {
            $classes[] = 'input-info';
        } elseif ($success) {
            $classes[] = 'input-success';
        } elseif ($warning) {
            $classes[] = 'input-warning';
        } elseif ($error) {
            $classes[] = 'input-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'input-lg';
        } elseif ($md) {
            $classes[] = 'input-md';
        } elseif ($sm) {
            $classes[] = 'input-sm';
        } elseif ($xs) {
            $classes[] = 'input-xs';
        }

        $this->defaultAttributes = [
            'type' => 'text',
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.input');
    }
}
