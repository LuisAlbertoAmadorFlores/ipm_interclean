<div class="m-3 rounded text-dark" style="height: 35vh;background:#ffffff2c;">
    <div class="h5 pt-2 ps-1 titulos-block">Historial Descuentos</div>
    <div class="d-flex flex-column">
        <span class="d-flex w-100 py-1 text-light" style="background: rgb(0, 0, 0)">
            <span class="col-2 ps-3">Detalles</span>
            <span class="col-2">Descripcion</span>
            <span class="col-2">Desgloce</span>
            <span class="col-2">Pagado</span>
            <span class="col-2">Restante</span>
        </span>
        <div class="scrollbar rounded-bottom bg-light" style="height:28vh;overflow-y:scroll">
            @isset($descuentos)
                @foreach ($descuentos as $descuento)
                    @if ($descuento->Motivo == 'Uniforme' || $descuento->Motivo == 'Reparacion')
                        <div class="d-flex align-items-center  w-100 py-1 bg-light border-bottom">
                            <div class="col-2 ps-3 d-flex flex-column">
                                <span>Motivo:
                                    @if ($descuento->Motivo == 'Uniforme')
                                        <i class="fa-solid fa-shirt"></i>
                                    @else
                                        <i class="fa-solid fa-house-chimney-crack"></i>
                                    @endif {{ $descuento->Motivo }}
                                </span>
                                <span>
                                    Fecha: {{ $descuento->Fecha_Asigancion_Descuento }}
                                </span>
                                <span>
                                    Estatus: {{ $descuento->Status }}
                                </span>
                            </div>
                            <div class="col-2 d-flex flex-column">
                                <span>{{ $descuento->Descripcion }}</span>
                            </div>
                            <div class="col-2 d-flex flex-column">
                                <span>Cantidad Total: ${{ $descuento->Costo_Total }}</span>
                                <span>Parcialidades: {{ $descuento->Parcialidades }}</span>
                                <span>Pago: $ @php
                                    echo number_format($descuento->Costo_Total / $descuento->Parcialidades, 2, '.', '');
                                @endphp </span>
                            </div>
                            <span class="col-2">N/A</span>
                            <span class="col-2">${{ $descuento->Costo_Total }}</span>
                            <div class="d-flex  col-2">
                                @if ($descuento->Status == 'Activo')
                                  <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger btn" data-bs-toggle="modal"
                                        data-bs-target="#modalId">
                                        Cancelar
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content text-light"
                                                style="background: rgba(32, 96, 164, 0.767);">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">
                                                        Confirmación
                                                    </h5>
                                                    <button type="button" class="btn-close bg-light"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">¿Desea cancelar el descuento?</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        NO
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                                        wire:click="cancelarDescuento({{ $descuento->idDescuento }},{{ $descuento->idColaborador }})">SI</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        @if ($descuento->Motivo == 'Infonavit' || $descuento->Motivo == 'Fonacot')
                            <div class="d-flex align-items-center w-100 bg-light py-1 border-bottom"
                                style="background-color: rgba(127, 254, 1, 0.389)">
                                <div class="col-2 ps-3 d-flex flex-column">
                                    <span>Motivo:
                                        <i class="fa-solid fa-house"></i>
                                        {{ $descuento->Motivo }}
                                    </span>
                                    <span>
                                        Fecha: {{ $descuento->Fecha_Asigancion_Descuento }}
                                    </span>
                                    <span>
                                        Estatus: {{ $descuento->Status }}
                                    </span>
                                </div>
                                <div class="col-2 d-flex flex-column">
                                    <span>{{ $descuento->Descripcion }}</span>
                                </div>
                                <span class="col-2">Cantidad Total:${{ $descuento->Costo_Total }}</span>
                                <span class="col-2">N/A</span>
                                <span class="col-2">${{ $descuento->Costo_Total }}</span>
                                <div class="d-flex  col-2">
                                    @if ($descuento->Status == 'Activo')
                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-danger btn" data-bs-toggle="modal"
                                            data-bs-target="#modalId">
                                            Cancelar
                                        </button>

                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content text-light"
                                                    style="background: rgba(32, 96, 164, 0.767);">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Confirmación
                                                        </h5>
                                                        <button type="button" class="btn-close bg-light"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">¿Desea cancelar el descuento?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            NO
                                                        </button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal"
                                                            wire:click="cancelarDescuento({{ $descuento->idDescuento }},{{ $descuento->idColaborador }})">SI</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        @else
                            <div class="d-flex align-items-center w-100  py-1 border-bottom">
                                <div class="col-2 ps-3 d-flex flex-column">
                                    <span>Motivo:
                                        @if ($descuento->Motivo == 'Retardo')
                                            <i class="fa-solid fa-clock"></i>
                                        @else
                                            <i class="fa-solid fa-person-circle-xmark"></i>
                                        @endif
                                        {{ $descuento->Motivo }}
                                    </span>
                                    <span>
                                        Fecha: {{ $descuento->Fecha_Asigancion_Descuento }}
                                    </span>
                                    <span>
                                        Estatus: {{ $descuento->Status }}
                                    </span>
                                </div>
                                <div class="col-2 d-flex flex-column">
                                    <span>{{ $descuento->Descripcion }}</span>
                                </div>
                                <span class="col-2">Cantidad Total: ${{ $descuento->Costo_Total }}</span>
                                <span class="col-2">${{ $descuento->Cantidad_Descontada }}</span>
                                <span class="col-2">${{ $descuento->Costo_Restante }}</span>
                                <div class="d-flex  col-2">
                                    @if ($descuento->Status == 'Activo')
                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-danger btn" data-bs-toggle="modal"
                                            data-bs-target="#modalId">
                                            Cancelar
                                        </button>

                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content text-light"
                                                    style="background: rgba(32, 96, 164, 0.767);">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Confirmación
                                                        </h5>
                                                        <button type="button" class="btn-close bg-light"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">¿Desea cancelar el descuento?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            NO
                                                        </button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal"
                                                            wire:click="cancelarDescuento({{ $descuento->idDescuento }},{{ $descuento->idColaborador }})">SI</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>

                            </div>
                        @endif
                    @endif
                @endforeach
            @endisset
        </div>
    </div>
</div>
