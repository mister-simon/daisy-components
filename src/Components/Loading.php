<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Loading extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Style
        public $spinner = null,
        public $dots = null,
        public $ring = null,
        public $ball = null,
        public $bars = null,
        public $infinity = null,

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,

    ) {
        $classes = ['loading'];

        // Style
        if ($spinner) {
            $classes[] = 'loading-spinner';
        } elseif ($dots) {
            $classes[] = 'loading-dots';
        } elseif ($ring) {
            $classes[] = 'loading-ring';
        } elseif ($ball) {
            $classes[] = 'loading-ball';
        } elseif ($bars) {
            $classes[] = 'loading-bars';
        } elseif ($infinity) {
            $classes[] = 'loading-infinity';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'loading-lg';
        } elseif ($md) {
            $classes[] = 'loading-md';
        } elseif ($sm) {
            $classes[] = 'loading-sm';
        } elseif ($xs) {
            $classes[] = 'loading-xs';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.loading');
    }
}
