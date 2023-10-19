<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Countdown extends Component
{
    public $defaultAttributes = [];

    public function __construct(
        public $count = null,
        public $from = null,
    ) {
        $classes = ['countdown'];

        if ($count !== null) {

            $this->defaultAttributes['x-data'] = "{ count: {$count} }";
        }

        $this->defaultAttributes = [
            ...$this->defaultAttributes,
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.countdown');
    }
}
