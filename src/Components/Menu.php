<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,

        // Layout
        public $vertical = null,
        public $horizontal = null,
    ) {
        $classes = ['menu'];

        // Sizes
        $classes[] = match (true) {
            $lg => 'menu-lg',
            $md => 'menu-md',
            $sm => 'menu-sm',
            $xs => 'menu-xs',
            default => '',
        };

        // Layout
        if ($vertical) {
            $classes[] = 'menu-vertical';
        } elseif ($horizontal) {
            $classes[] = 'menu-horizontal';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.menu');
    }
}
