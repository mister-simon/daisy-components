<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Component
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
        $classes = ['radio'];

        // Style
        if ($primary) {
            $classes[] = 'radio-primary';
        } elseif ($secondary) {
            $classes[] = 'radio-secondary';
        } elseif ($accent) {
            $classes[] = 'radio-accent';
        } elseif ($info) {
            $classes[] = 'radio-info';
        } elseif ($success) {
            $classes[] = 'radio-success';
        } elseif ($warning) {
            $classes[] = 'radio-warning';
        } elseif ($error) {
            $classes[] = 'radio-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'radio-lg';
        } elseif ($md) {
            $classes[] = 'radio-md';
        } elseif ($sm) {
            $classes[] = 'radio-sm';
        } elseif ($xs) {
            $classes[] = 'radio-xs';
        }

        $this->defaultAttributes = [
            'type' => 'radio',
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.radio');
    }
}
