<div {{ $attributes->merge($defaultAttributes) }}>
    @isset($checkbox)
        <input {{ $checkbox->attributes->class('peer')->merge([
            'type' => 'checkbox',
        ]) }} @checked($open) />
    @else
        <input
            type="checkbox"
            @checked($open)
            class="peer" />
    @endisset
    <div {{ $title->attributes->class(['collapse-title']) }}>{{ $title }}</div>
    @isset($content)
        <div {{ $content->attributes->class(['collapse-content']) }}>{{ $content }}</div>
    @else
        <div @class(['collapse-content'])>{{ $slot }}</div>
    @endisset
</div>
