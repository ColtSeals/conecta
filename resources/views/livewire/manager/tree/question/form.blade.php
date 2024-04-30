<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-help-box-multiple-outline mdi-24px fs-3"></span>
            {{ __('Cadastrar Perguntas') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row g-4">
                @foreach($options as $index => $option)
                    <div class="col-sm-12 col-lg-11">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <span class="mdi mdi-help"></span>
                            </span>

                            <div class="form-floating form-floating-outline">
                                <x-input wire:model="options.{{ $index }}.question" type="text" placeholder="{{ __('Insira a 1º Pergunta') }}" required />
                                <x-label required>{{ __($index + 1 . 'º Pergunta') }}</x-label>
                            </div>
                        </div>

                        <x-input-error for="options.{{ $index }}.question" />
                    </div>

                    <div class="col-sm-12 col-lg-1">
                        @if($loop->last)
                            <x-success-button wire:click="addOption" class="btn-xl waves-effect w-100"
                                              data-bs-toggle="tooltip"
                                              data-bs-placement="top"
                                              data-bs-original-title="{{ __('Adicionar Pergunta') }}"
                            >
                                <i class="mdi mdi-plus"></i>
                            </x-success-button>
                        @else
                            <x-danger-button wire:click="removeOption({{ $index }})" class="btn-xl waves-effect w-100"
                                             data-bs-toggle="tooltip"
                                             data-bs-placement="top"
                                             data-bs-original-title="{{ __('Remover Pergunta') }}"
                            >
                                <i class="mdi mdi-close"></i>
                            </x-danger-button>
                        @endif
                    </div>

                    @if(!$loop->last) <hr class="m-0 mt-3"> @endif
                @endforeach
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

            <x-secondary-button type="submit" wire:target="save" wire:loading.attr="disabled">
                <span class="align-middle d-sm-inline-block d-none me-sm-1">
                    <span wire:target="save" wire:loading class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    {{ __('Cadastrar Perguntas') }}
                </span>

                <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="save"></i>
            </x-secondary-button>
        </div>
    </form>
</div>
