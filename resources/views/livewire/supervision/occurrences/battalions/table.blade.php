<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                @forelse($battalions as $battalion)
                    <div class="col mt-3">
                        <button type="button" class="btn btn-danger" style="cursor: pointer;" wire:click="selectBattalion('{{ $battalion->id }}')">
                            {{ $battalion->name }}
                        </button>
                    </div>
                @empty
                    <div class="col">
                        Nenhum batalhão encontrado.
                    </div>
                @endforelse
            </div>

        </div>


    @if( $battalions->lastPage() > 1)
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item">
                        <button wire:click="previousPage" class="page-link" {{ ! $battalions->onFirstPage() ? '' : ' disabled' }}>
                            {{ __('Anterior') }}
                        </button>
                    </li>

                    @for ($page = 1; $page <=  $battalions->lastPage(); $page++)
                        <li class="page-item">
                            <button wire:click="gotoPage({{ $page }})" class="page-link {{  $battalions->currentPage() === $page ? 'active' : '' }}" {{  $battalions->currentPage() === $page ? 'disabled' : '' }}>
                                {{ $page }}
                            </button>
                        </li>
                    @endfor

                    <li class="page-item">
                        <button wire:click="nextPage" class="page-link" {{  $battalions->hasMorePages() ? '' : ' disabled' }}>
                            {{ __('Próximo') }}
                        </button>
                    </li>
                </ul>
            </div>
        @endif

    </div>
</div>


