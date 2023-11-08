<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Badge extends Component
{
    public $defaultAttributes;

    public function __construct(
        // HTML tag to use
        public $tag = 'span',

        // Style
        public $color = null,

        public $neutral = null,
        public $primary = null,
        public $secondary = null,
        public $accent = null,
        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,
        public $ghost = null,

        // Outline
        public $outline = null,

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,
    ) {
        $classes = ['badge'];

        // Style
        $classes[] = match ($this->colorEnum()) {
            Type::NEUTRAL => 'badge-neutral',
            Type::PRIMARY => 'badge-primary',
            Type::SECONDARY => 'badge-secondary',
            Type::ACCENT => 'badge-accent',
            Type::INFO => 'badge-info',
            Type::SUCCESS => 'badge-success',
            Type::WARNING => 'badge-warning',
            Type::ERROR => 'badge-error',
            Type::GHOST => 'badge-ghost',
            default => '',
        };

        // Outline
        if ($outline) {
            $classes[] = 'badge-outline';
        }

        // Sizes
        $classes[] = match (true) {
            $lg => 'badge-lg',
            $md => 'badge-md',
            $sm => 'badge-sm',
            $xs => 'badge-xs',
            default => '',
        };

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    public function colorEnum()
    {
        return $this->color !== null
            ? Type::tryFrom($this->color)
            : match (true) {
                $this->neutral => Type::NEUTRAL,
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
        return view('daisy-components::components.badge');
    }
}
