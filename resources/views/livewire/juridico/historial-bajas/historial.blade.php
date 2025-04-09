@extends('layouts.app')
@section('content')
    <div class="w-100 d-flex justify-content-center align-items-center" style="height: 94.5vh">
        <div class="d-flex flex-column col-11" style="94vh">
            <div class="bg-light rounded-top py-2 w-100 d-flex border-bottom">
                <span style="width: 20%" class="ps-2">ID / Colaborador</span>
                <span style="width: 15%">Atendido por</span>
                <span style="width: 60%">Trazabilidad</span>
                <span style="width: 15%">Opciones</span>
            </div>
            <div class="d-flex flex-column bg-light scrollbar rounded-bottom" style="height: 80vh;overflow-y:scroll">
                @foreach ($bajas as $persona)
                    <div class="d-flex flex-row w-100 border-bottom py-3">
                        <div class="text-capitalize ps-2" style="width: 20%">{{ $persona->idColaborador }} /
                            {{ $persona->Nombre }}
                            {{ $persona->Apellido_Paterno }}
                            {{ $persona->Apellido_Materno }}</div>
                        <div style="width: 15%">
                            Personal Legal <br>{{ $persona->name }}
                        </div>
                        <div style="width: 60%">
                            <div class=" contendor-progress">
                                <div class="fechaturnado">
                                    <div class="circle-progess shadow">1</div>
                                    Coordinador <br>
                                    Baja operativa <br>
                                    @php
                                        echo date('d-m-Y', strtotime($persona->Fecha_Cal_Finiquito));
                                    @endphp
                                </div>
                                <div class="barra-progress shadow">
                                </div>
                                <div class="fechabaja">
                                    <div class="circle-progess shadow">2</div>
                                    Turnado <br>
                                    Fecha de Solicitud <br>
                                    @php
                                        echo date('d-m-Y', strtotime($persona->created_at));
                                    @endphp
                                </div>
                                <div class="barra-progress2 shadow">
                                </div>
                                <div class="fechabaja">
                                    <div class="circle-progess shadow">3</div>
                                    Juridico
                                    <br>
                                    Fecha de Baja <br>
                                    @php
                                        echo date('d-m-Y', strtotime($persona->Fecha_Baja));
                                    @endphp
                                </div>

                                @if ($persona->Fecha_Pago_Finiquito)
                                    <div class="barra-progress3 shadow">
                                    </div>
                                @endif

                                <div class="fechabaja">
                                    <div class="circle-progess shadow">4</div>
                                    Contable
                                    <br>
                                    Pago de Finiquito <br>
                                    ${{ $persona->Finiquito_Negociado }}
                                    @if ($persona->Fecha_Pago_Finiquito)
                                        @php
                                            echo date('d-m-Y', strtotime($persona->Fecha_Pago_Finiquito));
                                        @endphp
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="py-3" style="width: 15%">
                            <a href="./fichatecnica/{{ $persona->idColaborador }}" target="_blank"
                                class="btn btn-success col-lg-11 col-md-12 shadow"><i
                                    class="fa-regular fa-address-card"></i>
                                Expediente</a>
                            <div class="mt-3">

                                <button type="button" class="btn btn-warning col-lg-11 col-md-12 shadow"
                                    data-bs-toggle="modal" data-bs-target="#registroIncidencia">
                                    <i class="fa-regular fa-folder-open"></i> Ver
                                    Incidencias
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="registroIncidencia" tabindex="-1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                        role="document">
                                        <div class="modal-content degradado-modal">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                @livewire('incidencia.total-incidencias', [$persona->idColaborador])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-primary col-lg-11 col-md-12 shadow"
                                    data-bs-toggle="modal" data-bs-target="#historialjuridico"><i
                                        class="fa-solid fa-clock-rotate-left"></i>
                                    Historial Juridico
                                </button>

                                <div class="modal fade" id="historialjuridico" tabindex="-1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                        role="document">
                                        <div class="modal-content text-light degradado-modal">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">
                                                    Historial de Proceso Baja
                                                </h5>
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @livewire('juridico.resoluciones', ['idColaborador' => $persona->idColaborador, 'idJuridico' => Auth::user()->id, 'idBaja' => $persona->idBajas])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function historial(id) {
            Livewire.emit('buscarHistorial', [{
                'idColaborador': id
            }]);
        }
    </script>
@endsection
