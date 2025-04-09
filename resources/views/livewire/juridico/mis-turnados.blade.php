<div class="p-2">
    <div class="d-flex">
        <div class="col-3  mb-3 bg-light">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th class=" text-center">ID</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @isset($misturnos)
                        @if (count($misturnos) > 0)
                            @foreach ($misturnos as $persona)
                                <tr>
                                    <td class="text-center">{{ $persona->idColaborador }}</td>
                                    <td class="text-capitalize">{{ $persona->Nombre }} {{ $persona->Apellido_Paterno }}
                                        {{ $persona->Apellido_Materno }}</td>
                                    <td><button class="btn btn-outline-primary btn-sm"
                                            onclick="sendByID({{ $persona->idBajas }})">Revisar</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">Sin colaboradores encontrados</td>
                            </tr>
                        @endif
                    @endisset
                </tbody>
            </table>
            @isset($misturnos)
                {{ $misturnos->links() }}
            @endisset
        </div>
        <div class="d-flex justify-content-center mx-auto border rounded">
            @livewire('juridico.bajas.ficha-baja')
        </div>
    </div>
    <script>
        function sendByID(idBaja) {
            Livewire.emit('sendIdBaja', idBaja)
        }
    </script>
</div>
