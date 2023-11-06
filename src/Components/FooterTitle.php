<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterTitle extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $center = null,
    ) {
        $classes = ['footer-title'];

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.footer-title');
    }
}
