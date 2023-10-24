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
        public $type = null,

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

        if ($type) {
            $this->primary = $type === Type::PRIMARY->value;
            $this->secondary = $type === Type::SECONDARY->value;
            $this->accent = $type === Type::ACCENT->value;
            $this->info = $type === Type::INFO->value;
            $this->success = $type === Type::SUCCESS->value;
            $this->warning = $type === Type::WARNING->value;
            $this->error = $type === Type::ERROR->value;
        }

        if ($this->primary) {
            $classes[] = 'toggle-primary';
        } elseif ($this->secondary) {
            $classes[] = 'toggle-secondary';
        } elseif ($this->accent) {
            $classes[] = 'toggle-accent';
        } elseif ($this->info) {
            $classes[] = 'toggle-info';
        } elseif ($this->success) {
            $classes[] = 'toggle-success';
        } elseif ($this->warning) {
            $classes[] = 'toggle-warning';
        } elseif ($this->error) {
            $classes[] = 'toggle-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'toggle-lg';
        } elseif ($md) {
            $classes[] = 'toggle-md';
        } elseif ($sm) {
            $classes[] = 'toggle-sm';
        } elseif ($xs) {
            $classes[] = 'toggle-xs';
        }

        $this->defaultAttributes = [
            'type' => 'checkbox',
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.toggle');
    }
}
