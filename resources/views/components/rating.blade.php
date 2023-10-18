@php($count = $half ? $max * 2 : $max)
@php($step = $half ? 0.5 : 1)
@php($start = $half ? 0.5 : 1)
@php($name ??= $attributes->get('name', 'rating'))
@php($ratingClasses = \Illuminate\Support\Arr::wrap($ratingClasses))
<div {{ $attributes->merge($defaultAttributes)->except(['name']) }}>
    @if ($hidden)
        <input
            type="radio"
            name="{{ $name }}"
            value="0"
            class="rating-hidden"
            @checked($checked === null || (int) $checked === 0) />
    @endif
    @if ($slot->isEmpty())
        @for ($i = $start; $i < $max + $step; $i += $step)
            @php($isOdd = ($i / $step) % 2)
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $i }}"
                @class([
                    ...$ratingClasses,
                    'mask-half-1' => $half && $isOdd,
                    'mask-half-2' => $half && !$isOdd,
                ])
                @checked((int) $checked === $i) />
        @endfor
    @else
        {{ $slot }}
    @endif
</div>
