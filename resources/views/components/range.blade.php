<input {{ $attributes->merge($defaultAttributes) }} />
@if ($measure)
    <x-daisy-components::range-measure
        :max="$attributes->get('max', 100)"
        :step="$attributes->get('step', 1)"
        :class="$defaultMeasureClass()" />
@endif
