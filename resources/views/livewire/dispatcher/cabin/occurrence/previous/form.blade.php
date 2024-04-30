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
                <div class="col-sm-12 col-lg-12">
                    <div class="card card-border-shadow-secondary h-100">
                        <div class="table-responsive" style="height: 180px;">
                            <table class="table table-striped table-head-fixed">
                                <thead class="sticky-top bg-white">
                                <tr class="text-center">

                                    <th>{{ __('Seq') }}</th>
                                    <th>{{ __('Data Inicial') }}</th>
                                    <th>{{ __('Data Final') }}</th>
                                    <th>{{ __('Ativo') }}</th>
                                    <th>{{ __('Nome da Operação') }}</th>
                                </tr>
                                </thead>

                                <tbody class="table-border-bottom-0">
                                @for($i = 0; $i <= 5; $i++)
                                    <tr class="text-center">

                                        <td wire:click="showModalOccurrence('{{ $i }}')">532</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">05/11/2023 23:38:01</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">05/11/2023 23:38:01</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">Ativo</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')">Empenho de VTR</td>
                                        <td wire:click="showModalOccurrence('{{ $i }}')"></td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
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
