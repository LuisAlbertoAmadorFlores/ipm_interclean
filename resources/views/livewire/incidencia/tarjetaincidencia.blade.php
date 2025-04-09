<div class="d-flex" style="height: 100%;">
    @if (isset($byColaborador) != '')
        <div class="col-lg-6 col-md-6">
            <div class="p-3">
                <img class="rounded imagengrande" src="{{ asset($foto) }}" alt="Foto Colaborador CRS" width="100%"
                    height="410px" style="box-shadow:rgba(255, 255, 255, 0.507) 1px 1px 5px;backdrop-filter:blur(14px)">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 text-light py-3 rounded-end d-flex flex-column">
            <div class="div">
                <div class="d-flex">
                    <span class="text-static">ID:</span>
                    <div id="idTarjetaIncidencias">{{ $byColaborador[0]->id_colaborador }}</div>
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
                <div class="mt-3">
                    <!--  Modal trigger button  -->
                    <button type="button" class="btn btn-dark mb-3 col-lg-11 col-md-12" data-bs-toggle="modal"
                        data-bs-target="#nuevaIncidencia">
                        <i class="fa-solid fa-plus"></i> Nueva Incidencia
                    </button>

                    <!-- Modal Body-->
                    <div class="modal fade" id="nuevaIncidencia" tabindex="-1" role="dialog"
                        aria-labelledby="modalTitleId" aria-hidden="true" data-bs-backdrop="static"
                        data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                            role="document">
                            <div class="modal-content degradado-modal">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Nueva Incidencia
                                    </h5>
                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                        aria-label="Close" wire:click="$emit('Add-incidencia')"></button>
                                </div>
                                <div class="modal-body">
                                    @livewire('incidencia.fomrncidencia', [$byColaborador[0]->id_colaborador, Auth::user()->id])
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="">
                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-warning col-lg-11 col-md-12" data-bs-toggle="modal"
                        data-bs-target="#registroIncidencia">
                        <i class="fa-regular fa-folder-open"></i> Ver
                        Incidencias
                    </button>

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="registroIncidencia" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                            role="document">
                            <div class="modal-content text-light degradado-modal" >
                                <div class="modal-header">
                                    <h5 class="modal-title text-capitalize" id="modalTitleId">
                                        Incidencias de {{ $byColaborador[0]->Nombre_Colaborador }}
                                        {{ $byColaborador[0]->Apellido_Paterno }}
                                        {{ $byColaborador[0]->Apellido_Materno }}
                                    </h5>
                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0">
                                    @livewire('incidencia.total-incidencias', [$byColaborador[0]->id_colaborador])
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-lg-6 col-md-6">
            <div class="p-3">
                <img class="rounded degradado-tarjeta" src="{{ asset('img/tarjeta.png') }}" alt="Foto Colaborador"
                    width="100%" height="410px">
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
