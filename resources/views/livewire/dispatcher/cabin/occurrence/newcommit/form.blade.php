<div>
    <div class="modal-header" style="display: flex; align-items: center; justify-content: space-between;">
        <button type="button" wire:click="$dispatch('showModal', { alias: 'dispatcher.cabin.patrol.committed.form', maxWidth: '2xl' })" style="background-color: transparent; border: none; padding: 0;">
            <span class="mdi mdi-arrow-left"></span>
        </button>
        <h4 class="modal-title" style="text-align: center; flex-grow: 1;">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Novo Empenho') }}
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>


    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-card-account-details"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="plate" wire:model="fullName" type="text" maxlength="161" placeholder="{{ __('Digite o Nome') }}" disabled="true" />
                            <x-label required>{{ __('Solicitante') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">BR (+55)</span>
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" placeholder="Digite o Telefone" disabled="true" />
                            <label for="modalEditUserPhone">{{ __('Telefone') }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-home-city-outline"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="plate" wire:model="fullName" type="text" maxlength="161" placeholder="{{ __('Digite a Cidade ou CEP') }}" disabled="true"/>
                            <x-label required>{{ __('Cidade/ CEP') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-home-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="number" type="text" placeholder="{{ __('Digite o número') }}" disabled="true">
                            <x-label required>{{ __('Número') }}</x-label>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-map-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="plusCode" type="text" placeholder="{{ __('Digite o Plus Code') }}" disabled="true">
                            <x-label>{{ __('PlusCode') }}</x-label>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-note-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="complement" type="text" placeholder="{{ __('Digite o complemento') }}" disabled="true">
                            <x-label>{{ __('Complemento') }}</x-label>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-home-group"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="neighborhood" type="text" placeholder="{{ __('Digite o bairro') }}" disabled="true">
                            <x-label required>{{ __('Bairro') }}</x-label>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-5">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-text-box-edit-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="reference" type="text" placeholder="{{ __('Digite a referência ou POI') }}" disabled="true">
                            <x-label required>{{ __('Referência ou POI') }}</x-label>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-police-badge-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="policingCommand" type="text" placeholder="{{ __('Digite o comando de policiamento') }}" disabled="true">
                            <x-label required>{{ __('Comando de Policiamento') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-police-station"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="bpm" type="text" placeholder="{{ __('Digite o BPM/M') }}" disabled="true">
                            <label>
                                BPM/M <span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-sitemap-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="cia" type="text" placeholder="{{ __('Digite a CIA') }}" disabled="true">
                            <label>
                                Cia <span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-10">
                    <div class="card">
                        <div class="table-responsive" style="height: 90px;">
                            <table class="table table-striped table-head-fixed">
                                <thead class="sticky-top bg-white">
                                <tr class="text-center">

                                    <th>{{ __('Serviço') }}</th>
                                    <th>{{ __('US') }}</th>
                                    <th>{{ __('Situação') }}</th>
                                    <th>{{ __('Desde') }}</th>
                                    <th>{{ __('Tempo') }}</th>
                                </tr>
                                </thead>


                                <tbody class="table-border-bottom-0">
                                <tr class="text-center">

                                    <td wire:click="showModalOccurrence('50')">Rádio Patrulha</td>
                                    <td wire:click="showModalOccurrence('50')">M-10200</td>
                                    <td wire:click="showModalOccurrence('50')">No DP</td>
                                    <td wire:click="showModalOccurrence('50')">25/12/23 11:03</td>
                                    <td wire:click="showModalOccurrence('50')">00:35:05</td>
                                </tr>
                                <!--[if ENDBLOCK]><![endif]-->
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header overflow-hidden">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link waves-effect" data-bs-toggle="tab" data-bs-target="#form-tabs-personal" role="tab" aria-selected="false" tabindex="-1">
                                        <span class="mdi mdi-account mdi-20px d-sm-none"></span><span class="d-none d-sm-block">Histórico Final</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link waves-effect active" data-bs-toggle="tab" data-bs-target="#form-tabs-account" role="tab" aria-selected="true"><span class="mdi mdi-account-details mdi-20px d-sm-none"></span><span class="d-none d-sm-block">Observações</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link waves-effect" data-bs-toggle="tab" data-bs-target="#form-tabs-social" role="tab" aria-selected="false" tabindex="-1"><span class="mdi mdi-facebook mdi-20px d-sm-none"></span><span class="d-none d-sm-block">Histórico Final</span></button>
                                </li>
                                <span class="tab-slider" style="left: 174.906px; width: 156.062px; bottom: 0px;"></span></ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">

                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-floating form-floating-outline ">
                                        <textarea class="form-control" placeholder="Digite p Histórico Inicial" style="height: 110px;" aria-label="historyOccurrence" disabled=""></textarea>

                                        <x-label required>{{ __('Histórico Inicial') }}</x-label>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane fade" id="form-tabs-account" role="tabpanel">

                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-floating form-floating-outline ">
                                        <textarea class="form-control" placeholder="Digite as Observações" style="height: 110px;" aria-label="historyOccurrence" disabled=""></textarea>

                                        <x-label required>{{ __('Observações') }}</x-label>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane fade" id="form-tabs-social" role="tabpanel">

                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-floating form-floating-outline ">
                                        <textarea class="form-control" placeholder="Digite o Histórico Final" style="height: 110px;" aria-label="historyOccurrence" disabled=""></textarea>

                                        <x-label required>{{ __('Histórico Final') }}</x-label>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12 col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <button type="button" class="btn btn-label-secondary btn-app btn-block w-100 btn-xs" wire:click="showModal('modal-chat')" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Clique para Adicionar Envolvidos">
                                    {{ __('Envolvidos') }}
                                </button>
                                <button type="button" class="btn btn-label-secondary btn-app btn-block w-100 btn-xs mt-3" wire:click="showModal('modal-chat')" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Clique para adicionar Veículos">
                                    {{ __('Veículos') }}
                                </button>
                                <button type="button" class="btn btn-label-secondary btn-app btn-block w-100 btn-xs mt-3" wire:click="showModal('modal-chat')" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Clique para Adicionar Dispositivos">
                                    {{ __('Dispositivos') }}
                                </button>
                                <button type="button" class="btn btn-label-secondary btn-app btn-block w-100 btn-xs mt-3" wire:click="showModal('modal-chat')" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Clique para Adicionar dados de Armamento">
                                    {{ __('Armas') }}
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="col mt-2">
                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <span class="mdi mdi-sitemap-outline"></span>
                                            </span>
                            <div class="form-floating form-floating-outline">
                                <input class="form-control" wire:model="bpm" type="text" placeholder="{{ __('Digite VTR') }}"/>
                                <x-label>{{ __('Viatura') }}</x-label>

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
