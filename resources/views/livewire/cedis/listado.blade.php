<div class="d-flex ">
    <div>
        
        <select class="form-control me-3 mb-3" id="" wire:model="region">
            <option value="">Selecciona una region</option>
            <option value="Valle Mexico">Valle de Mexico</option>
            <option value="Occidente">Occidente</option>
            <option value="Norte">Norte</option>
            <option value="Sur">Sur</option>
            <option value="Noreste">Noreste</option>
            <option value="Centro">Centro</option>
        </select>
        @error('region')
            <small>{{$message}}</small>
        @enderror
    </div>
    <div class="mx-3">
        @if ($flat == true)
            <button class="btn btn-primary " wire:click="buscar()">
                Obtener Cedis
            </button>
        @else
            <button class="btn btn-warning " wire:click="limpiar()">Limpiar Busqueda</button>
        @endif

    </div>
</div>
