<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Consultar Veículos') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-card-bulleted-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="plate" wire:model="fullName" type="text" maxlength="161" placeholder="{{ __('Digite a Placa') }}" required />
                            <x-label>{{ __('Placa') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite o Chassi') }}" required />
                            <x-label>{{ __('Chassi') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-cog"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="cpf" wire:model="cpf" type="text" maxlength="14" placeholder="{{ __('Digite a Marca') }}" required />
                            <x-label>{{ __('Marca') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-info"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite o Modelo') }}" required />
                            <x-label>{{ __('Modelo') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-1">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('UF do Veículo') }}" required />
                            <x-label>{{ __('UF') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-format-color-fill"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite a Cor') }}" required />
                            <x-label>{{ __('Cor') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-info"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite o Modelo') }}" required />
                            <x-label>{{ __('Tipo') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite o Munícipio') }}" required />
                            <x-label>{{ __('Município') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('País do Veículo') }}" required />
                            <x-label>{{ __('País') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Carroceria do Veículo') }}" required />
                            <x-label>{{ __('Carroceria') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite o Tipo') }}" required />
                            <x-label>{{ __('Tipo') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="date" id="html5-date-input">
                        <x-label for="html5-date-input">{{ __('Ano de Fabricação') }}</x-label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="date" id="html5-date-input">
                        <x-label for="html5-date-input">{{ __('Ano de Modelo') }}</x-label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="date" id="html5-date-input">
                        <x-label for="html5-date-input">{{ __('Licenciamento') }}</x-label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-2 mt-1">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-secondary btn-app btn-block w-100 btn-xs" wire:click="showModal('modal-consult-phone')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Clique para Verificar Movimentação">
                                        {{ __('Movimentação') }}
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-danger text-white text-uppercase btn-app btn-block w-100 btn-xs" wire:click="showModal('modal-flagrant')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Clique para Verificar Ocorrências Anteriores">
                                        {{ __('Ocorrências') }}
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-secondary btn-app btn-block w-100 btn-xs" wire:click="showModal('modal-consult-phone')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Clique para Conferir Situação">
                                        {{ __('Conferir Situação') }}
                                    </button>
                                </div>
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
                <div class="col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-2 mt-1">
                                <div class="col-sm-12 col-lg-6">
                                    <span class="badge bg-danger">{{ __('SIOPM:') }}</span>
                                    <span class="badge bg-success">{{ __('REGULAR') }}</span>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <span class="badge bg-danger">{{ __('PRODESP:') }}</span>
                                    <span class="badge bg-success">{{ __('REGULAR') }}</span>
                                </div>
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
                <div class="col-sm-12 col-lg-6">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Dados do Nome do Proprietário') }}" required />
                            <x-label>{{ __('Nome do Proprietário') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Dados do Nome do Proprietário') }}" required />
                            <x-label>{{ __('RG do Proprietário') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('CPF do Proprietário') }}" required />
                            <x-label>{{ __('CPF do Proprietário') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-5">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Endereço do Proprietário') }}" required />
                            <x-label>{{ __('Endereço') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Número do Proprietário') }}" required />
                            <x-label>{{ __('Número') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Complemento do Proprietário') }}" required />
                            <x-label>{{ __('Complemento') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Múnicipio do Proprietário') }}" required />
                            <x-label>{{ __('Múnicipio') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Bairro do Proprietário') }}" required />
                            <x-label>{{ __('Bairro') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('País do Proprietário') }}" required />
                            <x-label>{{ __('País') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-car-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('UF do Proprietário') }}" required />
                            <x-label>{{ __('UF') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                            <span class="input-group-text">
                               BR (+55)
                            </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="phone" type="text" id="phone" maxlength="15" placeholder="{{ __('Digite o número de telefone') }}" required />
                            <x-label>{{ __('Telefone') }}</x-label>
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
