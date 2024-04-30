<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Cadastrar Batalhão') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-sm-12 col-lg-3">
                    <x-secondary-button
                        class="btn-app btn-block w-100 btn-sm mt-1"
                        wire:click="$dispatch('show-modal', { modal: 'modal-occurrence-hide' })"
                        title="{{ __('PATRULHADA TODA A EXTENSÃO DA VIA, NADA CONSTATADO - TESTEMUNHA ENCARREGADO') }}"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                    >
                        NADA CONSTATADO
                    </x-secondary-button>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <x-secondary-button
                        class="btn-app btn-block w-100 btn-sm mt-1"
                        wire:click="$dispatch('show-modal', { modal: 'modal-occurrence-hide' })"
                        title="{{ __('EQUIPE PELO LOCAL, PARTES DEVIDAMENTE ORIENTADAS') }}"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                    >
                        PARTE ORIENTADA
                    </x-secondary-button>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <x-secondary-button
                        class="btn-app btn-block w-100 btn-sm mt-1"
                        wire:click="$dispatch('show-modal', { modal: 'modal-occurrence-hide' })"
                        title="{{ __('CONFORME O.S. COPOM-036/1300/17 DO CHEFE DO COPOM, CGPS E CFPS CIENTES, DEVERÃO ACESSAR AS INFORMAÇÕES DISPONÍVEIS NO TMD (PAINEL DE SUPERVISÃO) PARA QUE ATUALIZEM-SE SOBRE AS OCORRÊNCIAS PENDENTES OU EMPENHO DE VIATURAS, BUSCANDO ASSIM, QUE A COMUNICAÇÃO NA REDE RÁDIO SEJA PRIORIZADA PARA SITUAÇÕES DE EMERGÊNCIA.') }}"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                    >
                        PERTUBAÇÃO DO SOSSEGO
                    </x-secondary-button>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <x-secondary-button
                        class="btn-app btn-block w-100 btn-sm mt-1"
                        wire:click="$dispatch('show-modal', { modal: 'modal-occurrence-hide' })"
                        title="{{ __('PELO LOCAL JA DE CONHECIMENTO DAS EQUIPES, TRATASSE DE TROTE, DETERMINAÇÃO DO CFP ENCERRAR OCORRÊNCIA') }}"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                    >
                        OCORRÊNCIA DE TROTE
                    </x-secondary-button>
                </div>
                <div class="col-sm-12 col-lg-12">
                    <div class="form-floating form-floating-outline ">
                        <textarea class="form-control" placeholder="Digite o Histórico Inicial" style="height: 260px;" aria-label="historyOccurrence"></textarea>

                        <label>
                            Histórico Inicial
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
