@php($figure ??= null)
@php($title ??= $attributes->get('title'))
@php($value ??= $attributes->get('value'))
@php($description ??= $attributes->get('description'))
@php($actions ??= null)
<div {{ $attributes->merge($defaultAttributes)->except(['title', 'value', 'description']) }}>
    {{ $slot }}
    @if ($figure)
        <div {{ $figure->attributes->class('stat-figure') }}>{{ $figure }}</div>
    @endif
    @if ($title !== null)
        @if (is_string($title))
            <div class="stat-title">{{ $title }}</div>
        @else
            <div {{ $title->attributes->class('stat-title') }}>{{ $title }}</div>
        @endif
    @endif
    @if ($value !== null)
        @if (is_string($value))
            <div class="stat-value">{{ $value }}</div>
        @else
            <div {{ $value->attributes->class('stat-value') }}>{{ $value }}</div>
        @endif
    @endif
    @if ($description !== null)
        @if (is_string($description))
            <div class="stat-description">{{ $description }}</div>
        @else
            <div {{ $description->attributes->class('stat-description') }}>{{ $description }}</div>
        @endif
    @endif
    @if ($actions)
        <div {{ $actions->attributes->class('stat-actions') }}>{{ $actions }}</div>
    @endif
</div>
