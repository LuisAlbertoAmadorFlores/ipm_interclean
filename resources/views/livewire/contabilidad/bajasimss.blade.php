<div>
    <div class="h5 mt-3">Todas las Bajas</div>
    <table class="table table-hover">
        <tr>
            <th>
                ID
            </th>
            <th>Nombre</th>
            <th>Estatus</th>
            <th></th>
        </tr>
            @foreach ($todos as $persona)
            <tr class="text-capitalize">
                <td>{{ $persona->idColaborador }}</td>
                <td>{{ $persona->Nombre }} {{ $persona->Apellido_Paterno }} {{ $persona->Apellido_Materno }}</td>
                <td>{{ $persona->Status_baja }}</td>
                <td><button class="btn btn-success"
                        wire:click="tomarColaborador({{ $persona->idColaborador }},{{ Auth::user()->id }})"><i
                            class="fa-solid fa-link"></i> Tomar
                        Colaborador</button></td>
            </tr>
        @endforeach 
    </table>
</div>
