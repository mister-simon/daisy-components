<div {{ $attributes->merge($defaultAttributes) }}>
    <input type="checkbox" @checked($open) class="peer" />
    <div {{ $title->attributes->class(['collapse-title']) }}>{{ $title }}</div>
    @isset($content)
        <div {{ $content->attributes->class(['collapse-content']) }}>{{ $content }}</div>
    @else
        <div @class(['collapse-content'])>{{ $slot }}</div>
    @endisset
</div>
