<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Status</th>
        <th>Fecha de Creación</th>
        <th></th>
    </tr>
    @if (isset($acounts) != '')
        @foreach ($acounts as $acount)
            <tr>
                <td>{{ $acount->id }}</td>
                <td>{{ $acount->name }}</td>
                <td>{{ $acount->email }}</td>
                <td>No autorizada</td>
                {{-- <td>Ninguno
                    {{-- <select class="form-control" class="{{ $acount->id }}">
                        <option value="Ninguno" selected>Ninguno</option>
                        <option value="Reclutador">Reclutador</option>
                        <option value="Coordinador">Coordinador</option>
                        <option value="Juridico">Juridico</option>
                        <option value="Contabilidad">Contabilidad</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Sistemas">Sistemas</option>
                        <option value="Alto Rango">Alto Rango</option>
                    </select>
                </td> --}}
                <td>{{ $acount->created_at }}</td>
                <td>
                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#{{ $acount->id }}">
                        Autorizar
                    </button>

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="{{ $acount->id }}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                            role="document">
                            <div class="modal-content text-light" style="background: rgba(32, 96, 164, 0.767);backdrop-filter:blur(14px);">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Confirmación de Autorización
                                    </h5>
                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="h4">¿Deseas habilitar la cuenta
                                        {{ $acount->email }}. </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Cancelar
                                    </button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                        wire:click="autorizarCuenta({{ $acount->id }})">Autorizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7" class="text-center">Sin cuentas para autorizar</td>
        </tr>
    @endif
</table>
