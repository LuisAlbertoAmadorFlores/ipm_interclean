<table>
    <thead>
        <tr>
            <th>#</th>
            <th>NOMBRE COMPLETO</th>
            <th>ZONA</th>
            <th>REGION</th>
            <th>CEDIS</th>
            <th>TIPO DE JORNADA</th>
            <th>DIA DE DESCANSO</th>
            <th>FECHA DE INGRESO</th>
            <th>CORTE</th>
            <th>ANTIGUEDAD</th>
            <th>FECHA BAJA</th>
            <th>ESTATUS</th>
            <th>NOMINA SEMANAL</th>
            <th>DIAS LABORADOS</th>
            <th>TIPO DE PAGO</th>
            <th>SUELDO MENSUAL TOTAL</th>
            <th>SUELDO SEMANAL</th>
            <th>SUELDO DIARIO</th>
            <th>SUBTOTAL</th>
            <th>BONOS</th>
            <th>OTROS</th>
            <th>DESCUENTO</th>
            <th>OTROS DESCUENTOS</th>
            <th>TOTAL</th>
            <th>FISCAL</th>
            <th>DIFERENCIA</th>
            <th>CUENTA CON:</th>
            <th>¿PROCEDE PAGO?</th>
            <th>NO. TARJETA </th>
            <th>CTA DEPOSITO</th>
            <th>CUENTA CLABE</th>
            <th>BANCO</th>
            <th>OBSERVACIONES</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>LUN|MAR|MIE|JUE|VIE|SAB|DOM</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @php
            $nominaTotal = 0;
        @endphp
        @foreach ($data as $persona)
            <tr>
                <td>{{ $persona->idColaborador }}</td>
                <td>{{ $persona->nombrePersona }} {{ $persona->Apellido_Paterno }} {{ $persona->Apellido_Materno }}</td>
                <td></td>
                <td>{{ $persona->Region }}</td>
                <td>{{ $persona->Nombre_Region }}</td>
                <td>
                    @switch($persona->Modalidad)
                        @case(1)
                            CUBRE-DESCANSO
                        @break

                        @case(2)
                            CUBRE-EVENTO
                        @break

                        @default
                            FIJO
                    @endswitch

                </td>
                <td>DOMINGO</td>
                <td>@php
                    echo date('d-m-Y', strtotime($persona->Fecha_Ingreso));
                @endphp
                </td>
                <td>{{ $corte }}</td>
                <td>@php
                    $datehoy = new DateTime('now');
                    $dateIngreso = new DateTime($persona->Fecha_Ingreso);
                    $res = $dateIngreso->diff($datehoy);
                    echo $res->days . ' dias';
                @endphp
                </td>
                <td>

                </td>
                <td>
                    @if ($persona->Status == 0)
                        @php
                            echo 'ACTIVO';
                        @endphp
                    @endif
                    @if ($persona->Status == 1)
                        @php
                            echo 'INACTIVO';
                        @endphp
                    @endif
                </td>
                <td>
                    Semanal
                </td>
                <td></td>
                <td>
                    {{ $persona->Tipo_Pago }}
                </td>
                <td>
                    @php
                        echo number_format($persona->Salario, 2);
                    @endphp
                </td>
                <td>
                    @php
                        echo number_format(($persona->Salario / 30) * 7, 2);
                    @endphp
                </td>
                <td>
                    @php
                        echo number_format($persona->Salario / 30, 2);
                    @endphp
                </td>
                <td>{{ $persona->acumulado_diario }}</td>
                <td>{{ $persona->Bono }}</td>
                <td>{{ $persona->Pago_Extra }}</td>
                <td>{{ $persona->Descuentos }}</td>
                <td></td>
                <td>{{ $persona->Saldo_Pagar }}</td>
                <td></td>
                <td>

                </td>
                <td>

                </td>
                <td>{{ $persona->Procede_Pago }}</td>
                <td>{{ $persona->Numero_Tarjeta }}</td>
                <td>{{ $persona->Numero_Cuenta }}</td>
                <td>{{ $persona->Clave_Interbancaria }}</td>
                <td>{{ $persona->Banco }}</td>
                <td></td>
                <td>
                    @php
                        echo "http://intranetipm.ddns.net/lala/public/storage/Colaboradores/".$persona->idColaborador ."/Lista_Asistencia/Pase_de_Lista_".$fechainicial ."_".$corte.".jpg"
                    @endphp
                </td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TOTAL NOMINA</td>
            <td>${{ $totalNomina }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TOTAL NO PROCEDE</td>
            <td>${{ $NominaNoPagar }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TOTAL A PAGAR</td>
            <td>${{$NominaSiPagar}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
