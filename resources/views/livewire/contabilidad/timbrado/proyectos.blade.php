<div class="d-flex flex-column">
    <div class="d-flex flex-column border rounded p-2 mb-2 bg-light">
        <label class="h6">Proyecto</label>
        <select class="form-control" wire:model="proyecto">
            <option value=""># | Seleciona un proyecto</option>
            @foreach ($resultados as $proyecto)
                <option value="{{ $proyecto->idProyecto }}">{{ $proyecto->idProyecto }} |
                    {{ $proyecto->Nombre_Largo_Proyecto }}</option>
            @endforeach
        </select>
        @error('proyecto')
            <small>{{ $message }}</small>
        @enderror
        <label class="h6 mt-3">Region</label>
        <select class="form-control" wire:model="region">
            <option value=""># | Seleciona un proyecto</option>
            @foreach ($resultados as $proyecto)
                <option value="Valle Mexico">Valle de Mexico</option>
                <option value="Occidente">Occidente</option>
                <option value="Norte">Norte</option>
                <option value="Sur">Sur</option>
                <option value="Centro">Centro</option>
                <option value="Noreste">Noreste</option>
            @endforeach
        </select>
        @error('region')
            <small>{{ $message }}</small>
        @enderror
        <button class="btn btn-success mt-3" wire:click="buscarPlantilla()">Generar Entregables</button>
    </div>
    @if ($flat == false)
        <hr class="text-light">
        <div class="d-flex gap-2 mb-3">
            <div class="bg-light shadow rounded px-2 d-flex flex-column justify-content-center">
                <label class="border-bottom">TIMBRADO</label>
                <a class="btn btn-success p-3 mx-auto my-2" href="./timbrado/{{ $seleccion }}/{{$theregion}}">
                    <i class="fa-solid fa-download fa-2x"></i><br> Descargar</a>
            </div>
            <div class="bg-light rounded p-2 d-flex flex-column justify-content-center">
                <label class="border-bottom">SUA</label>
                <a class="btn btn-success p-3 mx-auto my-2" href="./sua/{{ $seleccion }}"><i
                        class="fa-solid fa-download fa-2x"></i></i><br> Descargar</a>
            </div>
            <div class="bg-light rounded p-2 d-flex flex-column justify-content-center">
                <label class="border-bottom">PERSONAL ACTIVO</label>
                <select class="form-select" id="" wire:model="personal">
                    <option selected>Elije una opción</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Quincenal">Quincenal</option>
                </select>

                <a class="btn btn-success  mx-auto my-2" href="./personal/{{ $seleccion }}/{{ $personal }}">
                    Descargar </a>
            </div>
        </div>
    @endif

</div>
