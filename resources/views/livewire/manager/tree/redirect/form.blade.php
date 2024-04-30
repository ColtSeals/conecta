<div>
    <div class="modal-header d-flex justify-content-center">
        <h4 class="modal-title">
            <span class="mdi mdi-sitemap-outline fs-3"></span>
            {{ __('Redirecionar Pergunta') }}
        </h4>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="g-3">
                <div class="form-floating form-floating-outline">
                    <select wire:model="question" class="form-select" aria-label="question">
                        <option value="" selected>{{ __('Selecione uma questão') }}</option>
                        @if($questions)
                            @foreach($questions as $q)
                                <option value="{{ $q->id }}" @if(in_array($q->id, $selectedQuestionsIds)) class="text-danger" @endif>
                                    {{ $loop->iteration }} - {{ $q->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
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
