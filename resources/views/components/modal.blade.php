@php($hasModalContent = isset($modal))
@php($modal ??= new Illuminate\View\ComponentSlot($slot->toHtml()))
@if ($hasModalContent)
    {{ $slot }}
@endif
<dialog {{ $attributes->merge($defaultAttributes) }}>
    <div {{ $modal->attributes->class('modal-box') }}>
        {{ $modal }}

        @if ($actions ?? null)
            <div {{ $actions->attributes->class('modal-action') }}>
                {{ $actions }}
            </div>
        @endif
    </div>

    @if ($closeBackdrop)
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    @endif
</dialog>
