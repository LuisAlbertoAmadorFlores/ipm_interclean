<div class="rounded p-3   table-hover" style="height:100%">
    <div class="py-2 ps-1 col-12 rounded-top w-100 d-flex py-2 border-bottom"
        style="background: rgba(255, 255, 255, 0.534);">
        <span class="col-1 text-dark text-center">ID</span>
        <span class="col-8 text-dark">Nombre</span>
        <span class="text-dark">Detalles</span>
    </div>
    <div class="scrollbar bg-light rounded-bottom text-capitalize boxbusqueda">
        @if (isset($listColaborador) != '')
            @if (count($listColaborador) != 0)
                @foreach ($listColaborador as $colaborador)
                    <div class="w-100 d-flex py-2 border-bottom listabusqueda">
                        <span class="col-1 text-center d-flex flex-column ">{{ $colaborador->idColaborador }}
                        </span>
                        <span class="col-8 ps-2">{{ $colaborador->Nombre }} {{ $colaborador->Apellido_Paterno }}
                            {{ $colaborador->Apellido_Materno }}
                            @if ($colaborador->Total_Auditados == '10')
                                <i class="fa-solid fa-circle-check text-success"></i>
                            {{-- @else
                                <i class="fa-solid fa-comments"></i> --}}
                            @endif
                        </span>
                        <span class="pe-2">
                            <button type="submit" class="btn btn-sm btn-busqueda"
                                onclick="sendIDColaborador({{ $colaborador->idColaborador }})"><i
                                    class="fa-solid fa-folder-open"></i> Mostrar</button>
                        </span>
                    </div>
                @endforeach
            @else
                <div class="w-100 d-flex py-2 ">
                    <span class="w-100 text-center"><i class="fa-solid fa-face-sad-tear"></i> Ninguna
                        coincidencia</span>
                </div>
            @endif
        @endif
    </div>
    <script>
        function sendIDColaborador(id) {
            Livewire.emit('buscarTarjetaColaborador', id)
        }
    </script>
</div>