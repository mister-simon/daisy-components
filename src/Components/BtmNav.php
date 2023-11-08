<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BtmNav extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $tag = 'div',

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,
    ) {
        $classes = ['btm-nav'];

        // Sizes
        $classes[] = match (true) {
            $lg => 'btm-nav-lg',
            $md => 'btm-nav-md',
            $sm => 'btm-nav-sm',
            $xs => 'btm-nav-xs',
            default => '',
        };

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.btm-nav');
    }
}
