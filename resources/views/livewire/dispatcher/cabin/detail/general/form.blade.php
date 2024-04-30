<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Detalhes de Ocorrências') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body table-responsive p-0" style="height: 450px;">
                            <table class="table table-head-fixed table-striped text-nowrap">
                                <thead class="sticky-top bg-white">
                                <tr class="text-center">
                                    <th>
                                        <input id="customSwitch" type="checkbox" class="form-check-input" aria-label="checkbox">
                                    </th>

                                    <th>⚡</th>
                                    <th>{{ __('ENDEREÇO') }}</th>
                                    <th>{{ __('NAT') }}</th>
                                    <th>{{ __('QTD') }}</th>
                                    <th>{{ __('OPM') }}</th>
                                    <th>{{ __('ESPERA') }}</th>
                                    <th>{{ __('OCO') }}</th>
                                </tr>
                                </thead>

                                <tbody class="table-border-bottom-0">

                                <tr class="text-center" style="cursor: pointer;" wire:click="viewOccurrence" onmouseover="this.style.backgroundColor='#ADD8E6';" onmouseout="this.style.backgroundColor='';">
                                    <td>
                                        <input type="checkbox" class="form-check-input" aria-label="checkbox">
                                    </td>
                                    <td>
                                        dssd
                                    </td>
                                    <td>
                                        dssd
                                    </td>
                                    <td>sdsd</td>
                                    <td>0</td>
                                    <td>dds 1ª CIA</td>
                                    <td>14:50:14</td>
                                    <td>sdsd</td>
                                </tr>


                                <tr class="text-center" style="cursor: pointer;" wire:click="viewOccurrence('41d4b90a-9258-11ee-b9d1-0242ac120002')" onmouseover="this.style.backgroundColor='#ADD8E6';" onmouseout="this.style.backgroundColor='';">
                                    <td>
                                        <input type="checkbox" class="form-check-input" aria-label="checkbox">
                                    </td>


                                    <td>
                                            <span class="badge bg-police-danger v">
                                                POLICIAL EM PERIGO
                                            </span>
                                    </td>
                                    <td>
                                        Rua Teste, 10 - Teste Bairro
                                    </td>
                                    <td>B03</td>
                                    <td>0</td>
                                    <td>48° BPM/M 1ª CIA</td>
                                    <td>14:50:14</td>
                                    <td>00015-03/DEC/23</td>
                                </tr>
                                <tr class="text-center" style="cursor: pointer;" wire:click="viewOccurrence('41d4b90a-9258-11ee-b9d1-0242ac120002')" onmouseover="this.style.backgroundColor='#ADD8E6';" onmouseout="this.style.backgroundColor='';">
                                    <td>
                                        <input type="checkbox" class="form-check-input" aria-label="checkbox">
                                    </td>
                                    <td>
                                            <span class="badge v" style="background-color: #461902; color: #FFFFFF;">
                                                REITERAÇÃO
                                            </span>
                                    </td>
                                    <td>
                                        Rua Teste, 10 - Teste Bairro
                                    </td>
                                    <td>B01</td>
                                    <td>0</td>
                                    <td>48° BPM/M 1ª CIA</td>
                                    <td>14:50:14</td>
                                    <td>000011-03/DEC/23</td>
                                </tr>
                                <tr class="text-center" style="cursor: pointer;" wire:click="viewOccurrence('41d4b90a-9258-11ee-b9d1-0242ac120002')" onmouseover="this.style.backgroundColor='#ADD8E6';" onmouseout="this.style.backgroundColor='';">
                                    <td>
                                        <input type="checkbox" class="form-check-input" aria-label="checkbox">
                                    </td>
                                    <td>
                                            <span class="badge bg-cancel-occurrence v">
                                                CANCELAMENTO
                                            </span>
                                    </td>
                                    <td>
                                        Rua Teste, 10 - Teste Bairro
                                    </td>
                                    <td>B01</td>
                                    <td>0</td>
                                    <td>48° BPM/M 1ª CIA</td>
                                    <td>14:50:14</td>
                                    <td>000011-03/DEC/23</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-5">
                    <div class="card mt-1">
                        <div class="table-responsive" style="height: 135px;">
                            <table class="table table-striped table-head-fixed">
                                <thead class="sticky-top bg-white">
                                <tr class="text-center">

                                    <th>{{ __('OPM') }}</th>
                                    <th>{{ __('Total') }}</th>
                                    <th>
                                        <input id="customSwitch" type="checkbox" class="form-check-input" aria-label="checkbox"></th>
                                </tr>
                                </thead>

                                <tbody class="table-border-bottom-0">
                                @for($i = 0; $i <= 5; $i++)
                                    <tr class="text-center">

                                        <td wire:click="showModalOccurrence('{{ $i }}')">10ºBPMM 1ªCIA</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">100</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">
                                            <input id="customSwitch" type="checkbox" class="form-check-input" aria-label="checkbox">
                                        </td>

                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-5">
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <label class="d-flex justify-content-md-start align-items-center">
                                    <x-input type="text"  placeholder="Filtrar..." />
                                </label>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label class="d-flex justify-content-md-start align-items-center">
                                    <x-input type="text"  placeholder="simular tag..." />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-1">
                                <div class="row g-1">
                                    <div class="col-md">
                                        <x-warning-button
                                            class="btn-app btn-block w-100 btn-xs"
                                            wire:click="showModal('modal-close')"
                                            title="{{ __('Clique para Observar Ocorrências Selecionadas') }}"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                        >
                                            <span class="mdi mdi-clipboard-edit-outline"></span>
                                        </x-warning-button>
                                    </div>
                                </div>
                                <div class="row g-1">
                                    <div class="col-md">
                                        <x-danger-button
                                            class="btn-app btn-block w-100 btn-xs"
                                            wire:click="showModal('modal-close')"
                                            title="{{ __('Clique para Encerrar Ocorrências Selecionadas') }}"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                        >
                                            <span class="mdi mdi-progress-close"></span>
                                        </x-danger-button>
                                    </div>
                                </div>
                                <div class="row g-1">
                                    <div class="col-md">
                                        <x-secondary-button
                                            class="btn-app btn-block w-100 btn-xs"
                                            wire:click="showModal('modal-close')"
                                            title="{{ __('Clique para Ocultar Ocorrências Selecionadas') }}"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                        >
                                            <span class="mdi mdi-eye-off-outline"></span>
                                        </x-secondary-button>
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
