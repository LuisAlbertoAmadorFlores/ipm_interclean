<table class="table">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Status</th>
        <th>Rol</th>
        <th>Fecha de Creación</th>
        <th>Opciones</th>
    </tr>
    @if (isset($acounts) != null)
        @foreach ($acounts as $acount)
            <tr>
                <td>{{ $acount->id }}</td>
                <td>{{ $acount->name }}</td>
                <td>{{ $acount->email }}</td>
                <td>
                    @if ($acount->status == 0)
                        Habilitada
                    @endif
                    @if ($acount->status == 1)
                        No autorizada
                    @endif
                    @if ($acount->status == 2)
                        Inhabilitada
                    @endif
                </td>
                <td>
                    {{ $acount->rol }}
                </td>
                <td>{{ $acount->created_at }}</td>
                <td>
                    @if ($acount->status == 2)
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#autorizarcuenta">
                            Habilitar
                        </button>
                        <div class="modal fade" id="autorizarcuenta" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Confirmación de Inhabilitación de Cuenta
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">Desea Inhabilitar la cuenta asociada a
                                        {{ $acount->email }}</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Cancelar
                                        </button>
                                        <button type="button" class="btn btn-primary"
                                            wire:click="deshabilitarCuenta({{ $acount->id }})">Autorizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#autorizarcuenta">
                            Inhabilitar
                        </button>
                        <div class="modal fade" id="autorizarcuenta" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Confirmación de Inhabilitación de Cuenta
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">Desea Inhabilitar la cuenta asociada a
                                        {{ $acount->email }}</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Cancelar
                                        </button>
                                        <button type="button" class="btn btn-primary"
                                            wire:click="deshabilitarCuenta({{ $acount->id }})">Autorizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7" class="text-center">Sin cuentas para autorizar</td>
        </tr>
    @endif

</table>
