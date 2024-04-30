<li>
    <a class="dropdown-item"
       href="javascript:void(0);"
       wire:click.prevent="$dispatch('showModal', { alias: 'components.password.form', maxWidth: 'lg' })">
        <i class='mdi mdi-logout me-2'></i>
        <span class="align-middle">{{ __('Alterar Senha') }}</span>
    </a>
</li>
