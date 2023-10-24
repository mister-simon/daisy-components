<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Style
        public $bordered = null,

        public $type = null,

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
        $classes = ['textarea'];

        // Style
        if ($bordered) {
            $classes[] = 'textarea-bordered';
        }

        if ($type) {
            $this->primary = $type === 'primary';
            $this->secondary = $type === 'secondary';
            $this->accent = $type === 'accent';
            $this->info = $type === 'info';
            $this->success = $type === 'success';
            $this->warning = $type === 'warning';
            $this->error = $type === 'error';
            $this->ghost = $type === 'ghost';
        }

        if ($this->primary) {
            $classes[] = 'textarea-primary';
        } elseif ($this->secondary) {
            $classes[] = 'textarea-secondary';
        } elseif ($this->accent) {
            $classes[] = 'textarea-accent';
        } elseif ($this->ghost) {
            $classes[] = 'textarea-ghost';
        } elseif ($this->info) {
            $classes[] = 'textarea-info';
        } elseif ($this->success) {
            $classes[] = 'textarea-success';
        } elseif ($this->warning) {
            $classes[] = 'textarea-warning';
        } elseif ($this->error) {
            $classes[] = 'textarea-error';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'textarea-lg';
        } elseif ($md) {
            $classes[] = 'textarea-md';
        } elseif ($sm) {
            $classes[] = 'textarea-sm';
        } elseif ($xs) {
            $classes[] = 'textarea-xs';
        }

        $this->defaultAttributes = [
            'type' => 'text',
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.textarea');
    }
}
