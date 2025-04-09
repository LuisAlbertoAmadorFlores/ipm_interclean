<div class="d-flex me-3" style="height: 100%;">
    @if (isset($byColaborador) != '')
        <div class="col-lg-6 col-md-6 pt-2">
            <div class="p-3">
                <img class="rounded imagengrande" src="{{ asset($foto) }}" alt="Foto Colaborador CRS" width="100%"
                    height="410px" style="box-shadow:rgba(255, 255, 255, 0.507) 1px 1px 5px;backdrop-filter: blur(14px);">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 text-light  rounded d-flex flex-column mt-4 px-2"
           >
            <div class="">
                <div class="d-flex">
                    <span class="text-static">Generar Descuento</span>
                </div>
                <div class="text-capitalize">
                    <span class="text-static">Nombre:</span> {{ $byColaborador[0]->Nombre }}
                    {{ $byColaborador[0]->Apellido_Paterno }}
                    {{ $byColaborador[0]->Apellido_Materno }}
                </div>
                <div>
                    <span class="text-static">Proyecto:</span> {{ $byColaborador[0]->Proyecto_Asignado }}
                </div>
            </div>
            <div class="">
                @livewire('administrativo.generar-descuento', ['idColaborador' => $byColaborador[0]->id_colaborador, 'idCoordinador' => Auth::user()->id])
            </div>
        </div>
    @else
        <div class="col-lg-6 col-md-6 pt-2">
            <div class="py-3 px-3">
                <img class="rounded degradado-tarjeta" id="foto" src="{{ asset('img/tarjeta.png') }}"
                    alt="Foto Colaborador CRS" width="100%" height="410px">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 text-light py-3 rounded-end d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <span class="text-center h1">PROSMAN</span>
                <span class="text-center" style="letter-spacing: 2px">LIMPIEZA Y MANTENIENTO EMPRESARIAL</span>
            </div>
        </div>
    @endif
</div>
