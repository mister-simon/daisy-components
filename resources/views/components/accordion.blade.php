<div {{ $attributes->merge($defaultAttributes) }}>
    @isset($radio)
        <input {{ $radio->attributes->class('peer')->merge([
            'type' => 'radio',
            'name' => $name,
        ]) }} @checked($open) />
    @else
        <input
            type="radio"
            name="{{ $name }}"
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
