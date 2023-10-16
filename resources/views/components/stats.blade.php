<div {{ $attributes->merge($defaultAttributes)->except(['title', 'value', 'description']) }}>
    @if ($slot->isEmpty())
        <x-daisy-components::stat
            :title="$attributes->get('title')"
            :value="$attributes->get('value')"
            :description="$attributes->get('description')" />
    @else
        {{ $slot }}
    @endif
</div>
