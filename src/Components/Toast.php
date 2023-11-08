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
        $classes[] = match (true) {
            $start => 'toast-start',
            $center => 'toast-center',
            $end => 'toast-end',
            default => '',
        };

        $classes[] = match (true) {
            $top => 'toast-top',
            $middle => 'toast-middle',
            $bottom => 'toast-bottom',
            default => '',
        };

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
