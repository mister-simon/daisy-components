<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toggle extends Component
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
        $classes = ['toggle'];

        // Style
        if ($primary) {
            $classes[] = 'toggle-primary';
        } elseif ($secondary) {
            $classes[] = 'toggle-secondary';
        } elseif ($accent) {
            $classes[] = 'toggle-accent';
        } elseif ($info) {
            $classes[] = 'toggle-info';
        } elseif ($success) {
            $classes[] = 'toggle-success';
        } elseif ($warning) {
            $classes[] = 'toggle-warning';
        } elseif ($error) {
            $classes[] = 'toggle-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'toggle-lg';
        } elseif ($md) {
            $classes[] = 'toggle-md';
        } elseif ($sm) {
            $classes[] = 'toggle-sm';
        } elseif ($xs) {
            $classes[] = 'toggle-xs';
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
        return view('daisy-components::components.toggle');
    }
}
