<div style="height: 100%;">
    @if (isset($byColaborador) != '')
        <div class="px-2 py-3 rounded-end">
            <div class="d-flex flex-column rounded text-dark background-atc p-2">
                <div class="position-relative">
                    <div class="d-flex flex-column  fw-bold h4 position-absolute top-0 start-0 ps-5 pt-5">
                        <span>ID: {{ $byColaborador[0]->idColaborador }}</span>
                        <span class="text-capitalize">Nombre: {{ $byColaborador[0]->Nombre_Colaborador }}
                            {{ $byColaborador[0]->Apellido_Paterno }} {{ $byColaborador[0]->Apellido_Materno }}</span>
                        <span>Lugar de Trabajo: {{ $byColaborador[0]->Nombre_Cedis }}</span>
                    </div>
                </div>
                <div class=" atc-botones-accion">
                    <button type="button" class="btn btn-warning mb-3 ms-5 shadow" data-bs-toggle="modal"
                        data-bs-target="#crearTicketAtc">
                        <i class="fa-solid fa-ticket"></i> Nuevo Ticket
                    </button>
                    <div class="modal fade" id="crearTicketAtc" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                            role="document">
                            <div class="modal-content degradado-modal text-light">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Nuevo Ticket
                                    </h5>
                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @livewire('contactcenter.atc.ticket', ['idCCenter' => Auth::user()->id])
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal trigger button -->
                    {{-- <button type="button" class="btn btn-dark mx-2 mb-3 shadow" data-bs-toggle="modal"
                        data-bs-target="#modalId">
                        <i class="fa-solid fa-magnifying-glass"></i> Buscar Ticket
                    </button> --}}

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    {{-- <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                            role="document">
                            <div class="modal-content degradado-modal text-light">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Buscar Ticket
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @livewire('contactcenter.atc.buscar-ticket')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            @livewire('contactcenter.atc.table-tickets',['idColaborador'=>$byColaborador[0]->idColaborador])
        </div>
    @else
        <div class="d-flex justify-content-center aling-items-center" style="height: 100%">
            <img class="rounded px-4 w-100" style="filter: opacity(.2)" src="{{ asset('img/logo.png') }}"
                alt="PROSMAN Colaborador">
        </div>
    @endif
</div>
