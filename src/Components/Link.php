<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Link extends Component
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

        // Show underline on hover
        public $hover = null,
    ) {
        $classes = ['link'];

        // Style
        $classes[] = match ($this->colorEnum()) {
            Type::NEUTRAL => 'link-neutral',
            Type::PRIMARY => 'link-primary',
            Type::SECONDARY => 'link-secondary',
            Type::ACCENT => 'link-accent',
            Type::INFO => 'link-info',
            Type::SUCCESS => 'link-success',
            Type::WARNING => 'link-warning',
            Type::ERROR => 'link-error',
            Type::GHOST => 'link-ghost',
            default => '',
        };

        if ($this->hover) {
            $classes[] = 'link-hover';
        }

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
        $this->tag ??= 'a';

        return view('daisy-components::components.link');
    }
}
