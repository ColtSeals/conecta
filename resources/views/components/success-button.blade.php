@props(['disabled' => false])

<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-success']) }} {{ $disabled ? 'disabled' : '' }}>
    {{ $slot }}
</button>
