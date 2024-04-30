<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Consultar Armamento') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-sm-12 col-lg-8">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-cellphone"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="plate" wire:model="fullName" type="text" maxlength="161" placeholder="{{ __('Digite a Marca') }}" required />
                            <x-label>{{ __('Marca') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-devices"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="cpf" wire:model="cpf" type="text" maxlength="14" placeholder="{{ __('Digite o Modelo') }}" required />
                            <x-label>{{ __('Modelo') }}</x-label>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-cellphone-cog"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite o Número de série') }}" required />
                            <x-label required>{{ __('Número do Armamento:') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-2 mt-1">
                                <span class="badge bg-danger">{{ __('OCORRÊNCIAS:') }}</span>
                                <span class="badge bg-success">{{ __('NENHUMA') }}</span>
                            </div>

                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="form-password-toggle">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                        {{ __('Salvar') }}
                    </span>

                <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="save"></i>
            </x-success-button>
        </div>
    </form>
</div>
