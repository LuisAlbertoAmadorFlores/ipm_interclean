<div class="d-flex me-3 entradaDerecha" style="height: 100%;">
    @if (isset($byColaborador) != '')
        <div class="col-lg-6 col-md-6 pt-2 ">
            <div class="mt-3 tarjetalogo rounded mx-3 animate__animated animate__flipInY">
                @if ($foto == 'img/Men.svg' || $foto == 'img/Women.svg')
                    <img class="rounded silueta " src="{{ asset($foto) }}" alt="Foto Colaborador">
                @else
                    <img class="rounded" src="{{ asset($foto) }}" alt="Foto Colaborador" height="100%">
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-6 text-light  rounded d-flex flex-column mt-4 px-2 entradaFantasma">
            <div class="">
                <div class="d-flex">
                    <span class="text-static">Pagos Extras</span>
                </div>
                <div class="text-capitalize">
                    <span class="text-static">Nombre:</span> {{ $byColaborador[0]->Nombre }}
                    {{ $byColaborador[0]->Apellido_Paterno }}
                    {{ $byColaborador[0]->Apellido_Materno }}
                </div>
                <div>
                    <span class="text-static">Proyecto:</span> {{ $byColaborador[0]->Nombre_Corto_Proyecto }}
                </div>
            </div>
            <div class="">
                @livewire('administrativo.pagosextras.motivo', ['idColaborador' => $byColaborador[0]->id_colaborador, 'idCoordinador' => Auth::user()->id])
            </div>
        </div>
    @else
        <div class="col-lg-6 col-md-6 pt-2">
            <div class="mt-3 tarjetalogo rounded mx-3">
                <img class="rounded logo" id="foto" src="{{ asset('img/tarjeta.png') }}" alt="Foto Colaborador CRS">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 text-light py-3 rounded-end d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <span class="text-center h1">IPM</span>
                <span class="text-center text-uppercase" style="letter-spacing: 2px">intelligent personnel
                    management</span>
            </div>
        </div>
    @endif
</div>
