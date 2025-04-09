<div class="d-flex p-2">
    <div class="table-responsive col-6 bg-light rounded">
        <table class="table table-hover table-primary">
            <thead>
                <tr>
                    <th>ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Estatus</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @isset($personalNuevo)
                    @foreach ($personalNuevo as $persona)
                        <tr class="">
                            <td>
                                {{ $persona->id_colaborador }}
                            </td>
                            <td scope="row" class="text-capitalize">{{ $persona->Nombre_Colaborador }}
                                {{ $persona->Apellido_Paterno }}
                                {{ $persona->Apellido_Materno }}</td>
                            <td>
                                @php
                                    echo date('d-m-Y', strtotime($persona->Fecha_Ingreso));
                                @endphp
                            </td>
                            <td>
                                @php
                                    $nombre_fichero =
                                        'storage/Colaboradores/' .
                                        $persona->id_colaborador .
                                        '/Otros/Capacitación PROSMAN APP.pdf';
                                    if (file_exists($nombre_fichero)) {
                                        echo "<div class='estatusAfirmativo rounded'></div>";
                                    } else {
                                        echo "<div class='estatusNegativo rounded'></div>";
                                    }
                                @endphp
                            </td>
                            <td>
                                <button class="btn btn-dark btn-sm shadow"
                                    onclick="sendIdColaborador({{ $persona->id_colaborador }})"> <i
                                        class="fa-solid fa-arrow-up-right-from-square"></i> Mostrar</button>
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>{{ $personalNuevo->links() }}
    </div>
    @livewire('contactcenter.capacitacion.dashboard')

    <script>
        function sendIdColaborador(id) {
            Livewire.emit('sendIdColaboradorCap', id)
        }
    </script>
</div>
