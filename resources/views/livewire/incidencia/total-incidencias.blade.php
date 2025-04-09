<div class="">
    <div class="d-flex w-100 bg-dark text-light p-1 py-2">
        <span class="col-3">Información</span>
        <span class="col-6">Descripcion</span>
        <span class="col-2">Evidencia</span>
    </div>
    <div class="scrollbar" style="height:50vh;overflow-y:scroll">

        @if (isset($allIncidencias) != '')
            @foreach ($allIncidencias as $item)
                <div class="d-flex w-100 bg-light text-dark border-bottom py-1">
                    <span class="col-3 ps-2">ID: {{ $item->idIncidencias }} <br>Fecha: {{ $item->Fecha_Incidencia }} <br>
                        Categoria: {{ $item->Categoria }}
                        <br> Incidencia: {{ $item->Tipo_Incidencia }} </span>
                    <span class="col-6">{{ $item->Descripcion }}</span>
                    <span class="col-2 "><button
                            wire:click="downEvidencia({{ $item->id_colaborador }},{{ $item->idIncidencias }})"
                            class="btn btn-outline-dark"><i class="fa-solid fa-download fa-1x"></i>
                            Descargar</button></span>
                </div>
            @endforeach
        @else
            <span>
                <span colspan="6" class="text-center">Sin registros</span>
            </span>
        @endif

    </div>
</div>
