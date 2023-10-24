<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Artboard extends Component
{
    public $defaultAttributes;

    public function __construct(
        public ?int $size = null,
        public $horizontal = null,
        public $demo = null,
    ) {
        $classes = ['artboard'];

        if ($demo) {
            $classes[] = 'artboard-demo';
        }

        if ($horizontal) {
            $classes[] = 'artboard-horizontal';
        }

        $classes[] = match ($size) {
            default => '',
            1 => 'phone-1', // (320×568)
            2 => 'phone-2', // (375×667)
            3 => 'phone-3', // (414×736)
            4 => 'phone-4', // (375×812)
            5 => 'phone-5', // (414×896)
            6 => 'phone-6', // (320×1024)
        };

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.artboard');
    }
}
