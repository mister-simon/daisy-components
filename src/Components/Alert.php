<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null
    ) {
        $classes = ['alert'];

        if ($info) {
            $classes[] = 'alert-info';
        } elseif ($success) {
            $classes[] = 'alert-success';
        } elseif ($warning) {
            $classes[] = 'alert-warning';
        } elseif ($error) {
            $classes[] = 'alert-error';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.alert');
    }
}
