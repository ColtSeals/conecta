@props(['value', 'required' => false])

<label {{ $attributes }}>
    {{ $value ?? $slot }} {!! $required ? '<span class="text-danger">*</span> ' : '' !!}
</label>
