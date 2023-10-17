<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RangeMeasure extends Component
{
    public function __construct(
        public $min = null,
        public $max = null,
        public $step = null,
        public $steps = null,
    ) {
        if ($max && $step) {
            $min ??= 0;
            $this->steps ??= ($max - $min) / $step;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.range-measure');
    }
}
