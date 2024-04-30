<div>
    <div id="laravel-livewire-modals" tabindex="-1"
         data-bs-backdrop="static" data-bs-keyboard="false"
         wire:ignore.self class="modal fade"
    >
        <div class="modal-dialog modal-{{ $maxWidth ?? 'xxl' }} modal-dialog-centered">
            @if($alias)
                <div class="modal-content">
                    @livewire($alias, $params, key($alias))
                </div>
            @endif
        </div>
    </div>
</div>
