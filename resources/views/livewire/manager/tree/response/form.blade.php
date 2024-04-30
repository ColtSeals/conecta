<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-help-box-multiple-outline mdi-24px fs-3"></span>
            {{ __('Configurar Resposta') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-12">
                    <div class="input-group">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <span class="mdi mdi-progress-question"></span>
                            </span>

                            <div class="form-floating form-floating-outline">
                                <x-input wire:model="text" type="text" placeholder="{{ __('Informe a resposta.') }}" required/>
                                <x-label required>{{ __('Resposta') }}</x-label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="m-0 mt-0">

        <div class="modal-footer d-flex justify-content-between mt-3">
            <x-danger-button data-bs-dismiss="modal">
                <i class="mdi mdi-close me-sm-1 me-0"></i>

                <span class="align-middle d-sm-inline-block d-none">
                {{ __('Fechar') }}
            </span>
            </x-danger-button>

            <x-secondary-button type="submit" wire:target="save" wire:loading.attr="disabled">
            <span class="align-middle d-sm-inline-block d-none me-sm-1">
                <span wire:target="save" wire:loading class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                {{ __('Salvar Resposta') }}
            </span>

                <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="save"></i>
            </x-secondary-button>
        </div>
    </form>
</div>
