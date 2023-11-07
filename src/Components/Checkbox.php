<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Checkbox extends Component
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
        $classes = ['checkbox'];

        // Style
        if ($color && ($typeEnum = Type::tryFrom($color))) {
            $this->primary = $typeEnum === Type::PRIMARY;
            $this->secondary = $typeEnum === Type::SECONDARY;
            $this->accent = $typeEnum === Type::ACCENT;
            $this->info = $typeEnum === Type::INFO;
            $this->success = $typeEnum === Type::SUCCESS;
            $this->warning = $typeEnum === Type::WARNING;
            $this->error = $typeEnum === Type::ERROR;
        }

        if ($this->primary) {
            $classes[] = 'checkbox-primary';
        } elseif ($this->secondary) {
            $classes[] = 'checkbox-secondary';
        } elseif ($this->accent) {
            $classes[] = 'checkbox-accent';
        } elseif ($this->info) {
            $classes[] = 'checkbox-info';
        } elseif ($this->success) {
            $classes[] = 'checkbox-success';
        } elseif ($this->warning) {
            $classes[] = 'checkbox-warning';
        } elseif ($this->error) {
            $classes[] = 'checkbox-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'checkbox-lg';
        } elseif ($md) {
            $classes[] = 'checkbox-md';
        } elseif ($sm) {
            $classes[] = 'checkbox-sm';
        } elseif ($xs) {
            $classes[] = 'checkbox-xs';
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
        return view('daisy-components::components.checkbox');
    }
}
