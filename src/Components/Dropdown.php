<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $hover = false,
        public $end = false,
        public $top = false,
        public $bottom = false,
        public $left = false,
        public $right = false,
        public $forceOpen = false,
    ) {
        $classes = ['dropdown'];

        if ($hover) {
            $classes[] = 'dropdown-hover';
        }

        if ($top) {
            $classes[] = 'dropdown-top';
        } elseif ($bottom) {
            $classes[] = 'dropdown-bottom';
        }

        if ($left) {
            $classes[] = 'dropdown-left';
        } elseif ($right) {
            $classes[] = 'dropdown-right';
        }

        if ($end) {
            $classes[] = 'dropdown-end';
        }

        if ($forceOpen) {
            $classes[] = 'dropdown-open';
        }

        $this->defaultAttributes = [
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.dropdown');
    }
}
