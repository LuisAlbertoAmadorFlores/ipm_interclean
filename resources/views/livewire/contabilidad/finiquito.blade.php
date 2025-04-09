<div>
    <div class="input-group">
        <input type="text" name="" id="" class="form-control" wire:model="finiquito">
        @error('finiquito')
            
        @enderror
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" wire:click="asignarFiniquito()">Autorizar</button> <button
            type="button" class="btn btn-danger" data-bs-dismiss="modal">
            Cancelar
        </button>
    </div>
</div>
