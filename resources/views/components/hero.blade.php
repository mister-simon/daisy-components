<div {{ $attributes->merge($defaultAttributes) }}>
    @if ($overlay)
        @php
            $overlay = is_a($overlay, Illuminate\View\ComponentSlot::class) ? $overlay : new Illuminate\View\ComponentSlot();
        @endphp
        <div {{ $overlay->attributes->class('hero-overlay') }}>{{ $overlay }}</div>
    @endif
    <div class="hero-content">{{ $slot }}</div>
</div>
