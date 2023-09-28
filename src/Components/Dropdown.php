<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $openOnHover = false,
        public $closeOnBlur = true,
    ) {
        $classes = ['dropdown'];

        $this->defaultAttributes = ['class' => implode(' ', $classes)];

        // Open on hover
        if ($openOnHover) {
            $this->defaultAttributes['x-init'] = '';
            $this->defaultAttributes['x-on:mouseover'] = '$el.open = true';
            $this->defaultAttributes['x-on:mouseout'] = '$el.open = false';
        }

        // Close on blur
        if ($closeOnBlur) {
            $this->defaultAttributes['x-init'] = '';
            $this->defaultAttributes['x-on:click.outside'] = '$el.open = false';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.dropdown');
    }
}
