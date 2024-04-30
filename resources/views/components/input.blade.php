@props(['disabled' => false, 'required' => false])

@php
    $attribute = $attributes->get('wire:model');
    $validateClass = $attribute && $errors->has($attribute) ? 'is-invalid' : '';
@endphp

<input
    {{ $required ? 'required' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => "form-control $validateClass"]) !!}
>
