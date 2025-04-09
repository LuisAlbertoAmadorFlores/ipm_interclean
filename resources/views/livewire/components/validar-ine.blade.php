<div class="d-flex flex-column">
    <div class="d-flex flex-column border p-2 rounded" style="background: rgba(255, 255, 255, 0.171)">
        {{-- <div class="form-check"> --}}
        {{-- @if ($validada[0]->status_ine == 0) --}}
        {{-- <input class="form-check-input" type="checkbox" value="" id="" wire:model="estatusIne"
                class="bg-dark shadow" />
            <label class="form-check-label" for=""> Validar INE como correcta </label> --}}
        {{-- @else --}}
        {{-- @endif --}}
        {{-- </div> --}}
{{-- 
        @if ($validada[0]->status_ine == 0) --}}
            <div class="form-check">
                <input class="form-check-input" type="radio" name="" id="correcta" wire:model="estatusIne"
                    value="aceptado" />
                <label class="form-check-label" for="">Validar INE como correcta </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="" id="incorrecta" wire:model="estatusIne"
                    value="rechazado" />
                <label class="form-check-label" for="">Rechazar INE como incorrecta </label>
            </div>
            <button class="btn btn-dark mt-2" wire:click="saveEstatus()">Guardar Estatus</button>
        {{-- @endif --}}


    </div>

</div>
