<div>
    <div class="bg-light">
        <div class="col-12 w-100 d-flex rounded fw-bold">
            <span class="col-1  py-1 text-center">
                ID
            </span>
            <span class="col-4  py-1">Nombre</span>
            <span class="col-5   py-1">Comentario</span>
            <span class="col-2    py-1"></span>
        </div>
        <div class="scrollbar rounded-bottom" style="height:30vh;overflow: scroll">
            @foreach ($misturnos as $persona)
                <div class=" col-12 w-100 d-flex  align-items-center border-bottom py-2 tablehover">
                    <span class="col-1 text-center">{{ $persona->idColaborador }}</span>
                    <span class="col-4 text-capitalize">{{ $persona->Nombre }} {{ $persona->Apellido_Paterno }}
                        {{ $persona->Apellido_Materno }}</span>

                    <span class="col-5">

                        {{ $persona->Comentario }}
                        <br>
                        <hr>
                        <label class="">Respuesta</label>
                        <br>
                        @if ($persona->Respuesta)
                            {{ $persona->Respuesta }}
                        @else
                            @livewire('juridico.asesorias.asesoria',['idAsesoria'=>$persona->idAsesoria])
                        @endif


                    </span>
                    <div class="d-flex flex-column aling-items-start justify-content-start col-2 px-3">
                        <button class="btn btn-primary mb-2" wire:click="liberar({{ $persona->idColaborador }})"><i
                                class="fa-solid fa-link-slash"></i>
                            Liberar</button>

                        <a href="./fichatecnica/{{ $persona->idColaborador }}" target="_blank"
                            class="btn btn-dark mb-2"><i class="fa-regular fa-address-card"></i>
                            Expediente</a>

                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#TerminoBaja">
                            <i class="fa-solid fa-check"></i>
                            Culminado
                        </button>
                    </div>


                    <div class="modal fade" id="historialjuridico" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                            role="document">
                            <div class="modal-content text-light degradado" style="backdrop-filter:blur(14px);">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Historial de Proceso Baja
                                    </h5>
                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @livewire('juridico.resolucion', ['idColaborador' => $persona->idColaborador, 'idJuridico' => Auth::user()->id, 'idBaja' => $persona->idAsesoria])
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="TerminoBaja" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                            role="document">
                            <div class="modal-content text-light degradado" style="backdrop-filter:blur(14px);">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="modalTitleId">
                                        Asesoria Colaborador
                                    </h5>
                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <div class="h5 text-dark">
                                            Con esto culminaras tu aporte en la asesoria, para confirmar debes ingresar
                                            el
                                            texto, en el recuadro que se encuentra al final
                                            de esta ventana.
                                        </div>
                                        <div
                                            class="text-light fw-bold h1 text-center py-4 bg-warning text-dark  rounded">
                                            {{ $codigo }}
                                        </div>
                                    </div>
                                    <div>
                                        @livewire('juridico.validacion', ['idRow' => $persona->idAsesoria, 'idColaborador' => $persona->idColaborador, 'code' => $codigo, 'type' => 'Asesoria'])
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
