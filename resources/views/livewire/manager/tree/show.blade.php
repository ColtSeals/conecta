<div>
    <h4 class="py-1 d-flex justify-content-lg-between flex-column flex-sm-row align-items-center">
        <span>
            <i class="mdi mdi-tree-outline fs-2"></i>
            <span class="text-muted fw-light">{{ __('Árvore') }} / {{ $tree->nature->code }} /</span> {{ $tree->name }}
        </span>

        <x-secondary-button class="mt-2 mt-sm-0 ms-sm-2" wire:click="showCreateQuestion">
            <span class="mdi mdi-progress-question me-2"></span>
            {{ __('Cadastrar Perguntas') }}
        </x-secondary-button>

    </h4>

    @push('custom-style')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    @endpush

    @push('custom-script')
        <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
        <script src="{{ asset('assets/js/pages/tree-manager.js') }}"></script>
    @endpush

    <div class="row">
        <div class="col-12">
            @livewire('manager.tree.question.table', ['tree' => $tree])
        </div>
    </div>
</div>
