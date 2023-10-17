@php($text ??= $attributes->get('text'))
@php($textAlt ??= $attributes->get('text-alt'))
<label {{ $attributes->class('label')->except('text') }}>
    @if ($text !== null)
        @if (is_string($text))
            <div class="label-text">{{ $text }}</div>
        @else
            <div {{ $text->attributes->class('label-text') }}>{{ $text }}</div>
        @endif
    @endif
    {{ $slot }}
    @if ($textAlt !== null)
        @if (is_string($textAlt))
            <div class="label-text-alt">{{ $textAlt }}</div>
        @else
            <div {{ $textAlt->attributes->class('label-text') }}>{{ $textAlt }}</div>
        @endif
    @endif
</label>
