@if ($errors->any())
    <div {!! $attributes->merge(['class' => 'alert alert-solid-danger']) !!} role="alert">
        <div class="fw-bold">{{ __('Whoops! Something went wrong.') }}</div>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
