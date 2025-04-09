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
            <th>Salario Mensual</th>
            <th>Tipo de Jornada</th>
            <th>Pago</th>
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
                <td>{{ $persona->Salario }}</td>
                <td>{{ $persona->Jornada }}</td>
                <td>{{ $persona->Tipo_Pago }}</td>
            </tr>
        @endforeach
    </tbody>
</table>