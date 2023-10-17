<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
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
    ) {
        $classes = ['checkbox'];

        // Style
        if ($primary) {
            $classes[] = 'checkbox-primary';
        } elseif ($secondary) {
            $classes[] = 'checkbox-secondary';
        } elseif ($accent) {
            $classes[] = 'checkbox-accent';
        } elseif ($info) {
            $classes[] = 'checkbox-info';
        } elseif ($success) {
            $classes[] = 'checkbox-success';
        } elseif ($warning) {
            $classes[] = 'checkbox-warning';
        } elseif ($error) {
            $classes[] = 'checkbox-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'checkbox-lg';
        } elseif ($md) {
            $classes[] = 'checkbox-md';
        } elseif ($sm) {
            $classes[] = 'checkbox-sm';
        } elseif ($xs) {
            $classes[] = 'checkbox-xs';
        }

        $this->defaultAttributes = [
            'type' => 'checkbox',
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.checkbox');
    }
}
