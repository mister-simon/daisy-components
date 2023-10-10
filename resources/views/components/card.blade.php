@php($img ??= null)
@php($imgEnd ??= false)
@php($title ??= null)
@php($actions ??= null)
<div {{ $attributes->merge($defaultAttributes) }}>
    @if ($img && $img?->attributes)
        <figure><img {{ $img->attributes->class('') }} /></figure>
    @endif
    <div @class(['card-body', $bodyClasses])>
        @if ($title)
            <{{ $title->attributes->get('tag', 'h2') }} {{ $title->attributes->class('card-title') }}>{{ $title }}</{{ $title->attributes->get('tag', 'h2') }}>
        @endif
        {{ $slot }}
        @if ($actions)
            <div {{ $actions->attributes->class('card-actions') }}>
                {{ $actions }}
            </div>
        @endif
    </div>
    @if ($imgEnd && $imgEnd?->attributes)
        <figure><img {{ $imgEnd->attributes->class('') }} /></figure>
    @endif
</div>
