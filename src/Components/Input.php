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
        $classes[] = match ($this->colorEnum()) {
            Type::PRIMARY => 'input-primary',
            Type::SECONDARY => 'input-secondary',
            Type::ACCENT => 'input-accent',
            Type::INFO => 'input-info',
            Type::SUCCESS => 'input-success',
            Type::WARNING => 'input-warning',
            Type::ERROR => 'input-error',
            Type::GHOST => 'input-ghost',
            default => '',
        };

        // Sizes
        $classes[] = match (true) {
            $lg => 'input-lg',
            $md => 'input-md',
            $sm => 'input-sm',
            $xs => 'input-xs',
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
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.input');
    }
}
