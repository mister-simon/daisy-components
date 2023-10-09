@php($on ??= null)
@php($off ??= null)
@php($indeterminate ??= null)
<label {{ $attributes->merge($defaultAttributes) }}>
    <input type="checkbox" @checked($checked) />
    @if ($on)
        <div {{ $on->attributes->class('swap-on') }}>{{ $on }}</div>
    @endif
    @if ($off)
        <div {{ $off->attributes->class('swap-off') }}>{{ $off }}</div>
    @else
        <div class="swap-off">{{ $slot }}</div>
    @endif
    @if ($indeterminate)
        <div {{ $indeterminate->attributes->class('swap-indeterminate') }}>{{ $indeterminate }}</div>
    @endif
</label>
