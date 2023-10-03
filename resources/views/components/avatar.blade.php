@php($mask ??= null)
<div {{ $attributes->merge($defaultAttributes) }}>
    @if ($mask ?? null)
        <div {{ $mask->attributes->class('') }}>
            {{ $mask }}
        </div>
    @else
        <div>
            {{ $slot }}
        </div>
    @endif
</div>
