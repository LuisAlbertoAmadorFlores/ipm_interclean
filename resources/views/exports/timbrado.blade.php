
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido_Paterno</th>
            <th>Apellido_Materno</th>
            <th>NSS</th>
            <th>RFC</th>
            <th>CURP</th>
            <th>Fecha Ingreso</th>
            <th>Fecha Baja</th>
            <th>Codigo Postal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $persona)
            <tr>
                <td>{{ $persona->Nombre }} </td>
                <td>{{ $persona->Apellido_Paterno }}</td>
                <td>{{ $persona->Apellido_Materno }}</td>
                <td>{{ $persona->NSS }}</td>
                <td>{{ $persona->RFC }}</td>
                <td>{{ $persona->CURP }}</td>
                <td>{{ $persona->Fecha_Ingreso }}</td>
                <td></td>
                <td>{{ $persona->Codigo_Postal_RFC }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
