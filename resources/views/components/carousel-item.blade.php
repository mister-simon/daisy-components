@aware(['vertical'])
<div {{ $attributes->class(['h-full' => $vertical])->merge($defaultAttributes) }}>
    {{ $slot }}
</div>
