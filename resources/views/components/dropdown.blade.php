@php($content ??= new Illuminate\View\ComponentSlot($slot->toHtml()))
@php($contentTag = $content->attributes->get('tag', 'div'))
<div {{ $attributes->merge($defaultAttributes) }}>
    <label {{ $summary->attributes->merge(['tabindex' => '0']) }}>{{ $summary }}</label>
    <{{ $contentTag }} {{ $content->attributes->class(['dropdown-content z-[1]'])->except('tag') }}>{{ $content }}</{{ $contentTag }}>
</div>
