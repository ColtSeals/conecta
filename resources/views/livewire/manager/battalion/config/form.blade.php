<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-cogs fs-3"></span>
            {{ __('Configurar') }} {{ $battalion->name }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                @foreach(\App\Models\OccurrenceAlert::query()->where('gravity', false)->get() as $alert)
                    <div class="col-12">
                        <div class="form-floating form-floating-outline">
                            <x-input />
                            <x-label>{{ $alert->name }}</x-label>
                        </div>
                    </div>
                @endforeach

                <hr class="m-0 mt-3">

                @foreach($options as $index => $option)
                    <div class="col-sm-12 col-lg-2">
                        <div class="form-floating form-floating-outline">
                            <x-input value="{{ $option['name'] }}" readonly />
                            <x-label>{{ __('Companhia') }}</x-label>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-8">
                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="options.{{ $index }}.file" type="file" accept=".xml,.kml" required />
                            <x-label>{{ __('Polígono') }}</x-label>

                            <x-input-error for="options.{{ $index }}.file" />
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-1">
                        <x-info-button class="btn-xl waves-effect w-100">
                            <i class="mdi mdi-text-box-edit-outline"></i>
                        </x-info-button>
                    </div>

                    <div class="col-sm-12 col-lg-1">
                        @if($loop->last)
                            <x-success-button wire:click="addOption" class="btn-xl waves-effect w-100"
                                              data-bs-toggle="tooltip"
                                              data-bs-placement="top"
                                              data-bs-original-title="{{ __('Adicionar Companhia') }}"
                            >
                                <i class="mdi mdi-plus"></i>
                            </x-success-button>
                        @else
                            <x-danger-button wire:click="removeOption({{ $index }})" class="btn-xl waves-effect w-100"
                                             data-bs-toggle="tooltip"
                                             data-bs-placement="top"
                                             data-bs-original-title="{{ __('Remover Companhia') }}"
                            >
                                <i class="mdi mdi-close"></i>
                            </x-danger-button>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <hr class="m-0 mt-1">

        <div class="modal-footer d-flex justify-content-between mt-3">
            <x-danger-button data-bs-dismiss="modal">
                <i class="mdi mdi-close me-sm-1 me-0"></i>

                <span class="align-middle d-sm-inline-block d-none">
                    {{ __('Fechar') }}
                </span>
            </x-danger-button>

            <x-success-button type="submit" wire:target="save" wire:loading.attr="disabled">
                <span class="align-middle d-sm-inline-block d-none me-sm-1">
                    <span wire:target="save" wire:loading class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    {{ __('Salvar Configuração') }}
                </span>

                <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="save"></i>
            </x-success-button>
        </div>
    </form>
</div>
