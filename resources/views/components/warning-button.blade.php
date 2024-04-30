@props(['disabled' => false])

<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-warning']) }} {{ $disabled ? 'disabled' : '' }}>
    {{ $slot }}
</button>
