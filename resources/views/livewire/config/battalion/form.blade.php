<div>
    <form wire:submit="save" autocomplete="off">
        <div wire:ignore class="form-floating form-floating-outline">
            <select id="select2battalion" class="form-select @error('battalion') is-invalid @enderror" aria-label="nature">
                <option value="" selected disabled>{{ __('Selecione o Batalhão') }}</option>

                @foreach(\App\Models\Battalion::query()->get() as $battalion)
                    <option value="{{ $battalion->id }}">{{ $battalion->name }}</option>
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
            if (select) $('#select2battalion').on('change', function (e) {
                @this.set('battalion', e.target.value);
            });
        </script>
    @endpush
</div>
