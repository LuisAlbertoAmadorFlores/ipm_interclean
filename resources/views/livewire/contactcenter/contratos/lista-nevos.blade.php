<div class="d-lg-flex p-2">
    <div class="table-responsive col-lg-6 bg-light rounded-bottom">
        {{-- @livewire('contactcenter.contratos.busqueda') --}}
        <table class="table table-hover table-primary">
            <thead>
                <tr>
                    <th>ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Estatus Contrato</th>
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
                                    switch ($persona->Contrato_Digital) {
                                        case '0':
                                            echo "<span class='bg-danger text-light px-2 py-1 rounded'>Sin contrato</span>";
                                            break;
                                        case '1':
                                            echo "<span class='bg-success text-light px-2 py-1 rounded'>Firmado</span>";
                                            break;
                                    }
                                @endphp
                            </td>
                            <td>
                                <button class="btn btn-dark btn-sm shadow"
                                    onclick="sendIdColaborador({{ $persona->id_colaborador }})"> <i
                                        class="fa-solid fa-arrow-up-right-from-square me-2"></i>Mostrar</button>
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
        @isset($personalNuevo)
            {{ $personalNuevo->links() }}
        @endisset
    </div>
    @livewire('contactcenter.contratos.dashboard')

    <script>
        function sendIdColaborador(id) {
            Livewire.emit('sendIdColaborador', id)
        }
    </script>
</div>
