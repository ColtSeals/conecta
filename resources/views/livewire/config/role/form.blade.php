<div>
    <form wire:submit="save" autocomplete="off">
        <div wire:ignore class="form-floating form-floating-outline">
            <select id="select2battalion" wire:model="selectedRole" class="form-select @error('battalion') is-invalid @enderror" aria-label="nature">
                <option value="" selected disabled>{{ __('Selecione o perfil') }}</option>

                @php
                    // Define role translations in Portuguese
                    $roleTranslations = [
                        'atendent' => __('ATENDENTE'),
                        'dispatcher' => __('DESPACHADOR'),
                        'supervision' => __('SUPERVISÃO'),
                        'manager' => __('STQ'),
                        'certificates' => __('CERTIDÕES'),
                        'technique' => __('TÉCNICA'),
                        'superadmin' => __('SUPER ADMIN'),
                    ];

                    // Fetch roles ordered by the "order" column
                    $roles = auth()->user()->roles()->orderBy('order')->get();
                @endphp

                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $roleTranslations[$role->name] }}</option>
                @endforeach
            </select>
            <x-input-error for="battalion" />
        </div>


        <x-secondary-button type="submit" class="d-grid w-100 mt-3">
            {{ __('Avançar') }}
        </x-secondary-button>
    </form>

    @push('custom-script')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                $('#select2battalion').on('change', function (e) {
                    @this.set('selectedRole', e.target.value);
                });
            });
        </script>
    @endpush

</div>
