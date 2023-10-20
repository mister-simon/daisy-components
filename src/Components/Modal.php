<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Modal extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $id = null,
        public $closeBackdrop = false,
        public $top = false,
        public $bottom = false,
    ) {
        if ($this->id === null) {
            $this->id = str(Str::uuid())
                ->camel()
                ->start('modal')
                ->toString();
        }

        $classes = ['modal'];

        if ($top) {
            $classes[] = 'modal-top';
        } elseif ($bottom) {
            $classes[] = 'modal-bottom';
        }

        $this->defaultAttributes = [
            'id' => $this->id,
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.modal');
    }
}
