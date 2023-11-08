<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Radio extends Component
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
        $classes = ['radio'];

        // Style
        $classes[] = match ($this->colorEnum()) {
            Type::PRIMARY => 'radio-primary',
            Type::SECONDARY => 'radio-secondary',
            Type::ACCENT => 'radio-accent',
            Type::INFO => 'radio-info',
            Type::SUCCESS => 'radio-success',
            Type::WARNING => 'radio-warning',
            Type::ERROR => 'radio-error',
            default => '',
        };

        // Sizes
        $classes[] = match (true) {
            $lg => 'radio-lg',
            $md => 'radio-md',
            $sm => 'radio-sm',
            $xs => 'radio-xs',
            default => '',
        };

        $this->defaultAttributes = [
            'type' => 'radio',
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
        return view('daisy-components::components.radio');
    }
}
