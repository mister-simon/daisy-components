<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Indicator extends Component
{
    public $defaultAttributes;

    public $indicatorClasses;

    public function __construct(
        // Position
        public $start = null,
        public $center = null,
        public $end = null,
        public $top = null,
        public $middle = null,
        public $bottom = null,
    ) {
        $classes = ['indicator'];
        $this->indicatorClasses = ['indicator-item'];

        // Position
        $this->indicatorClasses[] = match (true) {
            $start => 'indicator-start',
            $center => 'indicator-center',
            $end => 'indicator-end',
            default => '',
        };

        $this->indicatorClasses[] = match (true) {
            $top => 'indicator-top',
            $middle => 'indicator-middle',
            $bottom => 'indicator-bottom',
            default => '',
        };

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.indicator');
    }
}
