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
        public $type = null,

        public $primary = null,
        public $secondary = null,
        public $accent = null,
        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,
    ) {
        $classes = ['progress'];

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
            $classes[] = 'progress-primary';
        } elseif ($this->secondary) {
            $classes[] = 'progress-secondary';
        } elseif ($this->accent) {
            $classes[] = 'progress-accent';
        } elseif ($this->info) {
            $classes[] = 'progress-info';
        } elseif ($this->success) {
            $classes[] = 'progress-success';
        } elseif ($this->warning) {
            $classes[] = 'progress-warning';
        } elseif ($this->error) {
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
