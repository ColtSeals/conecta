<div class="d-flex justify-content-center">
    {{ $logo }}
</div>

<div class="card mt-3">
    <div class="card-body">
        {{ $slot }}

        <div class="divider my-4">
            <div class="divider-text">{{ __('PMESP') }}</div>
        </div>

        <p class="text-center">
            <span>{{ __('Desenvolvido pelo CB-PM Luanque') }}</span>
        </p>
        <p class="text-center">
            <span>{{ __('EQUIPE BRAVO 2024') }}</span>
        </p>
    </div>
</div>
