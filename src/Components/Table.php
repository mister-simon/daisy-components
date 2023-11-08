<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $zebra = null,

        // Pin
        public $pinRows = null,
        public $pinCols = null,

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,
    ) {
        $classes = ['table'];

        if ($zebra) {
            $classes[] = 'table-zebra';
        }

        // Pin
        if ($pinRows) {
            $classes[] = 'table-pin-rows';
        }
        if ($pinCols) {
            $classes[] = 'table-pin-cols';
        }

        // Sizes
        $classes[] = match (true) {
            $lg => 'table-lg',
            $md => 'table-md',
            $sm => 'table-sm',
            $xs => 'table-xs',
            default => '',
        };

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.table');
    }
}
