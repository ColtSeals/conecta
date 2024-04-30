<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Consultar Pessoas') }}
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
                                <span class="mdi mdi-card-account-details-outline"></span>
                            </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="rg" wire:model="rg" type="text" maxlength="12" placeholder="{{ __('Insira a RG') }}" required />
                            <x-label>{{ __('RG') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <span class="mdi mdi-card-account-details-outline"></span>
                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="cpf" wire:model="cpf" type="text" maxlength="14" placeholder="{{ __('Insira a CPF') }}" required />
                            <x-label>{{ __('CPF') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <span class="mdi mdi-account-outline"></span>
                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="fullName" type="text" maxlength="161" placeholder="{{ __('Insira o nome completo') }}" required />
                            <x-label>{{ __('Nome Completo') }}</x-label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-9">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <span class="mdi mdi-account-sync"></span>
                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="fullName" type="text" maxlength="161" placeholder="{{ __('Insira o nome completo') }}" required />
                            <x-label>{{ __('Nome Social') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="date" id="html5-date-input">
                        <label for="html5-date-input">Data Emissão RG</label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-9">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <span class="mdi mdi-account-sync"></span>
                        </span>
                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="fullName" type="text" maxlength="161" placeholder="{{ __('Insira o nome da Mãe') }}" required />
                            <x-label>{{ __('Nome  da Mãe') }}</x-label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="date" id="html5-date-input">
                        <label for="html5-date-input">Data de Nascimento</label>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-9">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <span class="mdi mdi-account-sync"></span>
                        </span>
                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="fullName" type="text" maxlength="161" placeholder="{{ __('Insira o nome do Pai') }}" required />
                            <x-label>{{ __('Nome  do Pai') }}</x-label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-3">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                            <option selected disabled>{{ __('Selecione uma opção') }}</option>
                            <option value="Masculino">{{ __('Masculino') }}</option>
                            <option value="Feminino">{{ __('Feminino') }}</option>
                            <option value="Indeterminado">{{ __('Indeterminado') }}</option>
                        </select>

                        <x-label>{{ __('Sexo') }}</x-label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                            <option selected disabled>{{ __('Selecione uma opção') }}</option>
                            <option value="Masculino">{{ __('Masculino') }}</option>
                            <option value="Feminino">{{ __('Feminino') }}</option>
                        </select>

                        <x-label>{{ __('Gênero') }}</x-label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                            <option selected disabled>{{ __('Selecione uma opção') }}</option>
                            <option value="Castanho Escuro">{{ __('Castanho Escuro') }}</option>
                            <option value="Preto">{{ __('Preto') }}</option>
                            <option value="Parda">{{ __('Parda') }}</option>
                        </select>

                        <x-label>{{ __('Olhos') }}</x-label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                            <option selected disabled>{{ __('Selecione uma opção') }}</option>
                            <option value="Albina">{{ __('Albina') }}</option>
                            <option value="Branca">{{ __('Branca') }}</option>
                            <option value="Indeterminado">{{ __('Indeterminado') }}</option>
                        </select>

                        <x-label>{{ __('Pele') }}</x-label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                            <option selected disabled>{{ __('Selecione uma opção') }}</option>
                            <option value="Adulto">{{ __('Adulto') }}</option>
                            <option value="Policial-Civil">{{ __('Policial Civil') }}</option>
                            <option value="Indeterminado">{{ __('Indeterminado') }}</option>
                        </select>

                        <x-label required>{{ __('Tipo de Pessoa') }}</x-label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                            <option selected disabled>{{ __('Selecione uma opção') }}</option>
                            <option value="Agente">{{ __('Agente') }}</option>
                            <option value="Autor">{{ __('Autor') }}</option>
                            <option value="Parte-Nao-Definida">{{ __('Parte Não Definida') }}</option>
                            <option value="Testemunha">{{ __('Testemunha') }}</option>
                            <option value="Vitima Fatal">{{ __('Vítima Fatal') }}</option>
                        </select>

                        <x-label required>{{ __('Classificação na Ocorrência') }}</x-label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                            <option selected disabled>{{ __('Selecione uma opção') }}</option>
                            <option value="Advogado">{{ __('Advogado') }}</option>
                            <option value="Agredido">{{ __('Agredido') }}</option>
                            <option value="Condutor">{{ __('Condutor') }}</option>
                            <option value="Depositario">{{ __('Depositario') }}</option>
                            <option value="Indiciado">{{ __('Indiciado') }}</option>
                        </select>

                        <x-label required>{{ __('Situação na Ocorrência') }}</x-label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating form-floating-outline ">
                        <textarea class="form-control" placeholder="{{ __('Digite Detalhes do Individuo') }}" style="height: 60px;" aria-label="historyOccurrence"></textarea>

                        <label>
                            {{ __('Detalhes do Individuo') }}
                        </label>
                    </div>
                </div>

                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table text-center">
                            <thead class="table-light">
                            <tr>
                                <th>Situação Criminal</th>
                                <th>Situação Civil</th>
                            </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                            <tr>
                                <td>NFMD</td>
                                <td>NFMD</td>
                            </tr>
                            </tbody>
                        </table>
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
