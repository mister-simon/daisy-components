<span {{ $attributes->merge($defaultAttributes) }}>
    @if ($slot->isEmpty())
        <x-daisy-components::countdown-item
            :count="$count"
            :from="$from"
            x-model="count" />
    @else
        {{ $slot }}
    @endif
</span>
