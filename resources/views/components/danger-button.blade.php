@props(['disabled' => false])

<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-danger text-white text-uppercase']) }} {{ $disabled ? 'disabled' : '' }}>
    {{ $slot }}
</button>
