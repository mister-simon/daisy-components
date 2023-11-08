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
        if ($color && ($typeEnum = Type::tryFrom($color))) {
            $this->neutral = $typeEnum === Type::NEUTRAL;
            $this->primary = $typeEnum === Type::PRIMARY;
            $this->secondary = $typeEnum === Type::SECONDARY;
            $this->accent = $typeEnum === Type::ACCENT;
            $this->info = $typeEnum === Type::INFO;
            $this->success = $typeEnum === Type::SUCCESS;
            $this->warning = $typeEnum === Type::WARNING;
            $this->error = $typeEnum === Type::ERROR;
            $this->ghost = $typeEnum === Type::GHOST;
        }

        $classes[] = match (true) {
            $this->neutral => 'badge-neutral',
            $this->primary => 'badge-primary',
            $this->secondary => 'badge-secondary',
            $this->accent => 'badge-accent',
            $this->info => 'badge-info',
            $this->success => 'badge-success',
            $this->warning => 'badge-warning',
            $this->error => 'badge-error',
            $this->ghost => 'badge-ghost',
            default => '',
        }

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

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.badge');
    }
}
