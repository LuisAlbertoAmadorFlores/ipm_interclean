<div class="col-lg">
    <label for="" class="pt-4">Codigo de ConfirmaciónBaja</label>
    <input class="form-control text-center" type="text" name="codigoEliminacion" wire:model="inputConfirmacion"
        id="codigoEliminacion" placeholder="">
    @error('inputConfirmacion')
        <small class="error text-dark">{{ $message }}</small>
    @enderror
    <div class="my-2">
        <label for="">Fecha de Baja</label>
        <input type="date" name="" id="" class="form-control" wire:model="fechaBaja">
    </div>
    <div class="my-2">
        <label for="">Cantidad Adeudada</label>
        <input type="text" name="" id="" class="form-control" wire:model="adeudo">
    </div>
    <div class="d-flex justify-content-center">
        <button class="btn btn-dark mx-3  mt-4" wire:click="turnarJuridico()">Turnar</button>
        <button class="btn btn-danger mx-3  mt-4" data-bs-dismiss="modal">Cancelar</button>
    </div>
</div>
