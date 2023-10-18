<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $placeholder = null,
        public $options = null,
        public $value = null,

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
        $classes = ['select'];

        // Style
        if ($bordered) {
            $classes[] = 'select-bordered';
        }

        if ($primary) {
            $classes[] = 'select-primary';
        } elseif ($secondary) {
            $classes[] = 'select-secondary';
        } elseif ($accent) {
            $classes[] = 'select-accent';
        } elseif ($ghost) {
            $classes[] = 'select-ghost';
        } elseif ($info) {
            $classes[] = 'select-info';
        } elseif ($success) {
            $classes[] = 'select-success';
        } elseif ($warning) {
            $classes[] = 'select-warning';
        } elseif ($error) {
            $classes[] = 'select-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'select-lg';
        } elseif ($md) {
            $classes[] = 'select-md';
        } elseif ($sm) {
            $classes[] = 'select-sm';
        } elseif ($xs) {
            $classes[] = 'select-xs';
        }

        $this->defaultAttributes = [
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Check if a given key is selected.
     * Allow options to be provided as a non-assoc array.
     * Default to non-strict equality.
     */
    public function isSelected($key): bool
    {
        return $key === 0
            ? $this->value === 0 || $this->value === '0'
            : $key == $this->value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.select');
    }
}
