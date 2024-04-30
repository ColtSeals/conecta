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
                        <th>{{ __('STATUS') }}</th>
                        <th>{{ __('CÓDIGO') }}</th>
                        <th>{{ __('DESCRIÇÃO') }}</th>
                        <th class="text-center">{{ __('AÇÕES') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @if($natures->total() > 0)
                        @foreach($natures as $nature)
                            <tr>
                                <td>
                                    <span class="badge bg-{{ $nature->active ? 'success' : 'danger' }}">
                                        {{ __(':status', ['status' => $nature->active ? 'Ativo' : 'Desativado' ]) }}
                                    </span>
                                </td>

                                <td>{{ $nature->code }}</td>
                                <td>{{ $nature->description }}</td>
                                <td  class="text-center">
                                    <span class="text-nowrap">
                                       <button wire:click="toggleNatureStatus('{{ $nature->id }}')" class="btn btn-sm btn-icon {{ $nature->active ? 'btn-text-success' : 'btn-text-danger' }} rounded-pill btn-icon me-2"
                                               aria-label="{{ $nature->active ? __('Desativar Natureza') : __('Ativar Natureza') }}"
                                               data-bs-toggle="tooltip"
                                               data-bs-placement="top"
                                               data-bs-original-title="{{ $nature->active ? __('Desativar Natureza') : __('Ativar Natureza') }}"
                                                >
                                              @if($nature->active)
                                                  <span class="mdi mdi-cloud-check-outline mdi-20px"></span>
                                              @else
                                                  <span class="mdi mdi-cloud-off-outline mdi-20px"></span>
                                              @endif
                                        </button>

                                        <button class="btn btn-sm btn-icon btn-text-danger rounded-pill btn-icon delete-record"
                                                wire:click="deleteNature('{{ $nature->id }}')"
                                                aria-label="{{ __('Excluir Batalhão') }}"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="{{ __('Excluir Batalhão') }}">
                                              <i class="mdi mdi-delete-outline mdi-20px"></i>
                                         </button>
                                    </span>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                <div class="text-center">
                                    <i class="fas fa-info-circle"></i> {{ __('Nenhuma Natureza Encontrada.') }}
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        @if($natures->lastPage() > 1)
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item">
                        <button wire:click="previousPage" class="page-link" {{ !$natures->onFirstPage() ? '' : ' disabled' }}>
                            {{ __('Anterior') }}
                        </button>
                    </li>

                    @for ($page = 1; $page <= $natures->lastPage(); $page++)
                        <li class="page-item">
                            <button wire:click="gotoPage({{ $page }})" class="page-link {{ $natures->currentPage() === $page ? 'active' : '' }}" {{ $natures->currentPage() === $page ? 'disabled' : '' }}>
                                {{ $page }}
                            </button>
                        </li>
                    @endfor

                    <li class="page-item">
                        <button wire:click="nextPage" class="page-link" {{ $natures->hasMorePages() ? '' : ' disabled' }}>
                            {{ __('Próximo') }}
                        </button>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</div>
