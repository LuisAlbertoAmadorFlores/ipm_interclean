<div class="d-flex text-light">
    <div class="me-2 w-100 rounded">
        <div class="rounded-top ps-2 py-1 text-dark" style="background: rgba(255, 255, 255, 0.32)">Registro de
            Asistencia
        </div>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th>Estatus</th>
                        <th scope="col">Dia / Fecha</th>
                        <th scope="col">Entrada</th>
                        <th scope="col">Salida</th>
                        <th>Acumulado+Salario = Acumulado</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($detalles)
                        @foreach ($detalles as $dia)
                            <tr class="">
                                <td>
                                    @switch($dia->Tipo)
                                        @case('faltaJustificada')
                                            Falta Justificada
                                        @break

                                        @case('faltaInjustificada')
                                            Falta Injustificada
                                            @php
                                                $flatFaltaInjustificada = true;
                                            @endphp
                                        @break

                                        @case('descanso')
                                            Descanso
                                        @break

                                        @default
                                            {{ $dia->Tipo }}
                                    @endswitch
                                </td>
                                <td scope="row">@php
                                    switch (date('N', strtotime($dia->Fecha_Laboral))) {
                                        case '1':
                                            echo 'Lunes' . ' / ' . date('d-m-Y', strtotime($dia->Fecha_Laboral));
                                            break;
                                        case '2':
                                            echo 'Martes' . ' / ' . date('d-m-Y', strtotime($dia->Fecha_Laboral));
                                            break;
                                        case '3':
                                            echo 'Miercoles' . ' / ' . date('d-m-Y', strtotime($dia->Fecha_Laboral));
                                            break;
                                        case '4':
                                            echo 'Jueves' . ' / ' . date('d-m-Y', strtotime($dia->Fecha_Laboral));
                                            break;
                                        case '5':
                                            echo 'Viernes' . ' / ' . date('d-m-Y', strtotime($dia->Fecha_Laboral));
                                            break;
                                        case '6':
                                            echo 'Sabado' . ' / ' . date('d-m-Y', strtotime($dia->Fecha_Laboral));
                                            break;
                                        case '7':
                                            echo 'Domingo' . ' / ' . date('d-m-Y', strtotime($dia->Fecha_Laboral));
                                            break;
                                    }

                                @endphp</td>
                                <td>{{ $dia->Hora_Entrada }}</td>
                                <td>{{ $dia->Hora_Salida }}</td>
                                <td>
                                    @if ($dia->Tipo_Pago == 'Semanal')
                                        @switch($dia->Tipo)
                                            @case('faltaInjustificada')
                                                @php
                                                    echo "$0.00";
                                                @endphp
                                            @break

                                            @default
                                                @php
                                                    if (
                                                        $flatFaltaInjustificada == true &&
                                                        date('N', strtotime($dia->Fecha_Laboral)) == '7'
                                                    ) {
                                                        echo "$0.00";
                                                        $totalBono = 0;
                                                    } else {
                                                        if ($dia->Tipo == 'festivo') {
                                                            $pagoDiario = $dia->Salario / 4 / 7;
                                                            echo "A + $" . number_format($pagoDiario * 2, 2);
                                                            $sumaPago = $sumaPago + $pagoDiario * 2;
                                                            echo " = $" . number_format($sumaPago, 2);
                                                        } else {
                                                            $pagoDiario = $dia->Salario / 30;
                                                            echo "A + $" . number_format($pagoDiario, 2);
                                                            $sumaPago = $sumaPago + $pagoDiario;
                                                            echo " = $" . number_format($sumaPago, 2);
                                                        }
                                                    }
                                                @endphp
                                            @break
                                        @endswitch
                                    @endif
                                    {{-- @if ($dia->Tipo_Pago == 'Quincenal')
                                        @switch($dia->Tipo)
                                            @case('faltaInjustificada')
                                                @php
                                                    echo "$0.00";
                                                @endphp
                                            @break

                                            @default
                                                @php
                                                    if (
                                                        $flatFaltaInjustificada == true &&
                                                        date('N', strtotime($dia->Fecha_Laboral)) == '7'
                                                    ) {
                                                        echo "$0.00";
                                                        $flatBono = true;
                                                        $flatFaltaInjustificada = false;
                                                    } else {
                                                        if ($dia->Tipo == 'festivo') {
                                                            $pagoDiario = $dia->Salario / 2 / 15;
                                                            echo "A + $" . number_format($pagoDiario * 2, 2);
                                                            $sumaPago = $sumaPago + $pagoDiario * 2;
                                                            echo " = $" . number_format($sumaPago, 2);
                                                        } else {
                                                            $pagoDiario = $dia->Salario / 2 / 15;
                                                            echo "A + $" . number_format($pagoDiario, 2);
                                                            $sumaPago = $sumaPago + $pagoDiario;
                                                            echo " = $" . number_format($sumaPago, 2);
                                                        }
                                                    }
                                                @endphp
                                            @break
                                        @endswitch
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-3">
        <div class="pb-2 text-light rounded mb-3" style="background: rgba(255, 255, 255, 0.32)">
            <div class="rounded-top ps-2 py-1 text-dark" style="background: rgba(255, 255, 255, 0.32)">Informacion
                Colaborador
            </div>
            @isset($datos)
                <div class="ps-2">
                    <b> Nombre:</b> {{ $datos[0]->Nombre }} {{ $datos[0]->Apellido_Paterno }}
                    {{ $datos[0]->Apellido_Materno }}
                </div>
            @endisset
            <div class="ps-2">
                <span><b>Salario Mensual:</b> ${{ $datos[0]->Salario }}</span><br><span><b>Bono Autorizado:</b>
                    ${{ $datos[0]->Bono }}
                </span>
            </div>
        </div>

        <div class="mt-3 rounded" style="background: rgba(255, 255, 255, 0.32)">
            <div class="rounded-top ps-2 py-1 text-dark" style="background: rgba(255, 255, 255, 0.32)">Acumulados</div>
            <div class="table-responsive">
                <table class="table table-primary">
                    <tbody>
                        <tr class="">
                            <th scope="row">Sueldo</th>
                            <td>@php
                                echo number_format($sumaPago, 2);
                            @endphp</td>
                        </tr>
                        <tr class="">
                            <th scope="row">Bono</th>
                            <td>
                                @if ($flatFaltaInjustificada == false)
                                    {{ $datos[0]->Bono }}
                                @else
                                    @php
                                        echo '0';
                                    @endphp
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pago Extra</th>
                            <td colspan="2">
                                @php echo number_format($pagosextras, 2); @endphp
                            </td>
                        </tr>
                        <tr class="">
                            <th scope="row">Descuentos</th>
                            <td>@php echo number_format($descuento, 2); @endphp</td>
                        </tr>
                        <tr>
                            <th>Total Nomina</th>
                            <td>
                                @php
                                    if ($flatFaltaInjustificada == false) {
                                        $nomina = $sumaPago + $pagosextras + intval($datos[0]->Bono) - $descuento;
                                        $bonoAplicado = $datos[0]->Bono;
                                    } else {
                                        $nomina = $sumaPago + $pagosextras + intval(0) - $descuento;
                                        $bonoAplicado = '0';
                                    }
                                    echo "$" . number_format($nomina, 2);
                                @endphp
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <div class="w-100  rounded p-1" style="background: rgba(255, 255, 255, 0.32)">
                <label for="">¿Procede Pago?</label>
                <select name="" id="" class="form-select" wire:model="procedePago">
                    <option value="" selected>Selecciona una opcion</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>
        </div>
        <div class="mt-3">
            <div class="rounded-top ps-2 py-1" style="background: rgba(255, 255, 255, 0.32)">Foto</div>
            <div class="w-100  rounded p-1" style="background: rgba(255, 255, 255, 0.32)">
                <input class="form-control" type="file" name="" id="" accept=".jpg"
                    wire:model="evidenciaAsistencia" multiple>
                {{-- @isset($evidenciaAsistencia)
                    <img src="{{ $evidenciaAsistencia->temporaryUrl() }}" alt="" width="100%" height="250px"
                        class="mb-3">
                @endisset --}}
            </div>
            <div class="mt-3 d-flex justify-content-end">
                {{-- @if (Auth::user()->rol == 'Coordinador' || Auth::user()->rol == 'Sistemas') --}}
                    <button type="button" class="w-100 btn btn-warning mx-2"
                        wire:click="agregarNomina({{ $sumaPago }},{{ $descuento }},{{ $bonoAplicado }},{{ $pagosextras }},{{ $nomina }},{{ Auth::user()->id }})">
                        Pasar a Excel</button>
                {{-- @endif --}}
            </div>
        </div>
    </div>
</div>
