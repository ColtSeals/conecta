<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Cadastrar Ocorrência') }}
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
                                    <x-success-button wire:click="showModal('modal-previous-occurrences')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                      data-bs-toggle="tooltip"
                                                      data-bs-placement="bottom"
                                                      data-bs-original-title="{{ __('Clique para Verificar Ocorrências Anteriores') }}">
                                        M-10200
                                    </x-success-button>
                                </div>
                                <div class="col-lg-4 col-sm-4">
                                    <x-secondary-button wire:click="showModal('modal-new-occurrence')" class="btn-app btn-block w-100 btn-xs mt-1 disabled"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="right"
                                                        data-bs-original-title="{{ __('Horário de Saída') }}">
                                        Rádio Patrulha
                                    </x-secondary-button>
                                </div>
                                <div class="col-lg-4 col-sm-4">
                                    <x-secondary-button wire:click="showModal('modal-new-occurrence')" class="btn-app btn-block w-100 btn-xs mt-1 disabled"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="right"
                                                        data-bs-original-title="{{ __('Horário de Saída') }}">
                                        Em Atendimento
                                    </x-secondary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-10">
                    <div class="card card-border-shadow-secondary h-100">
                        <div class="table-responsive" style="height: 214px;">
                            <table class="table table-striped table-head-fixed">
                                <thead class="sticky-top bg-white">
                                <tr class="text-center">

                                    <th>{{ __('Ocr') }}</th>
                                    <th>{{ __('Data') }}</th>
                                    <th>{{ __('HD') }}</th>
                                    <th>{{ __('Local') }}</th>
                                    <th>{{ __('Natureza') }}</th>
                                    <th>{{ __('Tempo') }}</th>
                                </tr>
                                </thead>

                                <tbody class="table-border-bottom-0">
                                @for($i = 0; $i <= 50; $i++)
                                    <tr class="text-center">

                                        <td wire:click="showModalOccurrence('{{ $i }}')">0001</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">25/12/23</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">25/12/23 11:03</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">C01</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">06:31</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">00001-01/JAN/23</td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <div class="card card-border-shadow-secondary h-100">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <x-secondary-button wire:click="showModal('modal-new-occurrence')" class="btn-app btn-block w-100 btn-xs mt-2"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="right"
                                                    data-bs-original-title="{{ __('Horário de Saída') }}">
                                    0-HS
                                </x-secondary-button>

                                <x-success-button wire:click="showModal('modal-observe')" class="btn-app btn-block w-100 btn-xs mt-2"
                                                  data-bs-toggle="tooltip"
                                                  data-bs-placement="right"
                                                  data-bs-original-title="{{ __('Horário de Chegada no Local') }}">
                                    1-HCL
                                </x-success-button>

                                <x-danger-button wire:click="showModal('modal-close')" class="btn-app btn-block w-100 btn-xs mt-2"
                                                 data-bs-toggle="tooltip"
                                                 data-bs-placement="right"
                                                 data-bs-original-title="{{ __('Horário de Saída do Local') }}">
                                    2-HSL
                                </x-danger-button>

                                <x-success-button wire:click="showModal('modal-add-person')" class="btn-app btn-block w-100 btn-xs mt-2"
                                                  data-bs-toggle="tooltip"
                                                  data-bs-placement="right"
                                                  data-bs-original-title="{{ __('Horário de Chegada Intermediário') }}">
                                    3-HCI
                                </x-success-button>

                                <x-info-button wire:click="showModal('modal-add-vehicle')" class="btn-app btn-block w-100 btn-xs mt-2"
                                               data-bs-toggle="tooltip"
                                               data-bs-placement="right"
                                               data-bs-original-title="{{ __('Horário de Saída Intermediário') }}">
                                    4-HSI
                                </x-info-button>

                                <x-warning-button wire:click="showModal('modal-consult-phone')" class="btn-app btn-block w-100 btn-xs mt-2"
                                                  data-bs-toggle="tooltip"
                                                  data-bs-placement="right"
                                                  data-bs-original-title="{{ __('Horário de Saída Final') }}">
                                    5-HSF
                                </x-warning-button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-12">
                    <div class="card card-border-shadow-secondary h-100">
                        <div class="card-body">

                            <div class="row g-2 mt-1">
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-new-commit')" class="btn-app btn-block w-100 btn-xs"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-original-title="{{ __('Clique para empenhar uma nova Viatura') }}">
                                        Novo Empenho
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-')" class="btn-app btn-block w-100 btn-xs"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-original-title="{{ __('Consulte Detalhes do Talão') }}">
                                        Cons. Talão
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-')" class="btn-app btn-block w-100 btn-xs disabled"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-original-title="{{ __('Clique para Alterar dados do Usuário') }}">
                                        Alterar US
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-')" class="btn-app btn-block w-100 btn-xs disabled"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-original-title="{{ __('Clique para Localizar US') }}">
                                        Localização US
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-danger-button wire:click="showModal('modal-flagrant')" class="btn-app btn-block w-100 btn-xs"
                                                     data-bs-toggle="tooltip"
                                                     data-bs-placement="top"
                                                     data-bs-original-title="{{ __('Clique para dar Ciência ao Supervisor/Chefia') }}">
                                        Flagrante
                                    </x-danger-button>
                                </div>
                                <div class="col-md-2">
                                    <x-success-button wire:click="showModal('modal-')" class="btn-app btn-block w-100 btn-xs"
                                                      data-bs-toggle="tooltip"
                                                      data-bs-placement="top"
                                                      data-bs-original-title="{{ __('Clique Solicitar Apoio') }}">
                                        Apoio
                                    </x-success-button>
                                </div>
                            </div>




                            <div class="row g-2">
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-new-commit-details')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="right"
                                                        data-bs-original-title="{{ __('Clique para Cadastrar uma Nova Ocorrência') }}">
                                        Nova Ocr.
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-complementary-occurrence')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="right"
                                                        data-bs-original-title="{{ __('Clique para Complentar Ocorrência') }}">
                                        Complementar Ocr.
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-consult-occurrence')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="right"
                                                        data-bs-original-title="{{ __('Clique para Consultar Ocorrência') }}">
                                        Cons. Ocorrência
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-consult-phone')" class="btn-app btn-block w-100 btn-xs mt-1 disabled"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="right"
                                                        data-bs-original-title="{{ __('Desabilitado') }}">
                                        Cons. Localização
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-warning-button wire:click="showModal('modal-expertise')" class="btn-app btn-block w-100 btn-xs mt-1 "
                                                      data-bs-toggle="tooltip"
                                                      data-bs-placement="right"
                                                      data-bs-original-title="{{ __('Clique para dar Ciência ao Supervisor/Chefia') }}">
                                        Perícia
                                    </x-warning-button>
                                </div>
                                <div class="col-md-2">
                                    <x-info-button wire:click="showModal('modal-consult-phone')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="right"
                                                   data-bs-original-title="{{ __('Clique para Redirecionar Ocorrência') }}">
                                        Redirecionar
                                    </x-info-button>
                                </div>

                            </div>

                            <div class="row g-2">
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-details-service')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom"
                                                        data-bs-original-title="{{ __('Clique para Verificar Orgãos Empenhados') }}">
                                        Atendimento
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-add-vehicle')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom"
                                                        data-bs-original-title="{{ __('Clique para Adicionar/Consultar Veículos') }}">
                                        Veículos
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-add-person')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom"
                                                        data-bs-original-title="{{ __('Clique para Adicionar/Consultar Veículos') }}">
                                        Pessoas
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-secondary-button wire:click="showModal('modal-add-armament')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom"
                                                        data-bs-original-title="{{ __('Clique para Adicionar/Consultar Armas') }}">
                                        Armas
                                    </x-secondary-button>
                                </div>
                                <div class="col-md-2">
                                    <x-warning-button wire:click="showModal('modal-winch')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                      data-bs-toggle="tooltip"
                                                      data-bs-placement="bottom"
                                                      data-bs-original-title="{{ __('Clique para dar Ciência a Supervisor/Chefia') }}">
                                        Guincho
                                    </x-warning-button>
                                </div>
                                <div class="col-md-2">
                                    <x-success-button wire:click="showModal('modal-chat')" class="btn-app btn-block w-100 btn-xs mt-1"
                                                      data-bs-toggle="tooltip"
                                                      data-bs-placement="bottom"
                                                      data-bs-original-title="{{ __('Clique para Enviar Mensagem a Supervisão') }}">
                                        Mensagem
                                    </x-success-button>
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
