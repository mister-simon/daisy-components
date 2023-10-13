<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Progress extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Style
        public $primary = null,
        public $secondary = null,
        public $accent = null,
        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,
    ) {
        $classes = ['progress'];

        if ($primary) {
            $classes[] = 'progress-primary';
        } elseif ($secondary) {
            $classes[] = 'progress-secondary';
        } elseif ($accent) {
            $classes[] = 'progress-accent';
        } elseif ($info) {
            $classes[] = 'progress-info';
        } elseif ($success) {
            $classes[] = 'progress-success';
        } elseif ($warning) {
            $classes[] = 'progress-warning';
        } elseif ($error) {
            $classes[] = 'progress-error';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.progress');
    }
}
