@props(['disabled' => false])

<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-info']) }} {{ $disabled ? 'disabled' : '' }}>
    {{ $slot }}
</button>
