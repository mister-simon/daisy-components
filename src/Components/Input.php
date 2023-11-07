<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Input extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Style
        public $bordered = null,

        public $color = null,

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

        if ($color && ($typeEnum = Type::tryFrom($color))) {
            $this->primary = $typeEnum === Type::PRIMARY;
            $this->secondary = $typeEnum === Type::SECONDARY;
            $this->accent = $typeEnum === Type::ACCENT;
            $this->info = $typeEnum === Type::INFO;
            $this->success = $typeEnum === Type::SUCCESS;
            $this->warning = $typeEnum === Type::WARNING;
            $this->error = $typeEnum === Type::ERROR;
            $this->ghost = $typeEnum === Type::GHOST;
        }
        if ($this->primary) {
            $classes[] = 'input-primary';
        } elseif ($this->secondary) {
            $classes[] = 'input-secondary';
        } elseif ($this->accent) {
            $classes[] = 'input-accent';
        } elseif ($this->ghost) {
            $classes[] = 'input-ghost';
        } elseif ($this->info) {
            $classes[] = 'input-info';
        } elseif ($this->success) {
            $classes[] = 'input-success';
        } elseif ($this->warning) {
            $classes[] = 'input-warning';
        } elseif ($this->error) {
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
