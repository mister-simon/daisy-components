<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Select extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $placeholder = null,
        public $options = null,
        public $value = null,

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
        $classes = ['select'];

        // Style
        if ($bordered) {
            $classes[] = 'select-bordered';
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
            $classes[] = 'select-primary';
        } elseif ($this->secondary) {
            $classes[] = 'select-secondary';
        } elseif ($this->accent) {
            $classes[] = 'select-accent';
        } elseif ($this->ghost) {
            $classes[] = 'select-ghost';
        } elseif ($this->info) {
            $classes[] = 'select-info';
        } elseif ($this->success) {
            $classes[] = 'select-success';
        } elseif ($this->warning) {
            $classes[] = 'select-warning';
        } elseif ($this->error) {
            $classes[] = 'select-error';
        }

        // Sizes
        $classes[] = match (true) {
            $lg => 'select-lg',
            $md => 'select-md',
            $sm => 'select-sm',
            $xs => 'select-xs',
            default => '',
        };

        $this->defaultAttributes = [
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Check if a given key is selected.
     * Allow options to be provided as a non-assoc array.
     * Default to non-strict equality.
     */
    public function isSelected($key): bool
    {
        return $key === 0
            ? $this->value === 0 || $this->value === '0'
            : $key == $this->value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.select');
    }
}
