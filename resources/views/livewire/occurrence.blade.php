<div>
    <h4 class="d-flex justify-content-lg-center flex-column flex-sm-row align-items-center">
         <span>
            <span>{{ __('Cadastro de Ocorrência') }}
        </span>
    </h4>

    @push('custom-style')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    @endpush

    @push('custom-script')
        <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
        <script src="{{ asset('assets/js/mask.js') }}"></script>

    @endpush



    @push('custom-script')
        <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
        <script src="{{ asset('assets/js/pages/tree.js') }}"></script>
    @endpush

    <div class="row">
        <div class="col-12">
            <livewire:occurrence.form />
        </div>
    </div>

</div>
