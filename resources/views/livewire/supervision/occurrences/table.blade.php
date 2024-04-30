<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label class="d-flex align-items-center">
                        <span>Mostrar</span>
                        <select class="form-select ms-2" style="width: 75px;" wire:model="perPage">
                            <option value="10" selected="">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                        </select>
                        <span class="ms-2">Resultados</span>
                    </label>
                </div>

                <div class="col-sm-12 col-md-6">
                    <label class="d-flex justify-content-md-end align-items-center">
                        Pesquisar: <input class="form-control ms-md-2" style="width: 250px;" wire:model.live="search" type="text">
                    </label>
                </div>
            </div>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead class="table-light">
                <tr>
                    <th>{{ __('TALÃO') }}</th>
                    <th>{{ __('NATUREZA') }}</th>
                    <th>{{ __('BATALHÃO') }}</th>
                    <th>{{ __('ENDEREÇO') }}</th>
                    <th>{{ __('USUÁRIO') }}</th>
                    <th>{{ __('DATA DE CRIAÇÃO') }}</th>

                </tr>
                </thead>

                <tbody>
                @if( $occurrences->total() > 0)
                    @foreach( $occurrences as  $occurrence)
                        <tr x-data @click="if ($event.target.type !== 'checkbox' && window.getSelection().toString().length === 0)
                         @this.call('showView', '{{ $occurrence->id }}')"
                        >
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{  $occurrence->occurrence}}
                                </span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ $occurrence->nature->code }} -  {{ $occurrence->nature->description }}
                                </span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ $occurrence->battalion->name }}
                                </span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ $occurrence->address->street }}, {{ $occurrence->address->number }}
                                </span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ $occurrence->atendent }}
                                </span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{  $occurrence->created_at }}
                                </span>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            <div class="text-center">
                                <i class="fas fa-info-circle"></i> {{ __('Nenhuma Ocorrência Encontrada.') }}
                            </div>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        @if($occurrences->lastPage() > 1)
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item">
                        <button wire:click="previousPage" class="page-link" {{ !$occurrences->onFirstPage() ? '' : ' disabled' }}>
                            {{ __('Anterior') }}
                        </button>
                    </li>

                    @for ($page = 1; $page <= $occurrences->lastPage(); $page++)
                        <li class="page-item">
                            <button wire:click="gotoPage({{ $page }})" class="page-link {{ $occurrences->currentPage() === $page ? 'active' : '' }}" {{ $occurrences->currentPage() === $page ? 'disabled' : '' }}>
                                {{ $page }}
                            </button>
                        </li>
                    @endfor

                    <li class="page-item">
                        <button wire:click="nextPage" class="page-link" {{ $occurrences->hasMorePages() ? '' : ' disabled' }}>
                            {{ __('Próximo') }}
                        </button>
                    </li>
                </ul>
            </div>
        @endif

    </div>
</div>


