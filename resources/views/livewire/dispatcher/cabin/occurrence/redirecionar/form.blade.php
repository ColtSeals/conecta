<div>
    <div class="modal-header" style="display: flex; align-items: center; justify-content: space-between;">
        <button type="button" wire:click="$dispatch('showModal', { alias: 'dispatcher.cabin.patrol.committed.form', maxWidth: '2xl' })" style="background-color: transparent; border: none; padding: 0;">
            <span class="mdi mdi-arrow-left"></span>
        </button>
        <h4 class="modal-title" style="text-align: center; flex-grow: 1;">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Consultar Ocorrência') }}
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>


    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Redirecionar Ocorrência') }}
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
                            <input disabled="" class="form-control" id="plate" wire:model="fullName" type="text" maxlength="161" placeholder="Digite o Nome">
                            <label>
                                Solicitante <span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">BR (+55)</span>
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" placeholder="Digite o Telefone" disabled="">
                            <label for="modalEditUserPhone">Telefone</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <span class="mdi mdi-home-city-outline"></span>
                                            </span>
                        <div class="form-floating form-floating-outline">
                            <input disabled="" class="form-control" id="plate" wire:model="fullName" type="text" maxlength="161" placeholder="Digite a Cidade ou CEP">
                            <label>
                                Cidade/ CEP <span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <span class="mdi mdi-home-search-outline"></span>
                                            </span>
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="number" type="text" placeholder="Digite o número" required="required" disabled="">
                            <label>
                                Número <span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <span class="mdi mdi-map-search-outline"></span>
                                            </span>
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="plusCode" type="text" placeholder="Digite o Plus Code" disabled="">
                            <label>
                                Plus Code
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <span class="mdi mdi-note-outline"></span>
                                            </span>
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="complement" type="text" placeholder="Digite o complemento" required="required" disabled="">
                            <label>
                                Complemento
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <span class="mdi mdi-home-group"></span>
                                            </span>
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="neighborhood" type="text" placeholder="Digite o bairro" required="required" disabled="">
                            <label>
                                Bairro <span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-5">
                    <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <span class="mdi mdi-text-box-edit-outline"></span>
                                            </span>
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="reference" type="text" placeholder="Digite a referência ou POI" required="required" disabled="">
                            <label>
                                Referência ou POI
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <span class="mdi mdi-police-badge-outline"></span>
                                            </span>
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="policingCommand" type="text" placeholder="Digite o comando de policiamento" required="required" disabled="">
                            <label>
                                Comando de Policiamento <span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <span class="mdi mdi-police-station"></span>
                                            </span>
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="bpm" type="text" placeholder="Digite o BPM/M" required="required" disabled="">
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
                            <input class="form-control" wire:model="cia" type="text" placeholder="Digite a CIA" required="required" disabled="">
                            <label>
                                Cia <span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-lg-1">
                                    <x-success-button wire:click="showModal('modal-redirect-cep')" class="btn-app btn-block w-100 btn-lg"
                                                      data-bs-toggle="tooltip"
                                                      data-bs-placement="top"
                                                      data-bs-original-title="{{ __('Clique para Redirecionar com dados do endereço') }}">
                                        <span class="mdi mdi-map-plus mdi-24px"></span>
                                    </x-success-button>
                                </div>
                                <div class="col-sm-12 col-lg-3">
                                    <x-info-button wire:click="showModal('modal-new-occurrence')" class="btn-app btn-block w-100 btn-lg"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top"
                                                   data-bs-original-title="{{ __('Horário de Saída') }}">
                                        {{ __('Rádio Patrulha') }}
                                    </x-info-button>
                                </div>
                                <div class="col-sm-12 col-lg-3">
                                    <x-warning-button wire:click="showModal('modal-new-occurrence')" class="btn-app btn-block w-100 btn-lg"
                                                      data-bs-toggle="tooltip"
                                                      data-bs-placement="top"
                                                      data-bs-original-title="{{ __('Horário de Saída') }}">
                                        {{ __('Outro Serviço') }}
                                    </x-warning-button>
                                </div>
                                <div class="col-sm-12 col-lg-5">
                                    <div class="form-floating form-floating-outline">
                                        <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                                            <option selected="" disabled="">Selecione </option>
                                            <option value="Diponivel">01°BPM/M</option>
                                            <option value="Manuntenção">02ºBPM/M</option>
                                            <option value="Especial">03ºBPM/M</option>
                                            <option value="Abastecimento">04ºBPM/M</option>
                                            <option value="Assunção Manual">05ºBPM/M</option>
                                            <option value="Assunção Manual">05ºBPM/M</option>
                                        </select>

                                        <x-label>{{ __('Redirecionar') }}</x-label>
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
                        {{ __('Salvar') }}
                    </span>

                <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="save"></i>
            </x-success-button>
        </div>
    </form>
</div>
