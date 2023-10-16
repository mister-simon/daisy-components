<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Stats extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $vertical = null
    ) {

        $classes = ['stats'];

        if ($vertical) {
            $classes[] = 'stats-vertical';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.stats');
    }
}
