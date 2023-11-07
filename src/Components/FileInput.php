<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class FileInput extends Component
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
        $classes = ['file-input'];

        // Style
        if ($bordered) {
            $classes[] = 'file-input-bordered';
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
            $classes[] = 'file-input-primary';
        } elseif ($this->secondary) {
            $classes[] = 'file-input-secondary';
        } elseif ($this->accent) {
            $classes[] = 'file-input-accent';
        } elseif ($this->ghost) {
            $classes[] = 'file-input-ghost';
        } elseif ($this->info) {
            $classes[] = 'file-input-info';
        } elseif ($this->success) {
            $classes[] = 'file-input-success';
        } elseif ($this->warning) {
            $classes[] = 'file-input-warning';
        } elseif ($this->error) {
            $classes[] = 'file-input-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'file-input-lg';
        } elseif ($md) {
            $classes[] = 'file-input-md';
        } elseif ($sm) {
            $classes[] = 'file-input-sm';
        } elseif ($xs) {
            $classes[] = 'file-input-xs';
        }

        $this->defaultAttributes = [
            'type' => 'file',
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.file-input');
    }
}
