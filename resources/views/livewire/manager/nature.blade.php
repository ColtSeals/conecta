<div>
    <h4 class="py-1 d-flex justify-content-lg-between flex-column flex-sm-row align-items-center">
        <span>
            <span class="mdi mdi-pine-tree-variant-outline fs-2"></span>
            <span class="text-muted fw-light">{{ __('STQ') }} /</span> {{ __('Gerenciar Natureza') }}
        </span>

        <x-secondary-button wire:click="$dispatch('showModal', { alias: 'manager.nature.form', maxWidth: 'xl' })">
            <span class="mdi mdi-vector-polyline-plus me-2"></span>
            {{ __('Cadastrar Natureza') }}
        </x-secondary-button>
    </h4>

    @push('custom-style')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    @endpush

    @push('custom-script')
        <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
        <script src="{{ asset('assets/js/pages/nature.js') }}"></script>
    @endpush

    <div class="row">
        <div class="col-12">
            @livewire('manager.nature.table')
        </div>
    </div>
</div>
