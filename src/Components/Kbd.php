<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Kbd extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,
    ) {
        $classes = ['kbd'];

        // Sizes
        if ($lg) {
            $classes[] = 'kbd-lg';
        } elseif ($md) {
            $classes[] = 'kbd-md';
        } elseif ($sm) {
            $classes[] = 'kbd-sm';
        } elseif ($xs) {
            $classes[] = 'kbd-xs';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.kbd');
    }
}
