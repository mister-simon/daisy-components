@php($toggle ??= new Illuminate\View\ComponentSlot())
@php($content ??= new Illuminate\View\ComponentSlot($slot->toHtml()))
@php($drawer ??= new Illuminate\View\ComponentSlot())
@php($drawerAttrs = $drawer->attributes->merge(['id' => $drawerId]))
<div {{ $attributes->merge($defaultAttributes) }}>
    <input
        {{ $toggle->attributes->merge([
                'type' => 'checkbox',
                'id' => $id,
                'x-data' => '',
                'x-on:keyup.enter' => '$el.click()',
                'aria-controls' => $drawerAttrs->get('id'),
            ])->class('drawer-toggle') }} />
    <div {{ $content->attributes->class('drawer-content') }}>
        {{ $content }}
    </div>
    <div {{ $drawerAttrs->class('drawer-side z-50') }}>
        <label for="{{ $id }}" aria-label="close sidebar" class="drawer-overlay"></label>
        {{ $drawer }}
    </div>
</div>
