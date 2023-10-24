<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

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
            $this->primary = $type === Type::PRIMARY->value;
            $this->secondary = $type === Type::SECONDARY->value;
            $this->accent = $type === Type::ACCENT->value;
            $this->info = $type === Type::INFO->value;
            $this->success = $type === Type::SUCCESS->value;
            $this->warning = $type === Type::WARNING->value;
            $this->error = $type === Type::ERROR->value;
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
