<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CountdownItem extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $count = 0,
    ) {
        $this->defaultAttributes = [
            // Render the count by default
            'style' => "--value: {$count}",
            'aria-label' => $count ?: '0',

            // Render the count via alpine
            'x-data' => "{ itemCount: {$count} }",
            'x-modelable' => 'itemCount',
            'x-bind:style' => "{ '--value': itemCount }",
            'x-bind:aria-label' => 'itemCount',
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.countdown-item');
    }
}
