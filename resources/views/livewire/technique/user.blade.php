<div>
    <h4 class="py-1 d-flex justify-content-lg-between flex-column flex-sm-row align-items-center">
        <span>
            <span class="text-muted fw-light"></span> {{ __('Gerenciar Usuários') }}
        </span>

        <div class="btn-group">
            <x-secondary-button wire:click="showUser">
                {{ __('Cadastrar Usuário') }}
            </x-secondary-button>
        </div>
    </h4>

    <div class="row">
        <div class="col-12">
            <livewire:technique.user.table />
        </div>
    </div>
</div>
