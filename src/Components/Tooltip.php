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
        public $type = null,

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
        if ($type && ($typeEnum = Type::tryFrom($type))) {
            $this->primary = $typeEnum === Type::PRIMARY;
            $this->secondary = $typeEnum === Type::SECONDARY;
            $this->accent = $typeEnum === Type::ACCENT;
            $this->info = $typeEnum === Type::INFO;
            $this->success = $typeEnum === Type::SUCCESS;
            $this->warning = $typeEnum === Type::WARNING;
            $this->error = $typeEnum === Type::ERROR;
        }

        if ($this->primary) {
            $classes[] = 'tooltip-primary';
        } elseif ($this->secondary) {
            $classes[] = 'tooltip-secondary';
        } elseif ($this->accent) {
            $classes[] = 'tooltip-accent';
        } elseif ($this->info) {
            $classes[] = 'tooltip-info';
        } elseif ($this->success) {
            $classes[] = 'tooltip-success';
        } elseif ($this->warning) {
            $classes[] = 'tooltip-warning';
        } elseif ($this->error) {
            $classes[] = 'tooltip-error';
        }

        if ($forceOpen) {
            $classes[] = 'tooltip-open';
        }

        $this->defaultAttributes = [
            'data-tip' => $this->tip,
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.tooltip');
    }
}
