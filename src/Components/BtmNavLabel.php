<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BtmNavLabel extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $tag = 'span',
    ) {
        $classes = ['btm-nav-label'];

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.btm-nav-label');
    }
}
