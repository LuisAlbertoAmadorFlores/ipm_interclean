<div>
    <div class=" rounded" style="background: rgba(255, 255, 255, 0.184)">
        <div class="d-flex py-2 rounded-top degradado">
            <span class="text-center ps-2">Excel Cargados</span>
        </div>
        <div class="">
            <div class=" d-flex flex-column">
                <div class="d-flex flex-column">
                    @foreach ($complementario as $documento)
                        @php
                            $arrayDocument = [];
                            $arraynameDocument = [];
                            foreach (explode('/', $documento) as $value) {
                                array_push($arrayDocument, $value);
                            }
                            foreach (explode('.pdf', $arrayDocument[2]) as $name) {
                                array_push($arraynameDocument, $name);
                            }
                            $region = explode('_', $arraynameDocument[0]);
                        @endphp
                        <div class="pt-2 px-2">
                            <h6 class="">{{ $arraynameDocument[0] }}</h6>
                            <a href="./excel/{{ $arraynameDocument[0] }}" class="btn btn-primary btn-sm">Descargar</a>
                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#rechazar">
                                Rechazar
                            </button>
                            <div class="modal fade" id="rechazar" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                    role="document">
                                    <div class="modal-content degradado">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Rechazar Nomina
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @livewire('contabilidad.nomina.rechazar-nomina', ['nombre' => $arraynameDocument[0],'idContabilidad'=>Auth::user()->id])
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#comprobante">
                                Subir Comprobante
                            </button>
                            <div class="modal fade" id="comprobante" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                    role="document">
                                    <div class="modal-content degradado">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Cargar Comprobante de Pago
                                            </h5>
                                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @livewire('contabilidad.nomina.comprobantepago', ['nombre' => $arraynameDocument[0]])
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
