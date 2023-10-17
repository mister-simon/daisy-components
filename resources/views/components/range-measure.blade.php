<div {{ $attributes->merge(['aria-hidden' => 'true'])->class('flex w-full justify-between px-2 select-none') }}>
    @for ($i = 0; $i < $steps + 1; $i++)
        <span>|</span>
    @endfor
</div>
