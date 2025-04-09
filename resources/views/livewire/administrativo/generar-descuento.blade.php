<div class="">
    <fieldset>
        <div><span><b>Fecha:</b> {{ $fechahoy }}</span></div>
        <div class="input-group py-2">
            <label for="" class="input-group-text bg-dark text-light border-0 col-5">Motivo</label>
            <select name="" id="" class="form-control" wire:model="motivo">
                <option value=""></option>
                <optgroup label="Ocasionales">
                    <option value="Retardo">Retardo</option>
                    <option value="Falta">Falta</option>
                    <option value="MalServicio">Mal Servicio</option>
                </optgroup>
                <optgroup label="Temporales">
                    <option value="Uniforme">Uniforme</option>
                    <option value="Reparacion">Reparacion de daños</option>
                </optgroup>
                <optgroup label="Permanentes">
                    <option value="Infonavit">Infonavit</option>
                    <option value="Fonacot">Fonacot</option>
                </optgroup>
            </select>
        </div>

        @if ($motivo == 'Uniforme' || $motivo == 'Reparacion')
            <div class="input-group mb-2 ">
                <label for="" class="input-group-text bg-dark text-light border-0 col-5">Parcialidades</label>
                <input type="number" class="form-control" wire:model="parcialidad">
            </div>
        @endif

        <div class="input-group mb-2">
            <label for="" class="input-group-text bg-dark text-light border-0 col-5">Cantidad</label>
            <input type="number" class="form-control" wire:model="cantidad">
        </div>
        {{-- @error('cantidad')
            <small>{{ $message }}</small>
        @enderror --}}
        <div class="input-group">
            <label for="" class="input-group-text bg-dark text-light border-0 col-5">Descripcion</label>
            <textarea type="number" class="form-control scrollbar" wire:model="descripcion" rows="4" style="resize: none"></textarea>
        </div>
        @if ($errors->any())
            <small>Llena todos los campos</small>
        @endif


        {{-- @error('descripcion')
            <small>{{ $message }}</small>
        @enderror --}}
        <div class="pt-2 mx-auto">
            <button class="btn btn-success w-100" wire:click="registrarDescuento()">Aplicar Descuento</button>
        </div>
    </fieldset>
</div>
