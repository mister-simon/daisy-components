<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadialProgress extends Component
{
    public $defaultAttributes;

    public $styleAttributes;

    public function __construct(
        public $value = 0,
        public $size = null,
        public $thickness = null,
    ) {
        $options = collect([
            'value' => $value,
            'size' => $size,
            'thickness' => $thickness,
        ])
            ->whereNotNull();

        // "--value: 80; --size: 5rem"
        $this->styleAttributes = $options
            ->map(fn ($value, $key) => "--{$key}: {$value}")
            ->join('; ');

        // "value: '80', size: '5rem'"
        $alpineDataAttributes = $options
            ->map(fn ($value, $key) => "{$key}: '{$value}'")
            ->join(', ');

        // "'--value': value, '--size': size"
        $alpineStyleAttributes = $options
            ->map(fn ($value, $key) => "'--{$key}': {$key}")
            ->join(', ');

        $this->defaultAttributes = [
            'class' => 'radial-progress',

            // Render the count via alpine
            'x-data' => "{{$alpineDataAttributes}}",
            'x-modelable' => 'value',
            'x-bind:style' => "{{$alpineStyleAttributes}}",
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.radial-progress');
    }
}
