<div>
    <h4 class="py-1 d-flex justify-content-lg-between flex-column flex-sm-row align-items-center">
        <span>
            <span class="text-muted fw-light"></span> {{ __('Gerenciar Batalhão') }}
        </span>

        <div class="btn-group">
            <x-secondary-button wire:click="showSpecialty">
                {{ __('Cadastrar Especialidade') }}
            </x-secondary-button>

            <x-secondary-button wire:click="showBattalion">
                {{ __('Cadastrar Batalhão') }}
            </x-secondary-button>
        </div>
    </h4>

    @push('custom-style')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    @endpush

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header p-0">
                    <div class="nav-align-top">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link active waves-effect" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-battalion" aria-controls="navs-top-battalion" aria-selected="true">
                                    {{ __('Batalhões') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link waves-effect" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-specialty" aria-controls="navs-top-specialty" aria-selected="false" tabindex="-1">
                                    {{ __('Especialidades') }}
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="navs-top-battalion" role="tabpanel">
                        <livewire:manager.battalion.table />
                    </div>

                    <div class="tab-pane fade" id="navs-top-specialty" role="tabpanel">
                        <livewire:manager.battalion.specialty.table />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('custom-script')
        <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>

    @endpush
</div>
