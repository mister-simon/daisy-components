<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Button extends Component
{
    public $defaultAttributes;

    public function __construct(
        // HTML tag to use
        public $tag = null,

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
        public $link = null,

        // Outline
        public $outline = null,

        // Statuses
        public $active = null,
        public $disabled = null,

        // Effects
        public $glass = null,
        public $noAnimation = null,

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,

        // Shapes / Layout
        public $wide = null,
        public $block = null,
        public $circle = null,
        public $square = null,
    ) {
        $classes = ['btn'];

        // Style
        $classes[] = match ($this->colorEnum()) {
            Type::NEUTRAL => 'btn-neutral',
            Type::PRIMARY => 'btn-primary',
            Type::SECONDARY => 'btn-secondary',
            Type::ACCENT => 'btn-accent',
            Type::INFO => 'btn-info',
            Type::SUCCESS => 'btn-success',
            Type::WARNING => 'btn-warning',
            Type::ERROR => 'btn-error',
            Type::GHOST => 'btn-ghost',
            Type::LINK => 'btn-link',
            default => '',
        };

        // Outline
        if ($outline) {
            $classes[] = 'btn-outline';
        }

        // Statuses
        if ($active) {
            $classes[] = 'btn-active';
        }

        if ($disabled) {
            $classes[] = 'btn-disabled';
        }

        // Effects
        if ($glass) {
            $classes[] = 'glass';
        }
        if ($noAnimation) {
            $classes[] = 'no-animation';
        }

        // Sizes
        $classes[] = match (true) {
            $lg => 'btn-lg',
            $md => 'btn-md',
            $sm => 'btn-sm',
            $xs => 'btn-xs',
            default => '',
        };

        // Shapes / Layout
        if ($wide) {
            $classes[] = 'btn-wide';
        }
        if ($block) {
            $classes[] = 'btn-block';
        }
        if ($circle) {
            $classes[] = 'btn-circle';
        } elseif ($square) {
            $classes[] = 'btn-square';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];

        if ($disabled) {
            $this->defaultAttributes['disabled'] = 'disabled';
        }
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
                $this->link => Type::LINK,
                default => null,
            };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->tag ??= 'button';

        return view('daisy-components::components.button');
    }
}
