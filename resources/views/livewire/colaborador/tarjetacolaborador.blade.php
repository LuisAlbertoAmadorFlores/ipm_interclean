<div class="d-flex" style="height: 100%;">
    @if (isset($byColaborador) != '')
        <div class="col-lg-6 col-md-6 pt-2 position-relative">
            <div class="p-3">
                <img class="rounded imagengrande" src="{{ asset($foto) }}" alt="Foto Colaborador Prosman" width="100%"
                    height="410px" style="box-shadow:rgba(255, 255, 255, 0.507) 1px 1px 5px;backdrop-filter: blur(14px);">
            </div>
            @livewire('colaborador.qr.obtenerqr', ['idColaborador' => $byColaborador[0]->id_colaborador])
        </div>
        <div class="col-lg-6 col-md-6 text-light rounded-end d-flex flex-column">
            <div class="pt-3">
                <div class="d-flex">
                    <span class="text-static">ID:</span>
                    <div id="idTarjetaUpdate">{{ $byColaborador[0]->id_colaborador }}</div>
                </div>
                <div class="text-capitalize">
                    <span class="text-static">Nombre:</span> {{ $byColaborador[0]->Nombre_Colaborador }}
                    {{ $byColaborador[0]->Apellido_Paterno }}
                    {{ $byColaborador[0]->Apellido_Materno }}
                </div>
                <div>
                    <span class="text-static">Status:</span>
                    @switch($byColaborador[0]->Status)
                        @case(0)
                            Activo
                        @break

                        @case(1)
                            Baja
                        @break

                        @case(2)
                            En Proceso Baja
                        @break

                        @case(3)
                            Re-Ingreso
                        @break

                        @default
                    @endswitch
                </div>
                <div>
                    <span class="text-static">CEDIS:</span> {{ $byColaborador[0]->Region }} /
                    {{ $byColaborador[0]->Nombre_Cedis }}
                </div>
                <div>
                    <span class="text-static">Fecha Ingreso:</span> @php
                        echo date('d-m-Y', strtotime($byColaborador[0]->Fecha_Ingreso));
                    @endphp
                </div>
            </div>
            <div>
                @if (Auth::user()->rol == 'Reclutador' ||
                        Auth::user()->rol == 'Coordinador' ||
                        Auth::user()->rol == 'Sistemas' ||
                        Auth::user()->rol == 'Gerente')
                    <div class="mt-3 mb-3">
                        <div class="botonera">
                            <button type="button" class="col-lg-11 col-md-12" data-bs-toggle="modal"
                                data-bs-target="#informacionPersonal">
                                <i class="fa-solid fa-folder fa-md m-1"></i> Información Personal
                            </button>
                        </div>
                        <div class="modal fade" id="informacionPersonal" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                role="document">
                                <div class="modal-content"
                                    style="background-color:rgba(32, 96, 164, 0.808);backdrop-filter: blur(14px);">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Información General
                                        </h5>
                                        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="bg-dark rounded mb-2">
                                            <span class="pe-2">Registrado por: {{ $byColaborador[0]->name }}</span>
                                        </div>
                                        <div class="bg-light text-dark rounded text-capitalize">

                                            <div class="bg-dark rounded-top">
                                                <span class="text-light ps-2">Datos
                                                    Personales</span>
                                            </div>
                                            <div class=" d-flex justify-content-around">
                                                <span class=" "><b>Nombre:</b>
                                                    {{ $byColaborador[0]->Nombre_Colaborador }}
                                                </span>
                                                <span class=""><b>Apellido Paterno:</b>
                                                    {{ $byColaborador[0]->Apellido_Paterno }}</span>

                                                <span class=""> <b>Apellido Materno:
                                                    </b>{{ $byColaborador[0]->Apellido_Materno }}
                                                </span>
                                            </div>
                                            <div class=" d-flex justify-content-around">
                                                <span class=""><b>Edad: </b>{{ $byColaborador[0]->Edad }}
                                                    años</span>
                                                <span class=""><b>Dirección:</b>
                                                    {{ $byColaborador[0]->Direccion_Colaborador }}</span>
                                                <span><b>Municipio:</b> {{ $byColaborador[0]->Municipio }}</span>
                                            </div>
                                            <div class=" d-flex justify-content-around">
                                                <span class=""><b>Estado:
                                                    </b>{{ $byColaborador[0]->Estado }}</span>
                                                <span><b>Codigo
                                                        Postal: </b>{{ $byColaborador[0]->Codigo_Postal }}</span>

                                                <span> <b>Nivel de Estudios:
                                                    </b>{{ $byColaborador[0]->Estudios }}</span>
                                            </div>
                                        </div>
                                        <div class="bg-light text-dark mt-3 rounded">
                                            <div class="bg-dark rounded-top">
                                                <span class="text-light ps-2">Datos de
                                                    Contacto
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <span><b>Telefono: </b>{{ $byColaborador[0]->Telefono }}</span>
                                                <span><b>Correo Electronico:</b> {{ $byColaborador[0]->Email }}</span>
                                            </div>
                                        </div>
                                        <div class="bg-light text-dark mt-3 rounded text-capitalize">
                                            <div class="bg-dark rounded-top">
                                                <span class="text-light ps-2">Datos de
                                                    Emergencia
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <span class=""><b>Nombre:</b>
                                                    {{ $byColaborador[0]->Emergencia_Nombre }} </span>
                                                <span class=""><b>Parentesco:
                                                    </b>{{ $byColaborador[0]->Emergencia_Parentesco }}</span>
                                                <span class=""><b>Telefono:</b>
                                                    {{ $byColaborador[0]->Emergencia_Telefono }} </span>
                                            </div>
                                        </div>
                                        <div class="bg-light text-dark mt-3 rounded text-capitalize">
                                            <div class="bg-dark rounded-top">
                                                <span class="text-light ps-2">
                                                    Datos Complementarios</span>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <span><b>CURP: </b>{{ $byColaborador[0]->CURP }}</span>
                                                <span><b>S.M.N: </b>{{ $byColaborador[0]->SMN }}</span><span><b>RFC:
                                                    </b>{{ $byColaborador[0]->RFC }}</span>
                                                <span><b>NSS:</b> {{ $byColaborador[0]->NSS }}</span>
                                                {{-- <span><b>CUIP: </b>{{ $byColaborador[0]->CUIP }}</span> --}}
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <span><b>Descuento via Nomina: </b>
                                                    @if ($byColaborador[0]->Descuento_Nomina === '0')
                                                        SI
                                                    @else
                                                        NO
                                                    @endif
                                                </span><span><b>Discapacidad: </b>
                                                    @if ($byColaborador[0]->Discapacidad === '0')
                                                        SI
                                                    @else
                                                        NO
                                                    @endif
                                                </span> <span><b>Credito Infonavit/Fonacot: </b>
                                                    @if ($byColaborador[0]->Credito_Infonavit_Fonacot === '0')
                                                        SI
                                                    @else
                                                        NO
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="bg-light text-dark mt-3 rounded">
                                            <div class="bg-dark rounded-top">
                                                <span class="text-light ps-2">Datos del
                                                    Puesto
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <span class=""><b>Zona: </b>{{ $byColaborador[0]->Region }} /
                                                    {{ $byColaborador[0]->Nombre_Cedis }}</span>

                                                <span class=""><b>Proyecto: </b>
                                                    {{ $byColaborador[0]->Nombre_Corto_Proyecto }}</span>
                                                <span class=""><b>Puesto:
                                                    </b>{{ $byColaborador[0]->Puesto }}</span>

                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <span class=""><b>Salario (Mensual): </b>
                                                    ${{ $byColaborador[0]->Salario }}.00</span>
                                                <span class=""><b>Bono: </b>
                                                    ${{ $byColaborador[0]->Bono }}.00</span>
                                            </div>

                                        </div>
                                        <div class="bg-light text-dark mt-1 rounded">
                                            <div class="bg-dark rounded-top">
                                                <span class="text-light ps-2">Datos
                                                    Bancarios
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <span class=""><b>Banco:</b> {{ $byColaborador[0]->Banco }}
                                                </span>
                                                <span class=""><b>CLABE:
                                                    </b>{{ $byColaborador[0]->Clave_Interbancaria }}</span>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <span class=""><b>No. Cuenta: </b>
                                                    {{ $byColaborador[0]->Numero_Cuenta }} </span>

                                                <span class=""><b>No.
                                                        Tarjeta: </b>{{ $byColaborador[0]->Numero_Tarjeta }}</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        @if (Auth::user()->rol == 'Coordinador' || Auth::user()->rol == 'Sistemas')
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#personal{{ $byColaborador[0]->id_colaborador }}">
                                                Editar Datos Personales
                                            </button>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#laboral{{ $byColaborador[0]->id_colaborador }}">
                                                Editar Datos Laborales
                                            </button>
                                        @endif
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                            Cerrar
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <div class="botonera">
                    <button type="button" class="btn btn-secondary col-lg-11 col-md-12 text-static"
                        data-bs-toggle="modal" data-bs-target="#documentacion">
                        <i class="fa-solid fa-folder fa-md m-1"></i> Documentos
                    </button>
                </div>
                <div class="modal fade" id="documentacion" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content"
                            style="background-color:rgba(32, 96, 164, 0.808);backdrop-filter:blur(14px)">
                            <div class="modal-header">
                                <h5 class="modal-title text-light" id="modalTitleId">
                                    Visualizar Documento </h5>
                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @livewire('colaborador.documentos', ['id' => $byColaborador[0]->id_colaborador])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                @if (Auth::user()->rol == 'Reclutador' ||
                        Auth::user()->rol == 'Coordinador' ||
                        Auth::user()->rol == 'Sistemas' ||
                        Auth::user()->rol == 'Gerente')
                    <div class="botonera">
                        <a href="./fichatecnica/{{ $byColaborador[0]->idColaborador }}" target="_blank"
                            class="btn btn-light col-lg-11 col-md-12 text-static"><i class="fa-solid fa-file"></i>
                            Ficha Técnica</a>
                    </div>
                @endif
            </div>
            
            <div class="modal fade" id="laboral{{ $byColaborador[0]->id_colaborador }}" tabindex="-1"
                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content" style="background-color:rgba(32, 96, 164, 0.808);">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                                Actualizar Información Complementaria
                            </h5>
                        </div>
                        <div class="modal-body">
                            @livewire('colaborador.editar-laboral', ['id' => $byColaborador[0]->id_colaborador])
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="personal{{ $byColaborador[0]->id_colaborador }}" tabindex="-1"
                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content text-light" style="background-color:rgba(32, 96, 164, 0.808);">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                                Actualizar Información Personal
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @livewire('colaborador.editar-personal', ['id' => $byColaborador[0]->id_colaborador])
                        </div>
                    </div>
                </div>
            </div>
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
