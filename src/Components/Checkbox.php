<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
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
        $classes = ['checkbox'];

        // Style
        if ($type) {
            $this->primary = $type === 'primary';
            $this->secondary = $type === 'secondary';
            $this->accent = $type === 'accent';
            $this->info = $type === 'info';
            $this->success = $type === 'success';
            $this->warning = $type === 'warning';
            $this->error = $type === 'error';
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
