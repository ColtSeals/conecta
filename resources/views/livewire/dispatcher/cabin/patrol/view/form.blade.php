<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Viatura Disponivel') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-lg-3">
                                    <x-success-button class="btn-app btn-block w-100 btn-lg mt-1"
                                                      wire:click="$dispatch('show-modal', { modal: 'modal-occurrence-previous' })"
                                                      data-bs-toggle="tooltip"
                                                      data-bs-placement="top"
                                                      data-bs-original-title="{{ __('Clique para Verificar Ocorrências Anteriores') }}"
                                    >
                                        {{ __('Rádio Patrulha') }}
                                    </x-success-button>

                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <div class="form-floating form-floating-outline">
                                        <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                                            <option selected disabled>{{ __('Selecione ') }}</option>
                                            <option value="Diponivel">{{ __('Diponivel') }}</option>
                                            <option value="Manuntenção">{{ __('Manuntenção Rápida') }}</option>
                                            <option value="Especial">{{ __('Operação Especial') }}</option>
                                            <option value="Abastecimento">{{ __('Abastecimento') }}</option>
                                            <option value="Assunção Manual">{{ __('assunção Manual') }}</option>
                                            <option value="Baixa Rádio">{{ __('Baixa Rádio') }}</option>
                                            <option value="Reserva">{{ __('Reserva') }}</option>
                                            <option value="Rendição">{{ __('Rendição') }}</option>
                                        </select>

                                        <x-label>{{ __('Status') }}</x-label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-5">
                                    <div class="input-group">
                                        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                            <option selected="">Selecionar TL</option>
                                            <option value="1">00001-01/12/23</option>
                                            <option value="2">00002-01/12/23</option>
                                            <option value="3">00003-01/12/23</option>
                                        </select>
                                        <button class="btn btn-lg btn-outline-danger waves-effect" type="button">Empenhar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-devices"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="cpf" wire:model="cpf" type="text" maxlength="14" placeholder="{{ __('Rádio Patrulha') }}" disabled="true"/>
                            <x-label required>{{ __('Serviço') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-devices"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="cpf" wire:model="cpf" type="text" maxlength="14" placeholder="{{ __('Policiamento Ostensivo Ordinário') }}" disabled="true"/>
                            <x-label required>{{ __('Operação') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="row g-1">
                                <div class="col mb-3">
                                    <x-secondary-button wire:click="showModal('modal-previous-occurrences')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-original-title="{{ __('Clique para Cadastrar Nova Ocorrência') }}">
                                        <span class="tf-icons mdi mdi-plus-circle-outline me-1"></span> Nova Ocr.
                                    </x-secondary-button>
                                </div>
                                <div class="col mb-3">
                                    <x-secondary-button wire:click="showModal('modal-previous-occurrences')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-original-title="{{ __('Clique para Consultar Talão') }}">
                                        <span class="tf-icons mdi mdi-animation me-1"></span> Cons.Talão
                                    </x-secondary-button>
                                </div>
                                <div class="col mb-3">
                                    <x-secondary-button wire:click="showModal('modal-previous-occurrences')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-original-title="{{ __('Clique para Localizar US') }}">
                                        <span class="tf-icons mdi mdi-map-clock-outline me-1"></span> Localizar US
                                    </x-secondary-button>
                                </div>
                                <div class="col mb-3">
                                    <x-secondary-button wire:click="showModal('modal-previous-occurrences')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-original-title="{{ __('Clique para Verificar Atendimento') }}">
                                        <span class="tf-icons mdi mdi-progress-check me-1"></span> ATENDIMENTO
                                    </x-secondary-button>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col mb-3">
                                    <x-info-button wire:click="showModal('modal-previous-occurrences')" class="btn-app btn-block w-100 btn-xs"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top"
                                                   data-bs-original-title="{{ __('Clique para Consultar Veículos') }}">
                                        <span class="tf-icons mdi mdi-car-search-outline me-1"></span> Veículos
                                    </x-info-button>
                                </div>
                                <div class="col mb-3">
                                    <x-info-button wire:click="showModal('modal-previous-occurrences')" class="btn-app btn-block w-100 btn-xs"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top"
                                                   data-bs-original-title="{{ __('Clique para Consultar Pessoas') }}">
                                        <span class="tf-icons mdi mdi-account-search me-1"></span> Pessoas
                                    </x-info-button>
                                </div>
                                <div class="col mb-3">
                                    <x-danger-button wire:click="showModal('modal-previous-occurrences')" class="btn-app btn-block w-100 btn-xs"
                                                     data-bs-toggle="tooltip"
                                                     data-bs-placement="top"
                                                     data-bs-original-title="{{ __('Clique para Consultar Armas') }}">
                                        <span class="tf-icons mdi mdi-alert-octagram me-1"></span> Armas
                                    </x-danger-button>
                                </div>
                                <div class="col mb-3">
                                    <x-info-button wire:click="showModal('modal-previous-occurrences')" class="btn-app btn-block w-100 btn-xs"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top"
                                                   data-bs-original-title="{{ __('Clique para Consultar IMEI') }}">
                                        <span class="tf-icons mdi mdi-cellphone-charging me-1"></span> IMEI
                                    </x-info-button>
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
