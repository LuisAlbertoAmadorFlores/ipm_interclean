<div class="d-flex justify-content-end p-3 position-absolute" style="top:40px;right:60px">
    <table class="rounded degradado-blur" id="tableNumerica" style="cursor:pointer">
        <tr>
            <th colspan="6" class="text-center">
                <p class="h5 pt-2">Guia de documentos</p>
            </th>
        </tr>
        <tr>
            <td class="px-2"><i class="fa-solid fa-1"></i></td>
            <td>INE</td>
            <td class="px-2"><i class="fa-solid fa-2"></i></td>
            <td>CURP</td>
            <td class="px-2"><i class="fa-solid fa-3"></i></td>
            <td style="width: 5rem">NSS</td>
        </tr>
        <tr>
            <td class="px-2"><i class="fa-solid fa-4"></i></td>
            <td>Domicilio</td>
            <td class="px-2"><i class="fa-solid fa-5"></i></td>
            <td>Acta de Nacimiento</td>
            <td class="px-2"><i class="fa-solid fa-6"></i></td>
            <td>RFC</td>
        </tr>
        <tr>
            <td class="px-2"><i class="fa-solid fa-7"></i></td>
            <td>Solicitud de Empleo</td>
            <td class="px-2"><i class="fa-solid fa-8"></i></td>
            <td>Contrato Digital</td>
            <td class="px-2"><i class="fa-solid fa-9"></i></td>
            <td>Foto</td>
        </tr>
        <tr>
            <td class="px-2"><i class="fa-solid fa-1"></i><i class="fa-solid fa-0"></i></td>
            <td>Caratula Banco</td>
            <td class="px-2"><i class="fa-solid fa-1"></i><i class="fa-solid fa-1"></i></td>
            <td>Complementos</td>
            <td class="px-2"></td>
            <td></td>
        </tr>
    </table>
</div>
<div class="mb-2 pt-0 col-lg-12 rounded-bottom scrollbar">
    <div class="rounded text-dinamico">
        <div class="py-2 bg-light d-flex rounded-top">
            <span class="col-lg-1 text-center" style="background: rgba(255, 255, 255, 0.521);">ID</span>
            <span class="col-lg-6 " style="background: rgba(255, 255, 255, 0.521);">Nombre</span>
            <div class="col-lg-4 d-flex justify-content-between">
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">1</span>
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">2</span>
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">3</span>
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">4</span>
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">5</span>
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">6</span>
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">7</span>
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">8</span>
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">9</span>
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">10</span>
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">11</span>
                <span class="text-dark" style="background: rgba(255, 255, 255, 0.521);">Upload</span>
            </div>
        </div>

        @if (isset($listColaborador) != '')
            <div class="scrollbar" style="height:57vh;overflow-y:scroll;">
                @if (count($listColaborador) != 0)
                    @foreach ($listColaborador as $colaborador)
                        <div class="text-capitalize d-flex border-bottom align-items-center"
                            style="font-family:Montserrat,sans-serif;background: rgba(255, 255, 255, 0.88);">
                            <span class="col-lg-1 text-center">
                                <!-- Modal trigger button -->
                                @if (Auth::user()->rol == 'Reclutador' ||
                                        Auth::user()->rol == 'Coordinador' ||
                                        Auth::user()->rol == 'Sistemas' ||
                                        Auth::user()->rol == 'Gerente')
                                    <button type="button"
                                        class="btn @if ($colaborador->Total_Auditados == '10') btn-success
                                @else
                                    btn-primary @endif "
                                        data-bs-toggle="modal" data-bs-target="#modalComentariosDocumentos"
                                        onclick="sendIDColaborador({{ $colaborador->id_usuario }})">
                                        @if ($colaborador->Total_Auditados == '10')
                                            <i class="fa-solid fa-circle-check"></i>
                                        @else
                                            <i class="fa-solid fa-comments"></i>
                                        @endif
                                    </button>
                                @endif


                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalComentariosDocumentos" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                        role="document">
                                        <div class="modal-content degradado-modal text-light">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-capitalize" id="modalTitleId">
                                                    Documentacion
                                                </h5>
                                                <button type="button" class="btn-close bg-light"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body scrollbar">
                                                @livewire('documentos.detalles')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                | {{ $colaborador->idColaborador }} |
                            </span>
                            <span class="col-lg-6">{{ $colaborador->Nombre }} {{ $colaborador->Apellido_Paterno }}
                                {{ $colaborador->Apellido_Materno }}</span>
                            <div class="col-lg-4 py-1 d-flex align-items-center justify-content-between">
                                <span class="">
                                    @if ($colaborador->Identificacion == '1')
                                        <i class="fa-solid fa-circle-check"></i>
                                    @else
                                        <i class="fa-regular fa-circle"></i>
                                    @endif
                                </span>
                                <span>
                                    @if ($colaborador->CURP == '1')
                                        <i class="fa-solid fa-circle-check"></i>
                                    @else
                                        <i class="fa-regular fa-circle"></i>
                                    @endif
                                </span>
                                <span>
                                    @if ($colaborador->NSS == '1')
                                        <i class="fa-solid fa-circle-check"></i>
                                    @else
                                        <i class="fa-regular fa-circle"></i>
                                    @endif
                                </span>
                                <span>
                                    @if ($colaborador->Comprobante_Domiclio == '1')
                                        <i class="fa-solid fa-circle-check"></i>
                                    @else
                                        <i class="fa-regular fa-circle"></i>
                                    @endif
                                </span>
                                <span>
                                    @if ($colaborador->Acta_Naciminto == '1')
                                        <i class="fa-solid fa-circle-check"></i>
                                    @else
                                        <i class="fa-regular fa-circle"></i>
                                    @endif
                                </span>
                                <span>
                                    @if ($colaborador->RFC == '1')
                                        <i class="fa-solid fa-circle-check"></i>
                                    @else
                                        <i class="fa-regular fa-circle"></i>
                                    @endif
                                </span>
                                <span>
                                    @if ($colaborador->Solicitud_Empleo == '1')
                                        <i class="fa-solid fa-circle-check"></i>
                                    @else
                                        <i class="fa-regular fa-circle"></i>
                                    @endif
                                </span>
                                <span>
                                    @if ($colaborador->Contrato_Digital == '1')
                                        <i class="fa-solid fa-circle-check"></i>
                                    @else
                                        <i class="fa-regular fa-circle"></i>
                                    @endif
                                </span>
                                <span>
                                    @if ($colaborador->Foto == '1')
                                        <i class="fa-solid fa-circle-check"></i>
                                    @else
                                        <i class="fa-regular fa-circle"></i>
                                    @endif
                                </span>
                                <span>
                                    @if ($colaborador->Caratula_Banco == '1')
                                        <i class="fa-solid fa-circle-check"></i>
                                    @else
                                        <i class="fa-regular fa-circle"></i>
                                    @endif
                                </span>
                                <span>
                                    @if ($colaborador->Otro == '1')
                                        <i class="fa-solid fa-circle-check"></i>
                                    @else
                                        <i class="fa-regular fa-circle"></i>
                                    @endif
                                </span>
                                <div class="upload"><!-- Modal trigger button --> 
                                    <button class="Documents-btn" data-bs-toggle="modal"
                                        data-bs-target="#documentosModal"
                                        onclick="sendIDColaborador({{ $colaborador->id_usuario }})">
                                        <span class="folderContainer">
                                            <svg class="fileBack" width="146" height="113"
                                                viewBox="0 0 146 113" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0 4C0 1.79086 1.79086 0 4 0H50.3802C51.8285 0 53.2056 0.627965 54.1553 1.72142L64.3303 13.4371C65.2799 14.5306 66.657 15.1585 68.1053 15.1585H141.509C143.718 15.1585 145.509 16.9494 145.509 19.1585V109C145.509 111.209 143.718 113 141.509 113H3.99999C1.79085 113 0 111.209 0 109V4Z"
                                                    fill="url(#paint0_linear_117_4)"></path>
                                                <defs>
                                                    <linearGradient id="paint0_linear_117_4" x1="0"
                                                        y1="0" x2="72.93" y2="95.4804"
                                                        gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#8F88C2"></stop>
                                                        <stop offset="1" stop-color="#5C52A2"></stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            <svg class="filePage" width="88" height="99" viewBox="0 0 88 99"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="88" height="99" fill="url(#paint0_linear_117_6)">
                                                </rect>
                                                <defs>
                                                    <linearGradient id="paint0_linear_117_6" x1="0"
                                                        y1="0" x2="81" y2="160.5"
                                                        gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="white"></stop>
                                                        <stop offset="1" stop-color="#686868"></stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>

                                            <svg class="fileFront" width="160" height="79"
                                                viewBox="0 0 160 79" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.29306 12.2478C0.133905 9.38186 2.41499 6.97059 5.28537 6.97059H30.419H58.1902C59.5751 6.97059 60.9288 6.55982 62.0802 5.79025L68.977 1.18034C70.1283 0.410771 71.482 0 72.8669 0H77H155.462C157.87 0 159.733 2.1129 159.43 4.50232L150.443 75.5023C150.19 77.5013 148.489 79 146.474 79H7.78403C5.66106 79 3.9079 77.3415 3.79019 75.2218L0.29306 12.2478Z"
                                                    fill="url(#paint0_linear_117_5)"></path>
                                                <defs>
                                                    <linearGradient id="paint0_linear_117_5" x1="38.7619"
                                                        y1="8.71323" x2="66.9106" y2="82.8317"
                                                        gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#C3BBFF"></stop>
                                                        <stop offset="1" stop-color="#51469A"></stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="modal fade" id="documentosModal" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                            role="document">
                                            <div class="modal-content degradado-modal">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-light" id="modalTitleId">
                                                        Documentación
                                                    </h5>
                                                    <button type="button" class="btn-close bg-light"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @livewire('documentos.documentoupfile')</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <tr>
                        <td colspan="14" class="text-center">Sin resultados</td>
                    </tr>
                @endif
            </div>
        @endif
        <div class="mt-3 d-flex justify-content-end">
            @if (Auth::user()->rol == 'Reclutador' ||
                    Auth::user()->rol == 'Coordinador' ||
                    Auth::user()->rol == 'Sistemas' ||
                    Auth::user()->rol == 'Gerente')
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#estadistica">
                    <i class="fa-solid fa-chart-simple"></i> Estadistica de Documentos
                </button>
            @endif

            <div class="modal fade" id="estadistica" tabindex="-1" data-bs-backdrop="static"
                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                    role="document">
                    <div class="modal-content degradado">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                                Estadistica de Documentos
                            </h5>
                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-between">
                                <div class=" pb-4 col-8">
                                    <span class="border-bottom">Grafica de Documentos</span>
                                    <canvas class="mt-3 border rounded p-2 text-light bg-light" id="documentos"
                                        width="400" height="150"></canvas>
                                </div>
                                <div class="col-3">
                                    <span class="border-bottom">Perfiles Completos y Validados</span>
                                    <div class="mt-5 contenedor-perfiles rounded-circle p-3 shadow">
                                        <span class="text-dark">{{ $totalValidados }} /
                                            {{ $totalRegistros }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                let TotalRegistros = <?php echo $totalRegistros; ?>;
                INE = <?php echo $totalINE; ?>;
                CURP = <?php echo $totalCURP; ?>;
                NSS = <?php echo $totalNSS; ?>;
                Domicilio = <?php echo $totalDomicilio; ?>;
                ActaNacimiento = <?php echo $totalActa; ?>;
                RFC = <?php echo $totalRFC; ?>;
                SolicitudEmpleo = <?php echo $totalCV; ?>;
                ContratoDigital = <?php echo $totalContrato; ?>;
                Foto = <?php echo $totalFoto; ?>;
                CaratulaBanco = <?php echo $totalCaratula; ?>;

                const ctx = document.getElementById('documentos');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Total', 'INE', 'CURP', 'NSS', 'Domicilio', 'Acta de Nacimiento', 'RFC',
                            'Solicitud de Empleo',
                            'Contrato Digital', 'Foto',
                            'Caratula de Banco'
                        ],
                        datasets: [{
                            label: 'Documentacion Cargada',
                            data: [TotalRegistros, INE, CURP, NSS, Domicilio, ActaNacimiento, RFC, SolicitudEmpleo,
                                ContratoDigital,
                                Foto,
                                CaratulaBanco
                            ],
                            borderWidth: 1,
                            fill: false,
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)'
                            ],
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)'
                            ],
                            background: 'rgba(0,0,0,0.1)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        animations: {
                            tension: {
                                duration: 1000,
                                easing: 'linear',
                                from: 1,
                                to: 0,
                                loop: true
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                labels: {
                                    color: 'rgb(255,99,,132)'
                                }
                            }
                        }
                    }
                });

                function sendIDColaborador(id) {
                    Livewire.emit('detallesDocumentos', id);
                }
            </script>
        </div>
        </table>
    </div>
