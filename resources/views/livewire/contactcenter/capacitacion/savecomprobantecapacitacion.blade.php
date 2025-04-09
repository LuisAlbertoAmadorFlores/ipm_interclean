<div>
    <label>El archivo sera renombrado como "Capacitación PROSMAN APP"</label>
    <div>
        <input type="file" name="" id="" class="form-control" wire:model="comprobante" accept=".pdf">
    </div>
    <div wire:loading>
        Cargando archivo... por favor espera.
    </div>
    <div wire:loading.remove>
        <button type="button" class="btn btn-warning mt-3"  wire:click="save()">Subir</button>
    </div>
</div>
