<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class FileInput extends Component
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
        $classes = ['file-input'];

        // Style
        if ($bordered) {
            $classes[] = 'file-input-bordered';
        }

        $classes[] = match ($this->colorEnum()) {
            Type::PRIMARY => 'file-input-primary',
            Type::SECONDARY => 'file-input-secondary',
            Type::ACCENT => 'file-input-accent',
            Type::INFO => 'file-input-info',
            Type::SUCCESS => 'file-input-success',
            Type::WARNING => 'file-input-warning',
            Type::ERROR => 'file-input-error',
            Type::GHOST => 'file-input-ghost',
            default => '',
        };

        // Sizes
        $classes[] = match (true) {
            $lg => 'file-input-lg',
            $md => 'file-input-md',
            $sm => 'file-input-sm',
            $xs => 'file-input-xs',
            default => '',
        };

        $this->defaultAttributes = [
            'type' => 'file',
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
        return view('daisy-components::components.file-input');
    }
}
