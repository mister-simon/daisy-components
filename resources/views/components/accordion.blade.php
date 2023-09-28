<div {{ $attributes->merge($defaultAttributes) }}>
    <input type="radio" name="{{ $group }}" @checked($open) />
    <div {{ $title->attributes->class(['collapse-title']) }}>{{ $title }}</div>
    <div {{ $content->attributes->class(['collapse-content']) }}>{{ $content }}</div>
</div>
