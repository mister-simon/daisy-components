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
        public $link = null,

        // Show underline on hover
        public $hover = null,
    ) {
        $classes = ['link'];

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
        }

        if ($this->neutral) {
            $classes[] = 'link-neutral';
        } elseif ($this->primary) {
            $classes[] = 'link-primary';
        } elseif ($this->secondary) {
            $classes[] = 'link-secondary';
        } elseif ($this->accent) {
            $classes[] = 'link-accent';
        } elseif ($this->info) {
            $classes[] = 'link-info';
        } elseif ($this->success) {
            $classes[] = 'link-success';
        } elseif ($this->warning) {
            $classes[] = 'link-warning';
        } elseif ($this->error) {
            $classes[] = 'link-error';
        }

        if ($this->hover) {
            $classes[] = 'link-hover';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
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
