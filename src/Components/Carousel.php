<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Carousel extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $id = null,
        public $center = null,
        public $end = null,
        public $vertical = null,
    ) {
        $this->id ??= Str::uuid();
        $this->id = str($this->id)
            ->camel()
            ->start('carousel')
            ->toString();

        $classes = ['carousel'];

        if ($center) {
            $classes[] = 'carousel-center';
        } elseif ($end) {
            $classes[] = 'carousel-end';
        }

        if ($vertical) {
            $classes[] = 'carousel-vertical';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.carousel');
    }
}
