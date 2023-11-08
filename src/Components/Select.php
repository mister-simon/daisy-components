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
        $classes[] = match ($this->colorEnum()) {
            Type::PRIMARY => 'select-primary',
            Type::SECONDARY => 'select-secondary',
            Type::ACCENT => 'select-accent',
            Type::INFO => 'select-info',
            Type::SUCCESS => 'select-success',
            Type::WARNING => 'select-warning',
            Type::ERROR => 'select-error',
            Type::GHOST => 'select-ghost',
            default => '',
        };

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

    public function colorEnum()
    {
        return $this->color !== null
            ? Type::tryFrom($this->color)
            : match (true) {
                $this->primary => Type::PRIMARY,
                $this->secondary => Type::SECONDARY,
                $this->accent => Type::ACCENT,
                $this->info => Type::INFO,
                $this->success => Type::SUCCESS,
                $this->warning => Type::WARNING,
                $this->error => Type::ERROR,
                $this->ghost => Type::GHOST,
                default => null,
            };
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
