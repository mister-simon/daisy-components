<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
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
        $classes = ['textarea'];

        // Style
        if ($bordered) {
            $classes[] = 'textarea-bordered';
        }

        if ($primary) {
            $classes[] = 'textarea-primary';
        } elseif ($secondary) {
            $classes[] = 'textarea-secondary';
        } elseif ($accent) {
            $classes[] = 'textarea-accent';
        } elseif ($ghost) {
            $classes[] = 'textarea-ghost';
        } elseif ($info) {
            $classes[] = 'textarea-info';
        } elseif ($success) {
            $classes[] = 'textarea-success';
        } elseif ($warning) {
            $classes[] = 'textarea-warning';
        } elseif ($error) {
            $classes[] = 'textarea-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'textarea-lg';
        } elseif ($md) {
            $classes[] = 'textarea-md';
        } elseif ($sm) {
            $classes[] = 'textarea-sm';
        } elseif ($xs) {
            $classes[] = 'textarea-xs';
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
        return view('daisy-components::components.textarea');
    }
}
