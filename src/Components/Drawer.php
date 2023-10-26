<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Drawer extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $id = null,
        public $drawerId = null,
        public $end = null,
        public $forceOpen = null,
    ) {
        $classes = ['drawer'];

        if ($end) {
            $classes[] = 'drawer-end';
        }

        if ($forceOpen) {
            $classes[] = 'drawer-open';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->id ??= 'drawer';
        $this->drawerId ??= "drawer-{$this->id}";

        return view('daisy-components::components.drawer');
    }
}
