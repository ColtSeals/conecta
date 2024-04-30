<div>
    <div class="modal-header" style="display: flex; align-items: center; justify-content: space-between;">
        <button type="button" wire:click="$dispatch('showModal', { alias: 'dispatcher.cabin.patrol.committed.form', maxWidth: '2xl' })" style="background-color: transparent; border: none; padding: 0;">
            <span class="mdi mdi-arrow-left"></span>
        </button>
        <h4 class="modal-title" style="text-align: center; flex-grow: 1;">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Redirecionar Ocorrência') }}
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>


    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-home-city-outline"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="plate" wire:model="fullName" type="text" maxlength="161" placeholder="{{ __('Digite a Cidade') }}" required />
                            <x-label required>{{ __('Cidade') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-5">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-map-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="plusCode" type="text" placeholder="{{ __('Digite o Logradouro') }}">
                            <x-label required>{{ __('Logradouro') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-home-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="number" type="text" placeholder="{{ __('Digite o Número') }}" required="required">
                            <x-label required>{{ __('Número') }}</x-label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-note-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="complement" type="text" placeholder="{{ __('Digite o Complemento') }}" required="required">
                            <x-label>{{ __('Complemento') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-home-city-outline"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="plate" wire:model="fullName" type="text" maxlength="161" placeholder="{{ __('Digite o CEP') }}" required />
                            <x-label>{{ __('CEP') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-map-search-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="plusCode" type="text" placeholder="{{ __('Digite o PlusCode') }}">
                            <x-label>{{ __('PlusCode') }}</x-label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-6">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-text-box-edit-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="reference" type="text" placeholder="{{ __('Digite a referência ou POI') }}">
                            <x-label>{{ __('Referência ou POI') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-5">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-home-group"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="neighborhood" type="text" placeholder="{{ __('Digite o Bairro') }}" required="required">
                            <x-label required>{{ __('Bairro') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-police-badge-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="policingCommand" type="text" placeholder="{{ __('Digite o Comando de Policiamento') }}" required="required">
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
                            <input class="form-control" wire:model="bpm" type="text" placeholder="{{ __('Digite o Batalhão') }}" required="required">
                            <x-label required>{{ __('Batalhão') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-sitemap-outline"></span>
                                </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="cia" type="text" placeholder="{{ __('Digite a CIA') }}" required="required">
                            <x-label required>{{ __('Cia') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-12">
                    <div class="form-floating form-floating-outline ">
                        <textarea class="form-control" placeholder="Digite Dados Pertinentes a Ocorrência" style="height: 80px;" aria-label="historyOccurrence"></textarea>

                        <label>
                            Informação Adicional
                        </label>
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
