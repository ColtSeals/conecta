<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-vector-polyline-plus fs-3"></span>
            {{ __('Cadastrar Natureza') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row g-4">
                <div class="col-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <span class="mdi mdi-qrcode"></span>
                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="code" type="text" maxlength="4" placeholder="{{ __('Insira o código da natureza') }}" required />
                            <x-label required>{{ __('Código da Natureza') }}</x-label>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <span class="mdi mdi-qrcode"></span>
                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="tags" type="text" placeholder="{{ __('Insira Tags ') }}" required />
                            <x-label required>{{ __('Tags') }}</x-label>
                        </div>
                    </div>
                </div>


{{--                <div class="col-12">--}}
{{--                    <div class="input-group input-group-merge">--}}
{{--                        <span class="input-group-text">--}}
{{--                            <span class="mdi mdi-tag-multiple-outline"></span>--}}
{{--                        </span>--}}

{{--                        <div wire:ignore class="form-floating form-floating-outline">--}}
{{--                            <x-input id="tagify" placeholder="Informe as tags de busca" class="h-auto"></x-input>--}}
{{--                            <x-label required>{{ __('Tags') }}</x-label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-12">
                    <div class="form-floating form-floating-outline">
                        <textarea class="form-control"
                                  wire:model="description"
                                  placeholder="{{ __('Insira a descrição') }}"
                                  style="height: 90px;"
                                  aria-label="description"
                                  required></textarea>

                        <x-label required>{{ __('Descrição') }}</x-label>
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

    @push('custom-script')
        <script>
            tagify.on('input', () => {
                @this.set('tags', tagify.value)
            });
        </script>
    @endpush
</div>
