<div>
    <div class="modal-header" style="display: flex; align-items: center; justify-content: space-between;">
        <button type="button" wire:click="$dispatch('showModal', { alias: 'dispatcher.cabin.occurrence.create.form', maxWidth: '2xl' })" style="background-color: transparent; border: none; padding: 0;">
            <span class="mdi mdi-arrow-left"></span>
        </button>
        <h4 class="modal-title" style="text-align: center; flex-grow: 1;">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Detalhes de Ocorrência Pendente') }} : {{ $data['occurrence'] ?? 'Não disponível' }}
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>


    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-3">
                <div class="col-12 col-lg-3">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">BR (+55)</span>
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask"
                                   placeholder="Digite o Telefone" value="{{ $data['phone'] ?? 'Não disponível' }}" disabled />
                            <label for="modalEditUserPhone">{{ __('Telefone') }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <span class="mdi mdi-card-account-details"></span>
                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text" maxlength="161"
                                      placeholder="{{ __('Digite o Nome') }}" value="{{ $data['requestor'] ?? 'Não disponível' }}" disabled />
                            <x-label>{{ __('Solicitante') }}</x-label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                    <span class="input-group-text">
                        <span class="mdi mdi-police-station"></span>
                    </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="bpm" type="text"
                                   placeholder="{{ __('Digite o Batalhão') }}" value="{{ $data['name'] ?? 'Não disponível' }}" disabled />
                            <x-label required>{{ __('Batalhão') }}</x-label>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <span class="mdi mdi-home-search-outline"></span>
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text" placeholder="{{ __('Insira a Companhia') }}" value="{{ $data['company'] ?? 'Não disponível' }}" disabled />
                            <x-label required>{{ __('Companhia') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="company" />
                </div>

                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <span class="mdi mdi-home-search-outline"></span>
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text" placeholder="{{ __('Insira o Estado') }}" value="{{ $data['state'] ?? 'Não disponível' }}" disabled />
                            <x-label required>{{ __('Estado') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="state" />
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <span class="mdi mdi-home-search-outline"></span>
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text"
                                      placeholder="{{ __('Insira o Município') }}" value="{{ $data['city'] ?? 'Não disponível' }}" disabled />
                            <x-label required>{{ __('Município') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="city" />
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <span class="mdi mdi-home-search-outline"></span>
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text"
                                      placeholder="{{ __('Insira o Município') }}" value="{{ $data['street'] ?? 'Não disponível' }}" disabled />
                            <x-label required>{{ __('Endereço ou POI') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="street" />
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <span class="mdi mdi-home-search-outline"></span>
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text"
                                      placeholder="{{ __('Insira o Número') }}" value="{{ $data['number'] ?? 'Não disponível' }}" disabled />
                            <x-label required>{{ __('Número') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="number" />
                </div>

                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <span class="mdi mdi-home-search-outline"></span>
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text"
                                      placeholder="{{ __('Insira o Bairro') }}" value="{{ $data['neighborhood'] ?? 'Não disponível' }}" disabled />
                            <x-label required>{{ __('Bairro') }}</x-label>
                        </div>
                    </div>
                    <x-input-error for="neighborhood" />
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <span class="mdi mdi-text-box-edit-outline"></span>
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="reference" type="text"
                                     placeholder="{{ __('Informe a Referência') }}" value="{{ $data['reference'] ?? 'Não disponível' }}" disabled />
                            <x-label>{{ __('Referência') }}</x-label>
                        </div>
                    </div>
                    <x-input-error for="reference" />
                </div>

                <div class="col-sm-12 col-lg-6">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <span class="mdi mdi-home-search-outline"></span>
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text"
                                      placeholder="{{ __('Informe a Natureza') }}" value="{{ $data['code'] ?? 'Não disponível' }} - {{ $data['description'] ?? 'Não disponível' }}" disabled />
                            <x-label required>{{ __('Natureza Inicial') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="nature" />
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">
                            <span class="mdi mdi-car-emergency"></span>
                      </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="cia" type="text" placeholder="Digite a Viatura">
                            <label>
                                Viatura
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mt-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-4">
                                            <div class="col-sm-12 col-lg-12">
                                                <div class="form-floating form-floating-outline ">
                                                    <textarea class="form-control" placeholder="{{ __('Digite o Histórico Inicial') }}" style="height: 250px;" aria-label="historyOccurrence"></textarea>

                                                    <label>
                                                        Histórico Inicial
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                        {{ __('Empenhar') }}
                    </span>

                <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="save"></i>
            </x-success-button>
        </div>
    </form>
</div>
