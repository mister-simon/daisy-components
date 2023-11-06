<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Join extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $vertical = null,
        public $horizontal = null,
    ) {
        $classes = ['join'];

        if ($vertical) {
            $classes[] = 'join-vertical';
        } elseif ($horizontal) {
            $classes[] = 'join-horizontal';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.join');
    }
}
