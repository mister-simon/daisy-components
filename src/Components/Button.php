<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Button extends Component
{
    public $defaultAttributes;

    public function __construct(
        // HTML tag to use
        public $tag = null,

        // Style
        public $type = null,

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
        if ($type) {
            $this->neutral = $type === Type::NEUTRAL->value;
            $this->primary = $type === Type::PRIMARY->value;
            $this->secondary = $type === Type::SECONDARY->value;
            $this->accent = $type === Type::ACCENT->value;
            $this->info = $type === Type::INFO->value;
            $this->success = $type === Type::SUCCESS->value;
            $this->warning = $type === Type::WARNING->value;
            $this->error = $type === Type::ERROR->value;
            $this->ghost = $type === Type::GHOST->value;
            $this->link = $type === Type::LINK->value;
        }

        if ($this->neutral) {
            $classes[] = 'btn-neutral';
        } elseif ($this->primary) {
            $classes[] = 'btn-primary';
        } elseif ($this->secondary) {
            $classes[] = 'btn-secondary';
        } elseif ($this->accent) {
            $classes[] = 'btn-accent';
        } elseif ($this->info) {
            $classes[] = 'btn-info';
        } elseif ($this->success) {
            $classes[] = 'btn-success';
        } elseif ($this->warning) {
            $classes[] = 'btn-warning';
        } elseif ($this->error) {
            $classes[] = 'btn-error';
        } elseif ($this->ghost) {
            $classes[] = 'btn-ghost';
        } elseif ($this->link) {
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
        $this->tag ??= 'button';

        return view('daisy-components::components.button');
    }
}
