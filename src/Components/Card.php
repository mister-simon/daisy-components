<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $compact = null,
        public $bordered = null,
        public $imgFull = null,
        public $imgSide = null,
        public $bodyClasses = '',
        public $imgClasses = '',
        public $imgEndClasses = '',
    ) {
        $classes = ['card'];

        if ($compact) {
            $classes[] = 'card-compact';
        }

        if ($bordered) {
            $classes[] = 'card-bordered';
        }

        if ($imgFull) {
            $classes[] = 'image-full';
        } elseif ($imgSide) {
            $classes[] = 'card-side';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.card');
    }
}
