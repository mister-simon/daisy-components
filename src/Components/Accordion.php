<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Accordion extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $open = false,
        public $forceOpen = false,
        public $forceClose = false,
        public $plus = null,
        public $arrow = null,
        public $name = null,
    ) {
        $classes = ['collapse'];

        if ($plus) {
            $classes[] = 'collapse-plus';
        } elseif ($arrow) {
            $classes[] = 'collapse-arrow';
        }

        if ($forceOpen) {
            $classes[] = 'collapse-open';
        } elseif ($forceClose) {
            $classes[] = 'collapse-close';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->name ??= 'accordion';

        return view('daisy-components::components.accordion');
    }
}
