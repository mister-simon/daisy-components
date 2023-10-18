<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Rating extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Max rating
        public $max = null,

        // Half ratings?
        public $half = null,

        // Add a hidden 0 value?
        public $hidden = null,

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,

        // Rating classes
        public $ratingClasses = null,

        // Which item is checked
        public $checked = null,
    ) {
        $classes = ['rating'];

        // Half Sizes
        if ($half) {
            $classes[] = 'rating-half';
        }

        // Sizes
        if ($lg) {
            $classes[] = 'rating-lg';
        } elseif ($md) {
            $classes[] = 'rating-md';
        } elseif ($sm) {
            $classes[] = 'rating-sm';
        } elseif ($xs) {
            $classes[] = 'rating-xs';
        }

        $this->defaultAttributes = [
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->max ??= 5;
        $this->ratingClasses ??= ['mask mask-star-2'];

        return view('daisy-components::components.rating');
    }
}
