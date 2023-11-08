<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Loading extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Style
        public $spinner = null,
        public $dots = null,
        public $ring = null,
        public $ball = null,
        public $bars = null,
        public $infinity = null,

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,

    ) {
        $classes = ['loading'];

        // Style
        $classes[] = match (true) {
            $this->spinner => 'loading-spinner',
            $this->dots => 'loading-dots',
            $this->ring => 'loading-ring',
            $this->ball => 'loading-ball',
            $this->bars => 'loading-bars',
            $this->infinity => 'loading-infinity',
            default => '',
        };

        // Sizes
        $classes[] = match (true) {
            $lg => 'loading-lg',
            $md => 'loading-md',
            $sm => 'loading-sm',
            $xs => 'loading-xs',
            default => '',
        };

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.loading');
    }
}
