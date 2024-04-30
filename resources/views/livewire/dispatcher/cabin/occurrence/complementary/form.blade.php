<div>
    <div class="modal-header" style="display: flex; align-items: center; justify-content: space-between;">
        <button type="button" wire:click="$dispatch('showModal', { alias: 'dispatcher.cabin.occurrence.create.form', maxWidth: '2xl' })" style="background-color: transparent; border: none; padding: 0;">
            <span class="mdi mdi-arrow-left"></span>
        </button>
        <h4 class="modal-title" style="text-align: center; flex-grow: 1;">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Complementar Ocorrência') }}
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-sm-12 col-lg-10">
                    <div class="card">
                        <div class="card-header overflow-hidden">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link waves-effect active" data-bs-toggle="tab" data-bs-target="#form-tabs-personal" role="tab" aria-selected="true">
                                        <span class="mdi mdi-account mdi-20px d-sm-none"></span><span class="d-none d-sm-block">{{ __('Histórico Final') }}</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link waves-effect" data-bs-toggle="tab" data-bs-target="#form-tabs-account" role="tab" aria-selected="false" tabindex="-1"><span class="mdi mdi-account-details mdi-20px d-sm-none"></span><span class="d-none d-sm-block">{{ __('Observações') }}</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link waves-effect" data-bs-toggle="tab" data-bs-target="#form-tabs-social" role="tab" aria-selected="false" tabindex="-1"><span class="mdi mdi-facebook mdi-20px d-sm-none"></span><span class="d-none d-sm-block">{{ __('Histórico Final') }}</span></button>
                                </li>
                                <span class="tab-slider" style="left: 0px; width: 165.174px; bottom: 0px;"></span></ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">
                                <form>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-floating form-floating-outline ">
                                            <textarea class="form-control" placeholder="Digite p Histórico Inicial" style="height: 110px;" aria-label="historyOccurrence" disabled></textarea>

                                            <label>
                                                Histórico Inicial
                                            </label>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="tab-pane fade" id="form-tabs-account" role="tabpanel">
                                <form>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-floating form-floating-outline ">
                                            <textarea class="form-control" placeholder="Digite as Observações" style="height: 110px;" aria-label="historyOccurrence"></textarea>

                                            <label>
                                                Observações
                                            </label>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="tab-pane fade" id="form-tabs-social" role="tabpanel">
                                <form>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-floating form-floating-outline ">
                                            <textarea class="form-control" placeholder="Digite o Histórico Final" style="height: 110px;" aria-label="historyOccurrence"></textarea>

                                            <label>
                                                Histórico Final
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="card card-border-shadow-secondary h-100">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <x-secondary-button wire:click="showModal('modal-chat')" class="btn-app btn-block w-100 btn-xs"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="right"
                                                    data-bs-original-title="{{ __('Clique para Adicionar Envolvidos') }}">
                                    Envolvidos
                                </x-secondary-button>
                                <x-secondary-button wire:click="showModal('modal-chat')" class="btn-app btn-block w-100 btn-xs mt-3"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="right"
                                                    data-bs-original-title="{{ __('Clique para adicionar Veículos') }}">
                                    Veículos
                                </x-secondary-button>
                                <x-secondary-button wire:click="showModal('modal-chat')" class="btn-app btn-block w-100 btn-xs mt-3"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="right"
                                                    data-bs-original-title="{{ __('Clique para Adicionar Dispositivos') }}">
                                    Dispositivos
                                </x-secondary-button>
                                <x-secondary-button wire:click="showModal('modal-chat')" class="btn-app btn-block w-100 btn-xs mt-3"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="right"
                                                    data-bs-original-title="{{ __('Clique para Adicionar dados de Armamento') }}">
                                    Armas
                                </x-secondary-button>


                            </div>
                            <hr class="m-0 mt-3">
                            <x-success-button wire:click="showModal('modal-chat')" class="btn-app btn-block w-100 btn-sm mt-3"
                                              data-bs-toggle="tooltip"
                                              data-bs-placement="right"
                                              data-bs-original-title="{{ __('Clique para Salvar os Dados inseridos na Observação e Histórico Final') }}">
                                Salvar
                            </x-success-button>
                        </div>
                    </div>
                </div>
                <hr class="m-0 mt-3">
                <div class="col-sm-12 col-lg-1">
                    <x-info-button
                        class="btn-app btn-block w-100 btn-sm mt-1"
                        wire:click="$dispatch('show-modal', { modal: 'modal-occurrence-phrases' })"
                        title="{{ __('Clique para Acessar lista de Frases para o Encerramento') }}"
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                    >
                        <span class="mdi mdi-view-list mdi-24px"></span>
                    </x-info-button>
                </div>

                <div class="col-sm-12 col-lg-2">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                            <option selected disabled>{{ __('Selecione') }}</option>
                            <option value="01">{{ __('01') }}</option>
                            <option value="02">{{ __('02') }}</option>
                            <option value="03">{{ __('03') }}</option>
                        </select>

                        <x-label>{{ __('Código') }}</x-label>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-9">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-cellphone-cog"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite o Resultado Encerramento') }}" required />
                            <x-label required>{{ __('Resultado Encerramento') }}</x-label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-6">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-cellphone-cog"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite o Nome do Delegado') }}" required />
                            <x-label required>{{ __('Nome do Delegado') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-cellphone-cog"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite o Número do DP') }}" required />
                            <x-label required>{{ __('DP de Elaboração') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-cellphone-cog"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite o Número do BOPC') }}" required />
                            <x-label required>{{ __('BOPC') }}</x-label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-8">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-cellphone-cog"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Digite a Natureza Final') }}" required />
                            <x-label required>{{ __('Natureza Final') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-cellphone-cog"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Data e Hora') }}" required />
                            <x-label required>{{ __('Data e Hora') }}</x-label>
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
