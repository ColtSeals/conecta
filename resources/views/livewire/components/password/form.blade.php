<div>
    <form wire:submit.prevent="changePassword">
        <div class="form-group">
            <label for="currentPassword">Senha Atual</label>
            <input type="password" wire:model.defer="currentPassword" class="form-control" id="currentPassword" placeholder="Digite sua senha atual">
            @error('currentPassword') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="newPassword">Nova Senha</label>
            <input type="password" wire:model.defer="newPassword" class="form-control" id="newPassword" placeholder="Digite a nova senha">
            @error('newPassword') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="confirmNewPassword">Confirmar Nova Senha</label>
            <input type="password" wire:model.defer="confirmNewPassword" class="form-control" id="confirmNewPassword" placeholder="Confirme a nova senha">
            @error('confirmNewPassword') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Alterar Senha</button>
    </form>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>

