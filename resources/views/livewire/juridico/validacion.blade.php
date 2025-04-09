<div class="col-lg">
    <label for="" class="pt-4 text-light">Codigo de Confirmación</label>
    <input class="form-control text-center" type="text" name="codigoEliminacion" wire:model="codigoConfirmacion"
        id="codigoEliminacion" placeholder="" autocomplete="off">
    @error('codigoConfirmacion')
        <small class="error text-warning">{{ $message }}</small>
    @enderror
    <div class="d-flex justify-content-center">
        <button class="btn btn-dark mx-3  mt-4" wire:click="generarBaja()">Generar</button>
        <button class="btn btn-danger mx-3  mt-4" data-bs-dismiss="modal">Cancelar</button>
    </div>
</div>
