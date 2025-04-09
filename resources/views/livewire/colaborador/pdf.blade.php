<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/img/icono.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Ficha Técnica de Colaborador</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        * {
            font-family: "Montserrat", sans-serif;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        .h1 {
            font-family: 2.5rem;
            font-weight: 600;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2698bd;
            color: white;
            text-align: center;
            line-height: 30px;
            display: flex;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2698bd;
            color: white;
            text-align: center;
            line-height: 35px;
            display: flex;
            align-items: center;
        }

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    </style>
</head>

<body style="background: white">
    <header style="display: flex; flex-direction:row">
        <table>
            <tr>
                <td> <img src="{{ asset('img/icono.png') }}" alt="" width="70px" height="70px"></td>
                <td>
                    <h3 style="text-align: center">PROSMAN Limpieza y Mantenimiento Industrial</h3>
                </td>
            </tr>
        </table>
    </header>

    <main>
        <div style="text-transform: capitalize;">

            <table>
                <tr>
                    <th width="50%"></th>
                    <th width="50%"></th>
                </tr>
                <tr>
                    <td colspan="2" style="font-size:30px;border-bottom:solid  #370125; "><span> Reporte
                            General</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-size: 23px">{{ $all[0]->Nombre }} {{ $all[0]->Apellido_Paterno }}
                            {{ $all[0]->Apellido_Materno }}</span><br><br>
                        <span style="font-size: 20px">Proyecto: {{ $all[0]->Nombre_Largo_Proyecto }}</span><br><br>
                        <span>Status:
                            @if ($all[0]->Status === '0')
                                Activo
                            @else
                                Inactivo
                            @endif
                        </span>
                        <br> <br>
                        <span>
                            Fecha de Ingreso:<?php echo date('d/m/Y', strtotime($all[0]->Fecha_Ingreso)); ?>
                        </span>
                    </td>
                    <td style="">
                        <img src="{{ asset($Foto) }}" alt="" width="80%" height="320px"
                            style="border-radius: 1rem;margin-left:1.5rem;">
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="2" style="font-size:18px;border-bottom:solid  #370125;">
                        <span>Información Personal</span>
                    </td>
                </tr>
                <tr>
                    <td><b>ID Interno:</b> {{ $all[0]->idColaborador }}</td>
                    <td><b>Edad</b>: {{ $all[0]->Edad }} años</td>

                </tr>
                <tr>
                    <td><b>Dirección:</b> {{ $all[0]->Direccion }}</td>
                    <td><b>Colonia:</b> {{ $all[0]->Colonia }}</td>

                </tr>
                <tr>
                    <td><b>Municipio:</b> {{ $all[0]->Municipio }}</td>
                    <td><b>Estado:</b> {{ $all[0]->Estado }}</td>

                </tr>
                <tr>
                    <td><b>Codigo Postal:</b> {{ $all[0]->Codigo_Postal }}</td>
                    <td><b>NSS: </b>{{ $all[0]->NSS }}</td>

                </tr>
                <tr>
                    <td><b>RFC:</b> {{ $all[0]->RFC }}</td>
                    <td><b>CURP:</b> {{ $all[0]->CURP }}</td>
                </tr>
                <tr>
                    <td><b>S.M.N:</b> {{ $all[0]->SMN }}</td>
                    <td><b>Telefono:</b>{{ $all[0]->Telefono }}</td>
                </tr>
                <tr>
                    <td><b>Email:</b><span style="text-transform: lowercase;">{{ $all[0]->Email }}</span>
                    </td>
                </tr><br>
                <tr>
                    <td colspan="2" style="font-size:18px;border-bottom:solid  #370125;margin-top:16px">
                        <span>Contacto de Emergencia</span>
                    </td>
                </tr>
                <tr>
                    <td><b>Nombre:</b>{{ $all[0]->Emergencia_Nombre }}</td>
                    <td><b>Telefono:</b>{{ $all[0]->Emergencia_Telefono }}</td>
                </tr>
                <tr>

                    <td><b>Parentesco:</b>{{ $all[0]->Emergencia_Parentesco }}</td>
                </tr>
                <br>
                <tr>
                    <td colspan="2" style="font-size:18px;border-bottom:solid  #370125;margin-top:16px">
                        <span>Datos Bancarios</span>
                    </td>
                </tr>
                <tr>
                    <td><b>Banco:</b> {{ $all[0]->Banco }}</td>
                    <td><b>CLABE:</b>{{ $all[0]->Clave_Interbancaria }}</td>
                </tr>
                <tr>
                    <td><b>No. Cuenta:</b> {{ $all[0]->Numero_Cuenta }}</td>
                    <td><b>No. Tarjeta:</b>{{ $all[0]->Numero_Tarjeta }}</td>
                </tr>
                <br>
                <tr>
                    <td colspan="2" style="font-size:18px;border-bottom:solid  #370125;margin-top:16px">
                        <span>Datos del Puesto</span>
                    </td>
                </tr>
                <tr>
                    <td><b>Proyecto:</b> {{ $all[0]->Nombre_Largo_Proyecto }}</td>
                    <td><b>Puesto:</b> {{ $all[0]->Puesto }}</td>
                </tr>

                <tr>
                    <td><b>Zona:</b>{{ $all[0]->Zona }}</td>
                    <td><b>Salario:</b> ${{ $all[0]->Salario }}.00</td>
                </tr>
                <tr>
                    <td><b>Tipo de Pago:</b>{{ $all[0]->Tipo_Pago }}</b></td>
                </tr>
            </table>

        </div>
        {{-- <div style="page-break-after:always;"></div> --}}
        <div class="margin-top:5rem">
            <h2>Documentos Básicos</h1>
                <table style="width: 100%">
                    <thead>
                        <tr>
                            <th style="border-bottom: solid 1px  rgba(32, 96, 164, 0.767); background:orange">Nombre
                            </th>
                            <th style="border-bottom: solid 1px  rgba(32, 96, 164, 0.767);background:orange">¿Existe
                                documento?</th>
                        </tr>

                        {{-- <th style="border-bottom: solid 1px  rgba(32, 96, 164, 0.767)">Evidencia</th> --}}
                    </thead>
                    <tbody>
                        <tr>
                            <td>Identificacion Oficial Vigente</td>
                            <td style="text-align:center">
                                @if ($documentos[0]->Identificacion == 1)
                                    Adjunto
                                @else
                                    Falta
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>CURP</td>
                            <td style="text-align:center">
                                @if ($documentos[0]->CURP == 1)
                                    Adjunto
                                @else
                                    Falta
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>NSS</td>
                            <td style="text-align:center">
                                @if ($documentos[0]->NSS == 1)
                                    Adjunto
                                @else
                                    Falta
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Comprobante de Domicilio</td>
                            <td style="text-align:center">
                                @if ($documentos[0]->Comprobante_Domiclio == 1)
                                    Adjunto
                                @else
                                    Falta
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Acta de Nacimiento</td>
                            <td style="text-align:center">
                                @if ($documentos[0]->Acta_Naciminto == 1)
                                    Adjunto
                                @else
                                    Falta
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>RFC</td>
                            <td style="text-align:center">
                                @if ($documentos[0]->RFC == 1)
                                    Adjunto
                                @else
                                    Falta
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Solicitud de Empleo</td>
                            <td style="text-align:center">
                                @if ($documentos[0]->Solicitud_Empleo == 1)
                                    Adjunto
                                @else
                                    Falta
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Contrato Digital</td>
                            <td style="text-align:center">
                                @if ($documentos[0]->Contrato_Digital == 1)
                                    Adjunto
                                @else
                                    Falta
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Caratula de Banco/Estado de Cuenta</td>
                            <td style="text-align:center">
                                @if ($documentos[0]->Caratula_Banco == 1)
                                    Adjunto
                                @else
                                    Falta
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td style="text-align:center">
                                @if ($documentos[0]->Foto == 1)
                                    Adjunto
                                @else
                                    Falta
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>
        </div>
        <div class="margin-top:5rem">
            <h2>Documentos Complementarios</h1>
                <table style="width: 100%">
                    <thead>
                        <tr>
                            <th style="border-bottom: solid 1px  rgba(32, 96, 164, 0.767); background:orange">Nombre
                            </th>
                            <th style="border-bottom: solid 1px  rgba(32, 96, 164, 0.767);background:orange">¿Existe
                                documento?</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complementarios as $documento)
                            @php
                                $arrayDocument = [];
                                $arraynameDocument = [];
                                foreach (explode('/', $documento) as $value) {
                                    array_push($arrayDocument, $value);
                                }
                                foreach (explode('.pdf', $arrayDocument[4]) as $name) {
                                    array_push($arraynameDocument, $name);
                                }
                            @endphp
                            <tr>
                                <td>{{ $arraynameDocument[0] }}</td>
                                <td style="text-align:center">SI</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div style="page-break-after:always;"></div>
        <div class="margin-top:5rem">
            <h1>Reporte de Incidencias</h1>
            <table style="width: 100%">
                <thead>
                    <th style="border-bottom: solid 1px  rgba(32, 96, 164, 0.767); background:orange;">Información</th>
                    <th style="border-bottom: solid 1px  rgba(32, 96, 164, 0.767);background:orange">Descripción</th>
                    <th style="border-bottom: solid 1px  rgba(32, 96, 164, 0.767);background:orange">Evidencia</th>
                </thead>
                <tbody>
                    {{ $contador = 0 }}
                    @if (isset($incidencias) != '')
                        @foreach ($incidencias as $item)
                            <tr style="">
                                <td style="padding:16px 8px;border-bottom:solid 1.5px black"><span>Fecha:
                                        {{ $item->Fecha_Incidencia }}</span><br>
                                    <span>Categoria: {{ $item->Categoria }}</span><br>
                                    <span>Tipo de Incidencia: {{ $item->Tipo_Incidencia }}</span>
                                </td>
                                <td style="border-bottom:solid 1.5px black">{{ $item->Descripcion }}
                                </td>
                                <td style="text-align:center;border-bottom:solid 1.5px black">
                                    <a style="padding: .5rem 1rem;background:black;color:white;border-radius:16px;text-decoration:none"
                                        href="./Incidencia/download/{{ $all[0]->idColaborador }}/{{ $item->idIncidencias }}">Descargar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" style="text-align: center;font-style:italic">Sin registros</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <h3>www.prosman.com.mx</h3>
    </footer>
    <div class="container-fluid text-light">
</body>

</html>
