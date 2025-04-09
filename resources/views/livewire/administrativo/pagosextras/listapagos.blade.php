<div class="m-3 rounded" style="height: 35vh;background:#ffffff2c;">
    <div class="h5 pt-2 ps-1 ">Historial Pagos Extras</div>
    <div class="d-flex flex-column">
        <span class="d-flex w-100 py-1 text-light" style="background: rgb(0, 0, 0)">
            <span class="col-3 ps-3">Detalles</span>
            <span class="col-3">Descripcion</span>
            <span class="col-3">Desgloce</span>
            
        </span>
        <div class="scrollbar rounded-bottom bg-light" style="height:28vh;overflow-y:scroll">
            @isset($pagos)
                @foreach ($pagos as $pago)
                    @if ($pago->Motivo == 'cubrioTurno')
                        <div class="d-flex align-items-center  w-100 py-1 bg-light border-bottom">
                            <div class="col-3 ps-3 d-flex flex-column">
                                <span>ID: {{ $pago->idPago }}</span>
                                <span>Motivo: Cubrio Turno
                                </span>
                                <span>
                                    Fecha cubierta: {{ $pago->fecha_cubierta }}
                                </span>
                                <span>
                                    Fecha Asignado: {{ $pago->Fecha_Asignacion_Pago }}
                                </span>
                                <span>
                                    Estatus: {{ $pago->Status }}
                                </span>
                            </div>
                            <div class="col-3 d-flex flex-column">
                                <span>{{ $pago->Descripcion }}</span>
                            </div>
                            <div class="col-3 d-flex flex-column">
                                <span>Cantidad Total: {{ $pago->Pago_Total }}</span>
                                <span>Cubrio a ID: {{ $pago->idColaboradorCubierto }}</span>
                            </div>
                            <div class="d-flex  col-2">
                                @if ($pago->Status == 'Activo')
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger btn" data-bs-toggle="modal"
                                        data-bs-target="#cancelarDescuento">
                                        Cancelar
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="cancelarDescuento" tabindex="-1" data-bs-backdrop="static"
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
                                                <div class="modal-body">¿Desea cancelar el
                                                    descuento?{{ $pago->idPago }},{{ $pago->idColaborador }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        NO
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                                        wire:click="cancelarPago({{ $pago->idPago }})">SI</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="d-flex align-items-center  w-100 py-1 bg-light border-bottom">
                            <div class="col-3 ps-3 d-flex flex-column">
                                <span>ID: {{ $pago->idPago }}</span>
                                <span>Motivo: @if ($pago->Motivo =='adeudoPago')
                                    Adeudo Pendiente
                                @else
                                    Saldo por descuento
                                @endif
                                </span>
                                <span>
                                    Asignado: {{ $pago->Fecha_Asignacion_Pago }}
                                </span>
                                <span>
                                    Estatus: {{ $pago->Status }}
                                </span>
                            </div>
                            <div class="col-3 d-flex flex-column">
                                <span>{{ $pago->Descripcion }}</span>
                            </div>
                            <div class="col-3 d-flex flex-column">
                                <span>Cantidad Total: ${{$pago->Pago_Total}}</span>
                            </div>
                            <div class="d-flex  col-3">
                                @if ($pago->Status == 'Activo')
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger btn" data-bs-toggle="modal"
                                        data-bs-target="#cancelarDescuento">
                                        Cancelar
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="cancelarDescuento" tabindex="-1" data-bs-backdrop="static"
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
                                                <div class="modal-body">¿Desea cancelar el
                                                    descuento?{{ $pago->idPago }},{{ $pago->idColaborador }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        NO
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                                        wire:click="cancelarPago({{ $pago->idPago }})">SI</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            @endisset
        </div>
    </div>
</div>
