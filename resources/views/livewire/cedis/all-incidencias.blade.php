<div>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Detalles</th>
            <th>Descripcion</th>
            <th>Evidencia</th>
        </thead>
        <tbody>
            @if (isset($totalIncidencias) != '')
                @foreach ($totalIncidencias as $item)
                    <tr>
                        <td>{{ $item->idIncidencias }}</td>
                        <td class="d-flex flex-column"><span>Fecha:
                                {{ $item->Fecha_Incidencia }}</span>
                            {{-- <span>Afectado: {{ $item->Nombre }} --}}
                                {{-- {{ $item->Apellido_Paterno }}
                                {{ $item->Apellido_Materno }}</span> --}}
                            <span>Categoria: {{ $item->Categoria }}</span>
                        </td>

                        <td>{{ $item->Descripcion }}
                        </td>
                        <td><button wire:click="downEvidencia({{ $item->idCedis }},{{ $item->idIncidencias }})"
                                class="btn btn-success">Descargar</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">Sin registros
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
