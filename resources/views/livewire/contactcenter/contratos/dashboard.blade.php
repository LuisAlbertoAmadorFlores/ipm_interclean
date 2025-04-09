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
    @isset($persona[0]->idColaborador)
        <div class="mx-5">
            <div class="d-flex flex-wrap justify-content-center mt-5 gap-3">
                
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
                                    <div class="bg-dark rounded mb-2 text-light">
                                        <span class="pe-2">Registrado por: {{ $persona[0]->name }}
                                        </span>
                                    </div>
                                    <div class="bg-light text-dark rounded text-capitalize">

                                        <div class="bg-dark rounded-top">
                                            <span class="text-light ps-2">Datos Personales</span>
                                        </div>
                                        <div class=" d-flex justify-content-around">
                                            <span class=" "><b>Nombre:</b>
                                                {{ $persona[0]->Nombre }}
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
                <div class="botonera">
                    <button type="button" class="btn-opc-contac d-flex flex-column" data-bs-toggle="modal"
                        data-bs-target="#validacioncorreo">
                        <i class="fa-solid fa-envelope fa-3x"></i>
                        Validar Correo
                    </button>
                </div>
                <div class="modal fade" id="validacioncorreo" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                        <div class="modal-content degradado-modal">
                            <div class="modal-header text-light">
                                <h5 class="modal-title" id="modalTitleId">
                                    Validacion de Correo
                                </h5>
                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @livewire('components.validacion-correo')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="botonera">
                    <button type="button" class="btn-opc-contac d-flex flex-column" data-bs-toggle="modal"
                        data-bs-target="#creacionusuario">
                        <i class="fa-solid fa-user fa-3x"></i>
                        Habilitar Usuario
                    </button>
                </div>
                <div class="modal fade" id="creacionusuario" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                        <div class="modal-content degradado-modal">
                            <div class="modal-header text-light">
                                <h5 class="modal-title" id="modalTitleId">
                                    Habilitar Usuario
                                </h5>
                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center">
                                    @isset($persona[0]->idColaborador)
                                        @livewire('components.activar-usuario-contratos', ['idColaborador' => $persona[0]->idColaborador, 'Email' => $persona[0]->Email, 'Nombre' => $persona[0]->Nombre_Colaborador . ' ' . $persona[0]->Apellido_Paterno . ' ' . $persona[0]->Apellido_Materno, 'Myid' => Auth::user()->id], key($persona[0]->idColaborador))
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="botonera">
                    <button type="button" class="btn-opc-contac d-flex flex-column " data-bs-toggle="modal"
                        data-bs-target="#validarINE"><i class="fa-solid fa-id-card fa-3x"></i>
                        Validar INE
                    </button>
                </div>

                <div class="modal fade" id="validarINE" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content degradado-modal">
                            <div class="modal-header">
                                <h5 class="modal-title text-light" id="modalTitleId">
                                    Validacion de INE
                                </h5>
                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @isset($persona[0]->Email)
                                    <div class="d-flex justify-content-around w-100 mb-3 degradado rounded p-2 text-light">
                                        <div class="d-flex flex-column col-5 ">
                                            <label for="">INE Frontal</label>
                                            @php
                                                echo "<embed
                                                        src='http://intranetipm.ddns.net:5000/manage_contract/prosman/src/temporal/" .
                                                    $persona[0]->Email .
                                                    "/frontal.jpg'
                                                        type=''>";
                                            @endphp
                                        </div>
                                        <div class="d-flex flex-column col-5">
                                            <label for="">INE Trasera</label>
                                            @php
                                                echo "<embed
                                                        src='http://intranetipm.ddns.net:5000/manage_contract/prosman/src/temporal/" .
                                                    $persona[0]->Email .
                                                    "/detras.jpg'
                                                        type=''>";
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        @livewire('components.validar-ine', ['email' => $persona[0]->Email])
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
                <div class="botonera">
                    <button type="button" class="btn-opc-contac d-flex flex-column " data-bs-toggle="modal"
                        data-bs-target="#validarFirma"><i class="fa-solid fa-signature fa-3x"></i>
                        Validar Firma
                    </button>
                </div>
                <!-- Modal Body -->
                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div class="modal fade" id="validarFirma" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content degradado-modal">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">
                                    Validacion Firma
                                </h5>
                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @isset($persona[0]->idColaborador)
                                    <div class="d-flex justify-content-around w-100 mb-3">
                                        <div class="d-flex flex-column col-5">
                                            <label for="">Firma</label>
                                            @php
                                                echo "<embed
                                                        src='http://intranetipm.ddns.net:5000/manage_contract/prosman/src/firmas/contratos/" .
                                                    $persona[0]->idColaborador .
                                                    ".png'
                                                        type=''>";
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        @livewire('components.validar-ine', ['email' => $persona[0]->Email])
                                    </div>
                                @endisset

                            </div>
                        </div>
                    </div>
                </div>
                <div class="botonera">
                    <button type="button" class="btn-opc-contac d-flex flex-column" data-bs-toggle="modal"
                        data-bs-target="#documentacion">
                        <i class="fa-regular fa-file-pdf fa-3x"></i> Contrato
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
                                @isset($persona[0]->idColaborador)
                                    @php
                                        echo "<embed class='w-100' style='height:60vh'
                                                        src='http://intranetipm.ddns.net:5000/lala/public/storage/colaboradores/" .
                                            $persona[0]->idColaborador .
                                            "/contrato_digital.pdf'
                                                        type=''>";
                                    @endphp
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>@endisset

</div>
