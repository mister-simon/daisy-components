<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Swap extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $checked = null,
        public $flip = null,
        public $rotate = null
    ) {
        $classes = ['swap'];

        if ($flip) {
            $classes[] = 'swap-flip';
        } elseif ($rotate) {
            $classes[] = 'swap-rotate';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.swap');
    }
}
