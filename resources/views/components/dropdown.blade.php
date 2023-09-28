<details {{ $attributes->merge($defaultAttributes) }}>
    <summary {{ $summary->attributes->class('btn') }}>{{ $summary }}</summary>
    <div {{ $content->attributes->class(['dropdown-content']) }}>{{ $content }}</div>
</details>
