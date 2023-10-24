<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Badge extends Component
{
    public $defaultAttributes;

    public function __construct(
        // HTML tag to use
        public $tag = 'span',

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
        if ($type && ($typeEnum = Type::tryFrom($type))) {
            $this->neutral = $typeEnum === Type::NEUTRAL;
            $this->primary = $typeEnum === Type::PRIMARY;
            $this->secondary = $typeEnum === Type::SECONDARY;
            $this->accent = $typeEnum === Type::ACCENT;
            $this->info = $typeEnum === Type::INFO;
            $this->success = $typeEnum === Type::SUCCESS;
            $this->warning = $typeEnum === Type::WARNING;
            $this->error = $typeEnum === Type::ERROR;
            $this->ghost = $typeEnum === Type::GHOST;
        }

        if ($this->neutral) {
            $classes[] = 'badge-neutral';
        } elseif ($this->primary) {
            $classes[] = 'badge-primary';
        } elseif ($this->secondary) {
            $classes[] = 'badge-secondary';
        } elseif ($this->accent) {
            $classes[] = 'badge-accent';
        } elseif ($this->info) {
            $classes[] = 'badge-info';
        } elseif ($this->success) {
            $classes[] = 'badge-success';
        } elseif ($this->warning) {
            $classes[] = 'badge-warning';
        } elseif ($this->error) {
            $classes[] = 'badge-error';
        } elseif ($this->ghost) {
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
