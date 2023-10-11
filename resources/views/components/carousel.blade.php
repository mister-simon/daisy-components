<div {{ $attributes->merge($defaultAttributes) }}>
    {{ $slot }}
</div>
@isset($outerControls)
    {{ $outerControls }}
@endisset
