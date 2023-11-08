<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Tooltip extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Tip
        public $tip = '',

        // Position
        public $top = null,
        public $bottom = null,
        public $left = null,
        public $right = null,

        // Style
        public $color = null,

        public $primary = null,
        public $secondary = null,
        public $accent = null,
        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,

        // Force open
        public $forceOpen = null,
    ) {
        $classes = ['tooltip'];

        // Position
        if ($top) {
            $classes[] = 'tooltip-top';
        } elseif ($bottom) {
            $classes[] = 'tooltip-bottom';
        } elseif ($left) {
            $classes[] = 'tooltip-left';
        } elseif ($right) {
            $classes[] = 'tooltip-right';
        }

        // Style
        $classes[] = match ($this->colorEnum()) {
            Type::PRIMARY => 'tooltip-primary',
            Type::SECONDARY => 'tooltip-secondary',
            Type::ACCENT => 'tooltip-accent',
            Type::INFO => 'tooltip-info',
            Type::SUCCESS => 'tooltip-success',
            Type::WARNING => 'tooltip-warning',
            Type::ERROR => 'tooltip-error',
            default => '',
        };

        if ($forceOpen) {
            $classes[] = 'tooltip-open';
        }

        $this->defaultAttributes = [
            'data-tip' => $this->tip,
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
        return view('daisy-components::components.tooltip');
    }
}
