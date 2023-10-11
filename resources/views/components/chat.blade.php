<div {{ $attributes->merge($defaultAttributes) }}>
    @isset($image)
        <div {{ $image->attributes->class('chat-image inline-flex items-end') }}>
            {{ $image }}
        </div>
    @endisset

    @isset($header)
        <div {{ $header->attributes->class('chat-header') }}>
            {{ $header }}
        </div>
    @endisset

    @isset($bubble)
        <div {{ $bubble->attributes->class($bubbleClasses) }}>
            {{ $bubble }}
        </div>
    @else
        <div @class($bubbleClasses)>
            {{ $slot }}
        </div>
    @endisset

    @isset($footer)
        <div {{ $footer->attributes->class('chat-footer') }}>
            {{ $footer }}
        </div>
    @endisset
</div>
