<div>
    <div class="modal-header" style="display: flex; align-items: center; justify-content: space-between;">
        <button type="button" wire:click="$dispatch('showModal', { alias: 'dispatcher.cabin.occurrence.create.form', maxWidth: '2xl' })" style="background-color: transparent; border: none; padding: 0;">
            <span class="mdi mdi-arrow-left"></span>
        </button>
        <h4 class="modal-title" style="text-align: center; flex-grow: 1;">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Cadastrar Dispositivo') }}
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Cadastrar Veículos') }}
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
                            <x-label required>{{ __('Placa') }}</x-label>
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
                            <x-label required>{{ __('Chassi') }}</x-label>
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
                            <x-label required>{{ __('Marca') }}</x-label>
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
                            <x-label required>{{ __('Modelo') }}</x-label>
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
                            <x-label required>{{ __('UF') }}</x-label>
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
                            <x-label required>{{ __('Cor') }}</x-label>
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
                            <x-label required>{{ __('Carroceria') }}</x-label>
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
                            <x-label required>{{ __('Tipo') }}</x-label>
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
                            <x-label required>{{ __('Município') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-car-search-outline"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite o Munícipio') }}" required />
                            <x-label required>{{ __('País') }}</x-label>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-lg-2">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="date" id="html5-date-input">
                        <label for="html5-date-input">{{ __('Ano de Fabricação') }}</label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="date" id="html5-date-input">
                        <label for="html5-date-input">{{ __('Ano de Modelo') }}</label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="date" id="html5-date-input">
                        <label for="html5-date-input">{{ __('Licenciamento') }}</label>
                    </div>
                </div>
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1">
                        <label class="btn btn-outline-danger waves-effect" for="btnradio1" style="height: 50px;"><i class="mdi mdi-car-off mdi-24px"></i></label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                        <label class="btn btn-outline-success waves-effect" for="btnradio2" style="height: 50px;"><i class="mdi mdi-car-electric mdi-24px"></i></label>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-2">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                            <option selected disabled>Selecione uma opção</option>

                            <option value="Abandonado">{{ __('Abandonado') }}</option>
                            <option value="Localizado">{{ __('Localizado') }}</option>
                            <option value="Ação Criminosa">{{ __('Ação Criminosa') }}</option>
                            <option value="Roubo">{{ __('Roubo') }}</option>
                            <option value="Furto">{{ __('Furto') }}</option>
                            <option value="Apropriação Indebita">{{ __('Apropriação Indébita') }}</option>
                        </select>

                        <x-label required>{{ __('Situação') }}</x-label>
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
                                    <span class="badge bg-danger">SIOPM:</span>
                                    <span class="badge bg-info">Regular</span>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <span class="badge bg-danger">PRODESP:</span>
                                    <span class="badge bg-info">Regular</span>
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
                            <x-label required>{{ __('Nome do Proprietário') }}</x-label>
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
                            <x-label required>{{ __('RG do Proprietário') }}</x-label>
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
                            <x-label required>{{ __('CPF do Proprietário') }}</x-label>
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
                            <x-label required>{{ __('Endereço') }}</x-label>
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
                            <x-label required>{{ __('Número') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-car-search-outline"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Complemento do Proprietário') }}" required />
                            <x-label required>{{ __('Complemento') }}</x-label>
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
                            <x-label required>{{ __('UF') }}</x-label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-car-search-outline"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Bairro do Proprietário') }}" required />
                            <x-label required>{{ __('Bairro') }}</x-label>
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
                            <x-label required>{{ __('Múnicipio') }}</x-label>
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
                            <x-label required>{{ __('País') }}</x-label>
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
                            <x-label required>{{ __('Telefone') }}</x-label>
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
