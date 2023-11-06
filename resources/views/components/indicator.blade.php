@php($indicator ??= new Illuminate\View\ComponentSlot())
<div {{ $attributes->merge($defaultAttributes) }}>
    {{ $slot }}
    <div {{ $indicator->attributes->class($indicatorClasses) }}>{{ $indicator }}</div>
</div>
