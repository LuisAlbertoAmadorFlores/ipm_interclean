<div class="mb-3 text-light barras-title m-2 rounded">
    <div class="mt-3 bg-light">
        <table class="table">
            <tr>
                <th># Solicitud</th>
                <th>Departamento</th>
                <th>Justificacion</th>
                <th>Total</th>
                <th>Opciones</th>
            </tr>
            @isset($misordenes)
                @if (count($misordenes) > 0)
                    @foreach ($misordenes as $orden)
                        @if ($orden->Status != 'Cancelado')
                            <tr>
                                <td>{{ $orden->Codigo_Asociativo }}</td>
                                <td>{{ $orden->Departamento }}</td>
                                <td>{{ $orden->Comentario }} <br> @switch($orden->prioridad)
                                        @case('Inmediata')
                                        @break

                                        @case('Alta')
                                            <span class="bg-danger rounded px-1 text-light">Prioridad:
                                                {{ $orden->prioridad }}</span>
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td>
                                    @php
                                        echo number_format(intval($orden->Total_Gasto), 2);
                                    @endphp
                                </td>
                                <td>
                                    @if ($orden->Status != 'Activo')
                                        <a href="./generar-estatus/{{ $orden->Codigo_Asociativo }}"
                                            class="btn btn-secondary w-100">
                                            Consultar Orden</a>
                                    @else
                                        <a href="./generar-estatus/{{ $orden->Codigo_Asociativo }}"
                                            class="btn btn-primary w-100">
                                            Cerrar Orden</a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">
                            <span class="">Sin registros</span>
                        </td>

                    </tr>
                @endif

            </table>
            </table>
            {{ $misordenes->links() }}
        @endisset
    </div>
</div>
