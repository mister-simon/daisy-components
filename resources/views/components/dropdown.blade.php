<div {{ $attributes->merge($defaultAttributes) }}>
    <label {{ $summary->attributes->class('btn')->merge(['tabindex' => '0']) }}>{{ $summary }}</label>
    <div {{ $content->attributes->class(['dropdown-content z-[1]']) }}>{{ $content }}</div>
</div>
