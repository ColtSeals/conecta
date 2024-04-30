<div>

    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Encerrar Ocorrências') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-sm-12 col-lg-6">
                    <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="customCheckTemp3">
                            <input class="form-check-input" type="checkbox" value="" id="customCheckTemp3">
                            <span class="custom-option-header">
                                      <span class="h6 mb-0">TROTE</span>
                                    </span>
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="customCheckTemp3">
                            <input class="form-check-input" type="checkbox" value="" id="customCheckTemp3">
                            <span class="custom-option-header">
                                      <span class="h6 mb-0">VIATURAS/AERONAVES EMPENHADA</span>
                                    </span>
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="customCheckTemp3">
                            <input class="form-check-input" type="checkbox" value="" id="customCheckTemp3">
                            <span class="custom-option-header">
                                      <span class="h6 mb-0">NÃO HAVIA CONDIÇÕES TÉCNICAS DE ATENDER</span>
                                    </span>
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="customCheckTemp3">
                            <input class="form-check-input" type="checkbox" value="" id="customCheckTemp3">
                            <span class="custom-option-header">
                                      <span class="h6 mb-0">DUPLICIDADE DE CHAMADA</span>
                                    </span>
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="customCheckTemp3">
                            <input class="form-check-input" type="checkbox" value="" id="customCheckTemp3">
                            <span class="custom-option-header">
                                      <span class="h6 mb-0">DISPENSADA PELO SOLICITANTE</span>
                                    </span>
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="customCheckTemp3">
                            <input class="form-check-input" type="checkbox" value="" id="customCheckTemp3">
                            <span class="custom-option-header">
                                      <span class="h6 mb-0">CANCELADA POR ORDEM SUPERIOR</span>
                                    </span>
                        </label>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-floating form-floating-outline ">
                            <textarea class="form-control" placeholder="{{ __('Digite os dados do Encerramento') }}" style="height: 100px;" aria-label="historyOccurrence"></textarea>

                            <label>
                                Encerrar Ocorrência
                            </label>
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
