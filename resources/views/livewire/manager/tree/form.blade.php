<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-pencil-plus-outline mdi-24px fs-3"></span>
            {{ __('Cadastrar Árvore') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-3">
                <div class="col-12">
                    <div class="input-group">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <span class="mdi mdi-pine-tree-variant-outline"></span>
                            </span>

                            <div class="form-floating form-floating-outline">
                                <x-input wire:model="name" type="text" placeholder="{{ __('Informe o nome da árvore de decisões.') }}" required/>
                                <x-label required>{{ __('Nome da Árvore') }}</x-label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-floating form-floating-outline">
                        <div wire:ignore>
                            <select id="select2Form" class="form-select" aria-label="nature" wire:model="nature">
                                <option value="" selected>{{ __('Selecione uma Natureza') }}</option>
                                @foreach(\App\Models\Nature::query()->orderBy('code', 'asc')->get() as $nature)
                                    <option value="{{ $nature->id }}">{{ $nature->code }} - {{ $nature->description }}</option>
                                @endforeach
                            </select>

                        </div>
                        @error('nature') <span class="error">{{ $message }}</span> @enderror
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
                    {{ __('Cadastrar Árvore') }}
                </span>

                <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="save"></i>
            </x-secondary-button>
        </div>
    </form>

    @push('custom-script')
        <script type="text/javascript">
            if (select2Form) $('#select2Form').on('change', function (e) {
                @this.set('nature', e.target.value);
            });
        </script>
    @endpush
</div>
