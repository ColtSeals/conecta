<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Atendimento de Ocorrência') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-lg-12 col-sm-12">
                    <div class="card card-border-shadow-secondary h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <x-success-button
                                        class="btn-app btn-block w-100 btn-xs mt-1"
                                        wire:click="$dispatch('show-modal', { modal: 'modal-occurrence-previous' })"
                                        title="{{ __('Clique para Verificar Ocorrências Anteriores') }}"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                    >
                                        <span class="mdi mdi-file-eye"></span> M-10200
                                    </x-success-button>

                                </div>
                                <div class="col-lg-4 col-sm-4">
                                    <button type="button" class="btn btn-label-secondary btn-app btn-block w-100 btn-xs mt-1 disabled" wire:click="showModal('modal-new-occurrence')" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Horário de Saída">
                                        Rádio Patrulha
                                    </button>
                                </div>
                                <div class="col-lg-4 col-sm-4">
                                    <button type="button" class="btn btn-label-secondary btn-app btn-block w-100 btn-xs mt-1 disabled" wire:click="showModal('modal-new-occurrence')" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Horário de Saída">
                                        Em Atendimento
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-12">
                    <div class="card card-border-shadow-secondary h-100">
                        <div class="table-responsive" style="height: 120px;">
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
                                @for($i = 0; $i <= 50; $i++)
                                    <tr class="text-center">

                                        <td wire:click="showModalOccurrence('{{ $i }}')">Rádio Patrulha</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">M-10200</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">No DP</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">25/12/23 11:03</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">00:35:05</td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-12">
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
                                            <textarea class="form-control" placeholder="Digite as Observações" style="height: 110px;" aria-label="historyOccurrence" disabled></textarea>

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
                                            <textarea class="form-control" placeholder="Digite o Histórico Final" style="height: 110px;" aria-label="historyOccurrence" disabled></textarea>

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
