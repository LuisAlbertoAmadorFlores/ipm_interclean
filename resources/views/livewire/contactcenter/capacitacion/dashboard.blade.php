<div class="mx-2 bg-light w-100 rounded">
    <div class="position-relative">
        <img src="{{ asset('img/background_atc.jpg') }}" alt="" class="rounded-top" style="height:25vh;width:100%">
        <div class="fw-bold h5 text-capitalize position-absolute top-0 mt-5 ms-4 d-flex flex-column">
            <span>ID: @isset($persona[0]->idColaborador)
                    {{ $persona[0]->idColaborador }}
                @endisset </span>
            <span>Nombre: @isset($persona[0]->Nombre_Colaborador)
                    {{ $persona[0]->Nombre_Colaborador }} {{ $persona[0]->Apellido_Paterno }}
                    {{ $persona[0]->Apellido_Materno }}
                @endisset
            </span>
            <span>Region/CEDIS: @isset($persona[0]->Nombre_Cedis)
                    {{ $persona[0]->Region_Cedis }}/{{ $persona[0]->Nombre_Cedis }}
                @endisset
            </span>
        </div>
    </div>
    {{-- <div>
        <div class="d-flex justify-content-center align-items-center border-bottom" style="height: 10vh">
            <div class="border rounded py-1 px-3 h1 bg-dark text-light"><span>00</span>: <span>00</span>:
                <span>00</span> <span class="text-warning"><i class="fa-solid fa-circle-play"></i></span>
            </div>
        </div>
    </div> --}}
    <div class="mx-5">
        <div class="d-flex flex-wrap justify-content-center mt-5 gap-3">
            @isset($persona[0]->idColaborador)
                <div class="botonera">
                    <button type="button" class="d-flex flex-column btn-opc-contac" data-bs-toggle="modal"
                        data-bs-target="#informacionPersonal">
                        <i class="fa-solid fa-phone me-1 fa-3x"></i> Contacto
                    </button>
                </div>
                <div class="modal fade" id="informacionPersonal" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content degradado-modal">
                            <div class="modal-header">
                                <h5 class="modal-title text-light" id="modalTitleId">
                                    Información General
                                </h5>
                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @isset($persona)
                                    <div class="bg-light text-dark rounded text-capitalize">

                                        <div class="bg-dark rounded-top">
                                            <span class="text-light ps-2">Datos Personales</span>
                                        </div>
                                        <div class=" d-flex justify-content-around">
                                            <span class=" "><b>Nombre:</b>
                                                {{ $persona[0]->Nombre_Colaborador }}
                                            </span>
                                            <span class=""><b>Apellido Paterno:</b>
                                                {{ $persona[0]->Apellido_Paterno }}</span>

                                            <span class=""> <b>Apellido Materno:
                                                </b>{{ $persona[0]->Apellido_Materno }}
                                            </span>
                                        </div>
                                        <div class=" d-flex justify-content-around">
                                            <span class=""><b>Edad: </b>{{ $persona[0]->Edad }}
                                                años</span>
                                            <span class=""><b>Dirección:</b>
                                                {{ $persona[0]->Direccion_Colaborador }}</span>
                                            <span><b>Municipio:</b> {{ $persona[0]->Municipio }}</span>
                                        </div>
                                        <div class=" d-flex justify-content-around">
                                            <span class=""><b>Estado:
                                                </b>{{ $persona[0]->Estado }}</span>
                                            <span><b>Codigo
                                                    Postal: </b>{{ $persona[0]->Codigo_Postal }}</span>

                                            <span> <b>Nivel de Estudios:
                                                </b>{{ $persona[0]->Estudios }}</span>
                                        </div>
                                    </div>
                                    <div class="bg-light text-dark mt-3 rounded">
                                        <div class="bg-dark rounded-top">
                                            <span class="text-light ps-2">Datos de
                                                Contacto
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-around">
                                            <span><b>Telefono: </b>{{ $persona[0]->Telefono }}</span>
                                            <span><b>Correo Electronico:</b>
                                                {{ $persona[0]->Email }}</span>
                                        </div>
                                    </div>
                                @endisset

                            </div>

                        </div>
                    </div>
                </div>
                @php
                    $nombre_fichero =
                        'storage/Colaboradores/' . $persona[0]->idColaborador . '/Otros/Capacitación PROSMAN APP.pdf';
                    if (file_exists($nombre_fichero)) {
                        echo "<div class='botonera'>
                <button type='button' class='btn-opc-contac d-flex flex-column' data-bs-toggle='modal'
                    data-bs-target='#creacionusuario'>
                    <i class='fa-solid fa-user fa-3x'></i>
                    Comprobante
                </button>
            </div><div class='botonera'>
                <button type='button' class='btn-opc-contac d-flex flex-column' data-bs-toggle='modal'
                    data-bs-target='#seguimiento'>
                    <i class='fa-solid fa-arrows-turn-to-dots fa-3x'></i>
                    Seguimiento
                </button>
            </div>";
                    } else {
                        echo "<div class='botonera'>
                <button type='button' class='btn-opc-contac d-flex flex-column' data-bs-toggle='modal'
                    data-bs-target='#adjuntar'>
                    <i class='fa-solid fa-user fa-3x'></i>
                    Subir Prueba
                </button>
            </div>";
                    }
                @endphp
            @endisset

            <div class="modal fade" id="adjuntar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                    <div class="modal-content degradado-modal">
                        <div class="modal-header text-light">
                            <h5 class="modal-title" id="modalTitleId">
                                Adjuntar Archivo
                            </h5>
                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-light">
                            <div style="80vh">
                                @isset($persona[0]->idColaborador)
                                    @livewire('contactcenter.capacitacion.savecomprobantecapacitacion', ['idColaborador' => $persona[0]->idColaborador])
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="creacionusuario" tabindex="-1" data-bs-backdrop="static"
                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content degradado-modal">
                        <div class="modal-header text-light">
                            <h5 class="modal-title" id="modalTitleId">
                                Comprobante
                            </h5>
                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div style="80vh">
                                @isset($persona[0]->idColaborador)
                                    <embed
                                        src="{{ asset('storage/Colaboradores/' . $persona[0]->idColaborador . '/Otros/Capacitación PROSMAN APP.pdf') }}"
                                        width="100%" height="80" allowfullscreen style="height: 80vh"
                                        class="scrollbar">
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="seguimiento" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-fullscreen"
                    role="document">
                    <div class="modal-content degradado-modal">
                        <div class="modal-header text-light">
                            <h5 class="modal-title" id="modalTitleId">
                                Seguimiento
                            </h5>
                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div style="height: 90vh">
                                <embed src="http://intranetipm.ddns.net:5000/reporteador/" type=""
                                    width="100%" height="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
