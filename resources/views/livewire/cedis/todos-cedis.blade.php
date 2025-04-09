<div class="">
    <div class="d-flex flex-column mx-2 pb-2 rounded" style="background: rgba(255, 255, 255, 0.219)">
        <div class="d-flex w-100  px-2 py-2 rounded-top" style="background: rgba(249, 249, 249, 0.5)">
            <span class="col-1">ID</span>
            <span class="col-2">Nombre</span>
            <span class="col-2">Estado</span>
            <span class="col-2">Municipio</span>
            <span class="col-2">Opciones</span>
            <span class="col-2"></span>
        </div>
        <div class="d-flex flex-column  px-2  align-items-center scrollbar" style="overflow-y: scroll; height: 55vh;">
            @isset($result)
                @foreach ($result as $cedis)
                    <div class="w-100 d-flex py-1 border-bottom">
                        <span class="col-1">{{ $cedis->id }}</span>
                        <span class="col-2">{{ $cedis->Nombre }}</span>
                        <span class="col-2">{{ $cedis->Estado }}</span>
                        <span class="col-2">{{ $cedis->Municipio }}</span>
                        <div class="d-flex justify-content-center w-100">
                            
                                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                                    data-bs-target="#cedis{{ $cedis->id }}">
                                    <i class="fa-solid fa-circle-info"></i> Detalles
                                </button>
                                <div class="modal fade" id="cedis{{ $cedis->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content" style="background-color: rgba(32, 96, 164, 0.468);">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-white" id="modalTitleId">
                                                    Contacto </h5>
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex flex-column rounded p-2"
                                                    style="background: rgba(255, 255, 255, 0.219)">
                                                    <span class="ps-1 rounded text-white"
                                                        style="background: black">Responsable</span>
                                                    <span>{{ $cedis->Responsable }}</span>
                                                    <span class="mt-2 ps-1 rounded text-white"
                                                        style="background: black">Numero
                                                        Telefonico</span>
                                                    <span>{{ $cedis->Telefono }}</span>
                                                    <span class="mt-2 ps-1 rounded text-white"
                                                        style="background: black">Correo
                                                        Electronico</span>
                                                    <span>{{ $cedis->Correo }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal"
                                    data-bs-target="#incidenciaCedis{{ $cedis->id }}"
                                    onclick="sendRegistre({{ $cedis->id }})">
                                    <i class="fa-solid fa-pen"></i> Registrar Incidencia
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="incidenciaCedis{{ $cedis->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                        role="document">
                                        <div class="modal-content" style="background-color:  rgba(32, 96, 164, 0.795);">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-white" id="modalTitleId">
                                                    Registro Incidecia
                                                </h5>
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @livewire('cedis.incidencia')</div>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger mx-2" data-bs-toggle="modal"
                                    data-bs-target="#showIncidencia{{ $cedis->id }}"
                                    onclick="sendgetIncidencia({{ $cedis->id }})">
                                    <i class="fa-solid fa-eye"></i>Ver incidencias
                                </button>

                                <div class="modal fade" id="showIncidencia{{ $cedis->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                        role="document">
                                        <div class="modal-content" style="background-color:rgba(32, 96, 164, 0.795);">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-light" id="modalTitleId">
                                                    Incidencias
                                                </h5>
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body scrollbar" style="overflow-y:scroll">
                                                @livewire('cedis.all-incidencias')
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        
                            {{-- <span>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#showProveedor{{ $cedis->id }}"
                                    wire:click="$emit('showIncidencias',['idCedis'=>{{ $cedis->id }}])">
                                    Proveedores
                                </button>
                                <div class="modal fade" id="showProveedor{{ $cedis->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                        role="document">
                                        <div class="modal-content" style="background-color:rgba(32, 96, 164, 0.468);">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">
                                                    Proveedores
                                                </h5>
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @extends('livewire.cedis.proveedor.proveedores')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span> --}}
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>

    </div>
    <script>
        function sendRegistre($value) {
            Livewire.emit('incidenciaCedis', [{
                'data': $value
            }]);
        }

        function sendgetIncidencia($value) {
            Livewire.emit('obtenerIncidencias', [{
                'data': $value
            }]);
        }
    </script>
</div>
