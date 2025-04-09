<div class="d-flex" style="height: 100%;">
    @if (isset($byColaborador) != '')
        <div class="col-lg-6 col-md-6 pt-2">
            <div class="p-3">
                <img class="rounded imagengrande" src="{{ asset($foto) }}" alt="Foto Colaborador CRS" width="100%"
                    height="410px" style="box-shadow:rgba(255, 255, 255, 0.507) 1px 1px 5px;backdrop-filter: blur(14px);">
            </div>
        </div>
        <div class="col-col-lg-6 col-md-6 text-light pt-2 rounded-end d-flex flex-column">
            <div class="pt-3 text-capitalize">
                <div class="d-flex ">
                    <span class="text-static">ID:</span>
                    <div id="idTarjetaDelete" class="">{{ $byColaborador[0]->idColaborador }}</div>
                </div>

                <div>
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
            </div>
            <div>
                <div class="mt-3 mb-2">
                    @if ($byColaborador[0]->Status === '0')
                        <button type="button" class="btn btn-success col-lg-11 col-md-12 " data-bs-toggle="modal"
                            data-bs-target="#modalId">
                            <i class="fa-solid fa-gavel"></i> Turnar a Juridico
                        </button>
                        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                                <div class="modal-content degradado-modal">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-light" id="modalTitleId">
                                            Turnado a Juridico
                                        </h5>
                                        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-light">
                                        <div class="row flex-wrap flex-row mx-4">
                                            <div class="h5 pt-4 pb-2 col-lg-12">
                                                <p>
                                                    ¿Deseas continuar la baja de
                                                    <b class="text-capitalize">{{ $byColaborador[0]->Nombre_Colaborador }}
                                                        {{ $byColaborador[0]->Apellido_Paterno }}
                                                        {{ $byColaborador[0]->Apellido_Materno }}</b> con el ID
                                                    <b>{{ $byColaborador[0]->idColaborador }}</b>, por turnado a
                                                    Juridico?
                                                </p>
                                                <ol>
                                                    <li>Debes revisar el status como respuesta Juridico.</li>
                                                    <li>Una vez confirmado por Juridico,se turnara tambien la baja a
                                                        Contabilidad. </li>
                                                </ol>
                                                <div class="h5">
                                                    Por ultimo, para confirmar la baja deberas ingresar el
                                                    siguiente texto ,en el recuadro que se encuentra al final
                                                    de esta ventana.
                                                </div>
                                                <div class="text-light fw-bold h1 text-center py-4"
                                                    style="background: rgba(107, 214, 7, 0.349)">
                                                    {{ $byColaborador['codigo'] }}
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                @livewire('eliminar.validacion', ['codigo' => $byColaborador['codigo'], 'idColaborador' => $byColaborador[0]->idColaborador, 'idCoordinador' => Auth::user()->id, 'solicitud' => 'baja', 'comentario' => ''])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($byColaborador[0]->Status === '0')
                        <button type="button" class="btn btn-warning col-lg-11 col-md-12 mt-3" data-bs-toggle="modal"
                            data-bs-target="#modalAsesoriaJuridico">
                            <i class="fa-solid fa-gavel"></i> Turnar Asesoria a Juridico
                        </button>
                        <div class="modal fade" id="modalAsesoriaJuridico" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                role="document">
                                <div class="modal-content degradado-modal">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Asesoria
                                        </h5>
                                        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-light">
                                        @livewire('eliminar.turnar-asesoria', ['idColaborador' => $byColaborador[0]->idColaborador, 'nombre' => $byColaborador[0]->Nombre_Colaborador . ' ' . $byColaborador[0]->Apellido_Paterno . ' ' . $byColaborador[0]->Apellido_Materno])
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($byColaborador[0]->Status === '2')
                        <div class=" me-3">
                            <p class="text-center">Este colaborador ya fue turnado al Departamento de Juridico.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="col-lg-6 col-md-6 pt-2">
            <div class="p-3">
                <img class="rounded degradado-tarjeta" src="{{ asset('img/tarjeta.png') }}" alt="Foto Colaborador CRS"
                    width="100%" height="410px" style="box-shadow:rgba(255, 255, 255, 0.507) 1px 1px 5px;">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 text-light py-3 rounded-end d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <span class="text-center h1">PROSMAN</span>
                <span class="text-center" style="letter-spacing: 2px">LIMPIEZA Y MANTENIENTO EMPRESARIAL</span>
            </div>
        </div>
    @endif
    <script>
        function sendIDDelete(id) {
            Livewire.emit('buscarTarjetaColaborador', [{
                'id': id
            }]);
        }
    </script>
</div>
