<div>
    <table class="table">
        <thead>
            <tr>
                <th>Fotografia</th>
                <th>Información</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="{{ asset('img/hombre.jpg') }}" width="250"></td>
                <td>
                    <div class="border-bottom ">ID:
                        @isset($colaborador)
                            {{ $colaborador[0]->idColaborador }}
                        @endisset
                    </div>
                    <div class="border-bottom text-capitalize">Nombre:@isset($colaborador)
                            {{ $colaborador[0]->Nombre }}
                            {{ $colaborador[0]->Apellido_Paterno }} {{ $colaborador[0]->Apellido_Materno }}
                        @endisset
                    </div>
                    <div class="border-bottom mb-2"><span>Finiquito Auto-Calculado:</span>
                        @isset($colaborador)
                            @php
                                $arrayfiniquito = json_decode($colaborador[0]->Finiquito);
                            @endphp
                            @if ($arrayfiniquito == null)
                               Sin dato, pregunta en Sistemas
                            @else
                                <span class="bg-warning">{{ " $" . $arrayfiniquito->totalFiniquito }}</span>
                            @endif

                        @endisset
                    </div>
                    <div class="d-flex flex-column">
                        <span for="">Finiquito Negociado:
                            @isset($colaborador)
                                @if ($colaborador[0]->Finiquito_Negociado != null)
                                    ${{ $colaborador[0]->Finiquito_Negociado }}
                                @else
                                    @isset($colaborador)
                                        @livewire('components.guardar-finiquito', ['idColaborador' => $colaborador[0]->idColaborador])
                                    @endisset
                                @endif
                            @endisset
                        </span>
                        <hr>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        @isset($colaborador)
                            {!! QrCode::size(150)->margin(2)->generate('http://intranetipm.ddns.net/lala/public/fichatecnica/' . $colaborador[0]->idColaborador) !!}
                        @endisset
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column justify-content-center align-items-start gap-2">
                        @isset($colaborador)
                            <button class="btn btn-primary w-100"
                                wire:click="liberar({{ $colaborador[0]->idColaborador }})"><i
                                    class="fa-solid fa-link-slash"></i>
                                Liberar</button>
                            <a href="./fichatecnica/{{ $colaborador[0]->idColaborador }}" target="_blank"
                                class="btn btn-dark w-100"><i class="fa-regular fa-address-card"></i>
                                Expediente</a>
                            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal"
                                data-bs-target="#historialjuridico"><i class="fa-solid fa-clock-rotate-left"></i>
                                Historial Juridico
                            </button>
                            <div class="modal fade" id="historialjuridico" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                    role="document">
                                    <div class="modal-content text-light degradado-modal" style="backdrop-filter:blur(14px);">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Historial de Proceso Baja
                                            </h5>
                                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @livewire('juridico.resolucion', ['idColaborador' => $colaborador[0]->idColaborador, 'idJuridico' => Auth::user()->id, 'idBaja' => $idBaja])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#TerminoBaja">
                                <i class="fa-solid fa-ban"></i>
                                Culminar Proceso
                            </button>

                            <div class="modal fade" id="TerminoBaja" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                    role="document">
                                    <div class="modal-content text-light degradado-modal" style="backdrop-filter:blur(14px);">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Confirmacion Baja
                                            </h5>
                                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="h5">
                                                    Para confirmar la baja deberas ingresar el
                                                    texto, en el recuadro que se encuentra al final
                                                    de esta ventana.
                                                </div>
                                                <div
                                                    class="text-light fw-bold h1 text-center py-4 bg-warning text-dark  rounded">
                                                    {{ $codigo }}
                                                </div>
                                            </div>
                                            <div>
                                                @livewire('juridico.validacion', ['idRow' => $idBaja, 'idColaborador' => $idColaborador, 'code' => $codigo, 'type' => 'Baja'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endisset
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
