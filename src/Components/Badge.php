<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Badge extends Component
{
    public $defaultAttributes;

    public function __construct(
        // HTML tag to use
        public $tag = 'span',

        // Style
        public $neutral = null,
        public $primary = null,
        public $secondary = null,
        public $accent = null,
        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,
        public $ghost = null,

        // Outline
        public $outline = null,

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,
    ) {
        $classes = ['badge'];

        // Style
        if ($neutral) {
            $classes[] = 'badge-neutral';
        } elseif ($primary) {
            $classes[] = 'badge-primary';
        } elseif ($secondary) {
            $classes[] = 'badge-secondary';
        } elseif ($accent) {
            $classes[] = 'badge-accent';
        } elseif ($info) {
            $classes[] = 'badge-info';
        } elseif ($success) {
            $classes[] = 'badge-success';
        } elseif ($warning) {
            $classes[] = 'badge-warning';
        } elseif ($error) {
            $classes[] = 'badge-error';
        } elseif ($ghost) {
            $classes[] = 'badge-ghost';
        }

        // Outline
        if ($outline) {
            $classes[] = 'badge-outline';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'badge-lg';
        } elseif ($md) {
            $classes[] = 'badge-md';
        } elseif ($sm) {
            $classes[] = 'badge-sm';
        } elseif ($xs) {
            $classes[] = 'badge-xs';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.badge');
    }
}