<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $defaultAttributes;

    public function __construct(
        // HTML tag to use
        public $tag = 'button',

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
        public $link = null,

        // Outline
        public $outline = null,

        // Statuses
        public $active = null,
        public $disabled = null,

        // Effects
        public $glass = null,
        public $noAnimation = null,

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,

        // Shapes / Layout
        public $wide = null,
        public $block = null,
        public $circle = null,
        public $square = null,
    ) {
        $classes = ['btn'];

        // Style
        if ($neutral) {
            $classes[] = 'btn-neutral';
        } elseif ($primary) {
            $classes[] = 'btn-primary';
        } elseif ($secondary) {
            $classes[] = 'btn-secondary';
        } elseif ($accent) {
            $classes[] = 'btn-accent';
        } elseif ($info) {
            $classes[] = 'btn-info';
        } elseif ($success) {
            $classes[] = 'btn-success';
        } elseif ($warning) {
            $classes[] = 'btn-warning';
        } elseif ($error) {
            $classes[] = 'btn-error';
        } elseif ($ghost) {
            $classes[] = 'btn-ghost';
        } elseif ($link) {
            $classes[] = 'btn-link';
        }

        // Outline
        if ($outline) {
            $classes[] = 'btn-outline';
        }

        // Statuses
        if ($active) {
            $classes[] = 'btn-active';
        }

        if ($disabled) {
            $classes[] = 'btn-disabled';
        }

        // Effects
        if ($glass) {
            $classes[] = 'glass';
        }
        if ($noAnimation) {
            $classes[] = 'no-animation';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'btn-lg';
        } elseif ($md) {
            $classes[] = 'btn-md';
        } elseif ($sm) {
            $classes[] = 'btn-sm';
        } elseif ($xs) {
            $classes[] = 'btn-xs';
        }

        // Shapes / Layout
        if ($wide) {
            $classes[] = 'btn-wide';
        }
        if ($block) {
            $classes[] = 'btn-block';
        }
        if ($circle) {
            $classes[] = 'btn-circle';
        } elseif ($square) {
            $classes[] = 'btn-square';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];

        if ($disabled) {
            $this->defaultAttributes['disabled'] = 'disabled';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.button');
    }
}
