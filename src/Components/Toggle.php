<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Toggle extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Style
        public $color = null,

        public $primary = null,
        public $secondary = null,
        public $accent = null,
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
        $classes = ['toggle'];

        // Style
        $classes[] = match ($this->colorEnum()) {
            Type::PRIMARY => 'toggle-primary',
            Type::SECONDARY => 'toggle-secondary',
            Type::ACCENT => 'toggle-accent',
            Type::INFO => 'toggle-info',
            Type::SUCCESS => 'toggle-success',
            Type::WARNING => 'toggle-warning',
            Type::ERROR => 'toggle-error',
            default => '',
        };

        // Sizes
        $classes[] = match (true) {
            $lg => 'toggle-lg',
            $md => 'toggle-md',
            $sm => 'toggle-sm',
            $xs => 'toggle-xs',
            default => '',
        };

        $this->defaultAttributes = [
            'type' => 'checkbox',
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
                default => null,
            };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.toggle');
    }
}
