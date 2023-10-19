@php($count = $half ? $max * 2 : $max)
@php($step = $half ? 0.5 : 1)
@php($ratingClasses = \Illuminate\Support\Arr::wrap($ratingClasses))
@php($rating ??= new Illuminate\View\ComponentSlot(attributes: ['name' => $name]))
<div {{ $attributes->merge($defaultAttributes)->except(['x-model']) }}>
    @if ($hidden)
        <input
            type="radio"
            name="{{ $name }}"
            value="0"
            class="rating-hidden"
            @checked($checked === null || (int) $checked === 0)
            {{ $rating->attributes->merge([
                    'x-model' => $attributes->get('x-model'),
                ])->only('x-model') }} />
    @endif
    @if ($slot->isEmpty())
        @for ($i = $step; $i < $max + $step; $i += $step)
            @php($isOdd = ($i / $step) % 2)
            <input {{ $rating->attributes->class([...$ratingClasses, 'mask-half-1' => $half && $isOdd, 'mask-half-2' => $half && !$isOdd])->merge([
                    'x-model' => $attributes->get('x-model'),
                ])->merge([
                    'type' => 'radio',
                    'name' => $name,
                    'value' => $i,
                ])->except(['checked']) }}
                @checked((float) $checked === (float) $i) />
        @endfor
    @else
        {{ $slot }}
    @endif
</div>
