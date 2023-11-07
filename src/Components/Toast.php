<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toast extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Position
        public $start = null,
        public $center = null,
        public $end = null,
        public $top = null,
        public $middle = null,
        public $bottom = null,
    ) {
        $classes = ['toast'];

        // Position
        if ($start) {
            $classes[] = 'toast-start';
        } elseif ($center) {
            $classes[] = 'toast-center';
        } elseif ($end) {
            $classes[] = 'toast-end';
        }

        if ($top) {
            $classes[] = 'toast-top';
        } elseif ($middle) {
            $classes[] = 'toast-middle';
        } elseif ($bottom) {
            $classes[] = 'toast-bottom';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.toast');
    }
}
