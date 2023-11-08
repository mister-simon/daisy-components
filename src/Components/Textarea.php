<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Textarea extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Style
        public $bordered = null,

        public $color = null,

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

        if ($color && ($typeEnum = Type::tryFrom($color))) {
            $this->primary = $typeEnum === Type::PRIMARY;
            $this->secondary = $typeEnum === Type::SECONDARY;
            $this->accent = $typeEnum === Type::ACCENT;
            $this->info = $typeEnum === Type::INFO;
            $this->success = $typeEnum === Type::SUCCESS;
            $this->warning = $typeEnum === Type::WARNING;
            $this->error = $typeEnum === Type::ERROR;
            $this->ghost = $typeEnum === Type::GHOST;
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
        $classes[] = match (true) {
            $lg => 'textarea-lg',
            $md => 'textarea-md',
            $sm => 'textarea-sm',
            $xs => 'textarea-xs',
            default => '',
        };

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
