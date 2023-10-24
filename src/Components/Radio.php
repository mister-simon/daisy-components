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
        $classes = ['radio'];

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
            $classes[] = 'radio-primary';
        } elseif ($this->secondary) {
            $classes[] = 'radio-secondary';
        } elseif ($this->accent) {
            $classes[] = 'radio-accent';
        } elseif ($this->info) {
            $classes[] = 'radio-info';
        } elseif ($this->success) {
            $classes[] = 'radio-success';
        } elseif ($this->warning) {
            $classes[] = 'radio-warning';
        } elseif ($this->error) {
            $classes[] = 'radio-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'radio-lg';
        } elseif ($md) {
            $classes[] = 'radio-md';
        } elseif ($sm) {
            $classes[] = 'radio-sm';
        } elseif ($xs) {
            $classes[] = 'radio-xs';
        }

        $this->defaultAttributes = [
            'type' => 'radio',
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.radio');
    }
}
