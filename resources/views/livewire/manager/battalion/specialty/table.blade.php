<div>
    <div class="card border-0">
        <div class="card-header p-3">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label class="d-flex align-items-center">
                        <span>{{ __('Mostrar') }}</span>

                        <select class="form-select ms-2" style="width: 75px;" wire:model.live="perPage">
                            <option value="10" selected="">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                        </select>

                        <span class="ms-2">{{ __('Resultados') }}</span>
                    </label>
                </div>

                <div class="col-sm-12 col-md-6">
                    <label class="d-flex justify-content-md-end align-items-center">
                        {{ __('Pesquisar') }}: <x-input class="ms-md-2" style="width: 250px;" wire:model.live="search" />
                    </label>
                </div>
            </div>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-sm">
                <thead class="table-light">
                <tr>
                    <th>{{ __('Especialidade') }}</th>
                    <th>{{ __('Criado') }}</th>
                    <th>{{ __('Atualizado') }}</th>
                    <th>{{ __('Ações') }}</th>
                </tr>
                </thead>

                <tbody>
                @if($specialties->total() > 0)
                    @foreach($specialties as $specialty)
                        <tr>
                            <td>{{ $specialty->name }}</td>

                            <td>{{ $specialty->created_at->format('d/m/Y - H:i:s A') }}</td>
                            <td>{{ $specialty->updated_at->format('d/m/Y - H:i:s A') }}</td>

                            <td>
                                <span class="text-nowrap">

                                    <button class="btn btn-sm btn-icon btn-text-danger rounded-pill btn-icon delete-record"
                                            wire:click="deleteSpecialty('{{ $specialty->id }}')"
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
                        <td colspan="4">
                            <div class="text-center">
                                <i class="fas fa-info-circle"></i> {{ __('Nenhuma Especialidade Encontrada.') }}
                            </div>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        @if($specialties->lastPage() > 1)
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item">
                        <button wire:click="previousPage" class="page-link" {{ !$specialties->onFirstPage() ? '' : ' disabled' }}>
                            {{ __('Anterior') }}
                        </button>
                    </li>

                    @for ($page = 1; $page <= $specialties->lastPage(); $page++)
                        <li class="page-item">
                            <button wire:click="gotoPage({{ $page }})" class="page-link {{ $specialties->currentPage() === $page ? 'active' : '' }}" {{ $specialties->currentPage() === $page ? 'disabled' : '' }}>
                                {{ $page }}
                            </button>
                        </li>
                    @endfor

                    <li class="page-item">
                        <button wire:click="nextPage" class="page-link" {{ $specialties->hasMorePages() ? '' : ' disabled' }}>
                            {{ __('Próximo') }}
                        </button>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</div>
