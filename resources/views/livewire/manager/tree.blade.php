<div>
    <h4 class="py-1 d-flex justify-content-lg-between flex-column flex-sm-row align-items-center">
        <span>
            <i class="mdi mdi-tree-outline fs-2"></i>
            <span class="text-muted fw-light">{{ __('STQ') }} /</span> {{ __('Gerenciar Árvore') }}
        </span>

        <x-secondary-button wire:click="showTree">
            <span class="mdi mdi-pencil-plus-outline me-2"></span>
            {{ __('Cadastrar Árvore') }}
        </x-secondary-button>
    </h4>

    @push('custom-style')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    @endpush

    @push('custom-script')
        <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
        <script src="{{ asset('assets/js/pages/tree.js') }}"></script>
    @endpush

    <div class="row">
        <div class="col-12">
            @livewire('manager.tree.table')
        </div>
    </div>

    <div class="modal fade fadeIn" id="modal-create">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                @livewire('manager.tree.form')
            </div>
        </div>
    </div>
</div>
