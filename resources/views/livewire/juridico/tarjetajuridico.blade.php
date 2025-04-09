<div class="" style="height: 100%;">
    @if (isset($byColaborador) != '')
        <div class=" text-light px-2 py-3 rounded-end">
            <div class="">
                <table class="table p-3 text-dinamico table-hover ">
                    <thead class="pb-3 text-dark">
                        <th class="col-lg-1" style="background: rgba(255, 255, 255, 0.534);">ID</th>
                        <th class="col-lg-4" style="background: rgba(255, 255, 255, 0.521);">Nombre</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">CEDIS</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">Status</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">Ficha Técnica</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">1</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">2</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">3</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">4</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">5</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">6</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">7</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">8</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">9</th>
                        <th class="" style="background: rgba(255, 255, 255, 0.521);">10</th>
                    </thead>
                    <tbody class="text-capitalize">
                        @if (isset($byColaborador) != '')
                            @if (count($byColaborador) != 0)
                                @foreach ($byColaborador as $colaborador)
                                    <tr>
                                        <td>{{ $colaborador->id_usuario }}</td>
                                        <td>{{ $colaborador->nombre }} {{ $colaborador->Apellido_Paterno }}
                                            {{ $colaborador->Apellido_Materno }}</td>
                                        <td>{{ $colaborador->Region }} / {{ $colaborador->nombre_Cedis }}</td>
                                        <td>
                                            @switch($byColaborador[0]->Status)
                                                @case(0)
                                                    Activo
                                                @break

                                                @case(1)
                                                    Baja
                                                @break

                                                @case(2)
                                                    En Proceso Baja
                                                @break

                                                @case(3)
                                                    Re-Ingreso
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td>
                                            <a href="./fichatecnica/{{ $byColaborador[0]->idColaborador }}"
                                                target="_blank" class="btn btn-success btn-sm"><i
                                                    class="fa-solid fa-file me-1"></i>Generar</a>
                                        </td>
                                        <td>
                                            @if ($colaborador->Identificacion == '1')
                                                @if ($statusIdentificacion == 'Correcto')
                                                    <i class="fa-solid fa-circle-check text-success"></i>
                                                    @php
                                                        $contadorValidador = $contadorValidador + 1;
                                                    @endphp
                                                @else
                                                    <i class="fa-solid fa-circle-check"></i>
                                                @endif
                                            @else
                                                <i class="fa-regular fa-circle"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($colaborador->CURP == '1')
                                                @if ($statusCURP == 'Correcto')
                                                    <i class="fa-solid fa-circle-check text-success"></i>
                                                    @php
                                                        $contadorValidador = $contadorValidador + 1;
                                                    @endphp
                                                @else
                                                    <i class="fa-solid fa-circle-check"></i>
                                                @endif
                                            @else
                                                <i class="fa-regular fa-circle"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($colaborador->NSS == '1')
                                                @if ($statusNSS == 'Correcto')
                                                    @if ($statusNSS == 'Correcto')
                                                        <i class="fa-solid fa-circle-check text-success"></i>
                                                        @php
                                                            $contadorValidador = $contadorValidador + 1;
                                                        @endphp
                                                    @else
                                                        <i class="fa-solid fa-circle-check"></i>
                                                    @endif
                                                @else
                                                    <i class="fa-solid fa-circle-check"></i>
                                                @endif
                                            @else
                                                <i class="fa-regular fa-circle"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($colaborador->Comprobante_Domiclio == '1')
                                                @if ($statusComprobanteDomicilio == 'Correcto')
                                                    <i class="fa-solid fa-circle-check text-success"></i>
                                                    @php
                                                        $contadorValidador = $contadorValidador + 1;
                                                    @endphp
                                                @else
                                                    <i class="fa-solid fa-circle-check"></i>
                                                @endif
                                            @else
                                                <i class="fa-regular fa-circle"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($colaborador->Acta_Naciminto == '1')
                                                @if ($statusActa_Nacimiento == 'Correcto')
                                                    <i class="fa-solid fa-circle-check text-success"></i>
                                                    @php
                                                        $contadorValidador = $contadorValidador + 1;
                                                    @endphp
                                                @else
                                                    <i class="fa-solid fa-circle-check"></i>
                                                @endif
                                            @else
                                                <i class="fa-regular fa-circle"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($colaborador->RFC == '1')
                                                @if ($statusRFC == 'Correcto')
                                                    <i class="fa-solid fa-circle-check text-success"></i>
                                                    @php
                                                        $contadorValidador = $contadorValidador + 1;
                                                    @endphp
                                                @else
                                                    <i class="fa-solid fa-circle-check"></i>
                                                @endif
                                            @else
                                                <i class="fa-regular fa-circle"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($colaborador->Solicitud_Empleo == '1')
                                                @if ($statusCV == 'Correcto')
                                                    <i class="fa-solid fa-circle-check text-success"></i>
                                                    @php
                                                        $contadorValidador = $contadorValidador + 1;
                                                    @endphp
                                                @else
                                                    <i class="fa-solid fa-circle-check"></i>
                                                @endif
                                            @else
                                                <i class="fa-regular fa-circle"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($colaborador->Contrato_Digital == '1')
                                                @if ($statusContrato == 'Correcto')
                                                    <i class="fa-solid fa-circle-check text-success"></i>
                                                    @php
                                                        $contadorValidador = $contadorValidador + 1;
                                                    @endphp
                                                @else
                                                    <i class="fa-solid fa-circle-check"></i>
                                                @endif
                                            @else
                                                <i class="fa-regular fa-circle"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($colaborador->Foto == '1')
                                                @if ($statusFoto == 'Correcto')
                                                    <i class="fa-solid fa-circle-check text-success"></i>
                                                    @php
                                                        $contadorValidador = $contadorValidador + 1;
                                                    @endphp
                                                @else
                                                    <i class="fa-solid fa-circle-check"></i>
                                                @endif
                                            @else
                                                <i class="fa-regular fa-circle"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($colaborador->Caratula_Banco == '1')
                                                @if ($statusCaratulaBanco == 'Correcto')
                                                    <i class="fa-solid fa-circle-check text-success"></i>
                                                    @php
                                                        $contadorValidador = $contadorValidador + 1;
                                                    @endphp
                                                @else
                                                    <i class="fa-solid fa-circle-check"></i>
                                                @endif
                                            @else
                                                <i class="fa-regular fa-circle"></i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="13" class="text-center">Sin resultados</td>
                                </tr>
                            @endif
                        @endif
                    </tbody>
                </table>
                <div>
                    @livewire('juridico.all-documentos', ['id' => $byColaborador[0]->idColaborador])
                </div>
            </div>
        </div>
    @else
        <div class="d-flex justify-content-center aling-items-center" style="height: 100%">
            <img class="rounded px-4 w-100" style="filter: opacity(.2)" src="{{ asset('img/logo.png') }}"
                alt="Foto Colaborador CRS">
        </div>
    @endif
</div>
