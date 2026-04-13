@props([
    'name',
    'flyout' => false,
    'position' => 'right',
    'footerClass' => 'flex items-center justify-end gap-2',
    'variant' => null,
])

@php
    $variant = $variant ?? ($flyout ? 'floating' : null);
@endphp

@isset($trigger)
    <flux:modal.trigger :name="$name">
        {{ $trigger }}
    </flux:modal.trigger>
@endisset

<flux:modal :name="$name" :flyout="$flyout" :position="$position" :variant="$variant"
    {{ $attributes }}>
    {{ $slot }}
</flux:modal>
