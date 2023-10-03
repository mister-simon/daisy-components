<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Avatar extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $online = null,
    ) {
        $classes = ['avatar placeholder'];

        if ($online !== null) {
            $classes[] = $online
                ? 'avatar-online'
                : 'avatar-offline';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.avatar');
    }
}
