@php($name ??= $attributes->get('name', 'rating'))
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
        @for ($i = 1; $i < $max + 1; $i++)
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $i }}"
                @class($ratingClasses)
                @checked((int) $checked === $i) />
        @endfor
    @else
        {{ $slot }}
    @endif
</div>
