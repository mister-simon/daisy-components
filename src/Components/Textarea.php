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

        $classes[] = match ($this->colorEnum()) {
            Type::PRIMARY => 'textarea-primary',
            Type::SECONDARY => 'textarea-secondary',
            Type::ACCENT => 'textarea-accent',
            Type::INFO => 'textarea-info',
            Type::SUCCESS => 'textarea-success',
            Type::WARNING => 'textarea-warning',
            Type::ERROR => 'textarea-error',
            Type::GHOST => 'textarea-ghost',
            default => '',
        };

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

    public function colorEnum()
    {
        return $this->color !== null
            ? Type::tryFrom($this->color)
            : match (true) {
                $this->primary => Type::PRIMARY,
                $this->secondary => Type::SECONDARY,
                $this->accent => Type::ACCENT,
                $this->info => Type::INFO,
                $this->success => Type::SUCCESS,
                $this->warning => Type::WARNING,
                $this->error => Type::ERROR,
                $this->ghost => Type::GHOST,
                default => null,
            };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.textarea');
    }
}
