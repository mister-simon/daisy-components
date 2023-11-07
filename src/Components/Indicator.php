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
        if ($start) {
            $this->indicatorClasses[] = 'indicator-start';
        } elseif ($center) {
            $this->indicatorClasses[] = 'indicator-center';
        } elseif ($end) {
            $this->indicatorClasses[] = 'indicator-end';
        }

        if ($top) {
            $this->indicatorClasses[] = 'indicator-top';
        } elseif ($middle) {
            $this->indicatorClasses[] = 'indicator-middle';
        } elseif ($bottom) {
            $this->indicatorClasses[] = 'indicator-bottom';
        }

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
