@extends('layouts.app')
@section('content')
    @if (Auth::user()->rol == 'Reclutador' || Auth::user()->rol == 'Coordinador' || Auth::user()->rol == 'Gerente')
        <div class="col-lg-11 text-dark rounded mx-auto mt-5 shadow py-2 d-flex flex-column aling-items-center degradado blur14"
            style="">
            <div class="mt-3 d-flex">
                <div class="col-lg-3">
                    <p class="ms-5 h5 mb-2">Total de Registros</p>
                    <div class="bg-primary text-light rounded d-flex mx-5">
                        <div class="col-6 p-2  d-flex flex-column justify-content-center align-items-center">
                            <i class="fa-solid fa-address-book fa-5x"></i>
                            @isset($totalRegisters)
                                <div class="text-center mt-1">{{ $totalRegisters }}</div>
                            @endisset
                        </div>
                        <div class="py-2">
                            <div class="d-flex py-1" style="border-bottom: solid 1.5px">
                                <i class="fa-solid fa-person-dress fa-3x me-2"></i>
                                <div class="d-flex flex-column">
                                    <span>Mujeres</span>
                                    @isset($Mujer)
                                        <span class="">{{ $Mujer }}</span>
                                    @endisset

                                </div>
                            </div>
                            <div class="d-flex py-1">
                                <i class="fa-solid fa-person fa-3x me-2"></i>
                                <div class="d-flex flex-column">
                                    <span>Hombres</span>
                                    @isset($Hombre)
                                        <span class="">{{ $Hombre }}</span>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p class="ms-5 h5 mb-2">Personal Activo</p>
                    <div class="bg-success text-light rounded d-flex mx-5">
                        <div class="col-6 p-2  d-flex flex-column justify-content-center aling-items-center">
                            <span class="text-center"><i class="fa-solid fa-user-tie fa-5x"></i></span>
                            @isset($activo)
                                <span class="text-center mt-1 ">{{ $activo }}</span>
                            @endisset
                        </div>
                        <div class="py-2">
                            <div class="d-flex py-1" style="border-bottom: solid 1.5px">
                                <i class="fa-solid fa-person-dress fa-3x me-2"></i>
                                <div class="d-flex flex-column">
                                    <span>Mujeres</span>
                                    @isset($TotalAM)
                                        <span class="">{{ $TotalAM }}</span>
                                    @endisset
                                </div>
                            </div>
                            <div class="d-flex py-1">
                                <i class="fa-solid fa-person fa-3x me-2"></i>
                                <div class="d-flex flex-column">
                                    <span>Hombres</span>
                                    @isset($TotalAH)
                                        <span class="">{{ $TotalAH }}</span>
                                    @endisset

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p class="ms-5 h5">Total Bajas</p>
                    <div class="bg-secondary text-light rounded d-flex mx-5">
                        <div class="col-6 p-2  d-flex flex-column justify-content-center aling-items-center">
                            <span class="text-center"><i class="fa-solid fa-handshake-slash fa-5x"></i></span>
                            @isset($totalBajas)
                                <span class="text-center mt-1">{{ $totalBajas }}</span>
                            @endisset

                        </div>
                        <div class="py-2">
                            <div class="d-flex py-1" style="border-bottom: solid 1.5px">
                                <i class="fa-regular fa-circle-check fa-3x me-2"></i>
                                <div class="d-flex flex-column">
                                    <span>Realizadas</span>
                                    @isset($bajarealizada)
                                        <span class="">{{ $bajarealizada }}</span>
                                    @endisset

                                </div>
                            </div>
                            <div class="d-flex py-1">
                                <i class="fa-solid fa-clock fa-3x me-2 pt-1"></i>
                                <div class="d-flex flex-column">
                                    <span>Pendientes</span>
                                    @isset($bajapendiente)
                                        <span class="">{{ $bajapendiente }}</span>
                                    @endisset

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p class="ms-5 h4">Total Incidencias</p>
                    <div class="bg-danger text-light rounded d-flex mx-5">
                        <div class="col-6 p-2  d-flex flex-column justify-content-center aling-items-center">
                            <span class="text-center"><i class="fa-solid fa-triangle-exclamation fa-5x"></i></span>
                            @isset($totalincidencias)
                                <span class="text-center mt-1">{{ $totalincidencias }}</span>
                            @endisset

                        </div>
                        <div class="py-2">
                            <div class="d-flex py-1" style="border-bottom: solid 1.5px">
                                <i class="fa-solid fa-box-archive fa-3x me-2"></i>
                                <div class="d-flex flex-column">
                                    <span>Admin.</span>
                                    @isset($incidenciaAdmin)
                                        <span>{{ $incidenciaAdmin }}</span>
                                    @endisset

                                </div>
                            </div>
                            <div class="d-flex py-1">
                                <i class="fa-solid fa-person-digging fa-3x me-2"></i>
                                <div class="d-flex flex-column">
                                    <span>Operativa</span>
                                    @isset($incidenciaOpera)
                                        <span>{{ $incidenciaOpera }}</span>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-5 py-4">
                <span class="h5">Grafica de Incidencias(Lavadores)</span>
                <canvas class="mt-3 border rounded p-2 text-light bg-light" id="incidencias" width="400"
                    height="80"></canvas>
            </div>
            <div class="mx-5 py-4">
                <span class="h5">Resultados Examen</span>
                <canvas class="mt-3 border rounded p-2 text-light bg-light" id="examen" width="400"
                    height="50"></canvas>
            </div>

            <script>
                let dataAll = @json($dataYear);

                let Enero = dataAll[0],
                    Febrero = dataAll[1],
                    Marzo = dataAll[2],
                    Mayo = dataAll[3],
                    Abril = dataAll[4],
                    Junio = dataAll[5],
                    Julio = dataAll[6],
                    Agosto = dataAll[7],
                    Septiembre = dataAll[8],
                    Octubre = dataAll[9],
                    Noviembre = dataAll[10],
                    Diciembre = dataAll[11];


                const ResultadoExamen = document.getElementById('examen');
                const ctx = document.getElementById('incidencias');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                            'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        datasets: [{
                            label: '# de Incidencias',
                            data: [Enero, Febrero, Marzo, Abril, Mayo, Junio, Julio, Agosto, Septiembre, Octubre,
                                Noviembre, Diciembre
                            ],
                            borderWidth: 1,
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            background: 'black',
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
                        }
                    }
                });
                new Chart(ResultadoExamen, {
                    type: 'bar',
                    data: {
                        labels: ['Total Indicios', 'Esmeralda Jarillas S', 'Yessica Sanchez G', 'Marion de la LLave',
                            'Irving Elias G'
                        ],
                        datasets: [{
                            label: 'Respuestas Buenas',
                            data: [12, 10, 11, 9.5, 11],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1,
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            background: 'black',
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
                        }
                    }
                });
            </script>
        </div>
    @endif
    @if (Auth::user()->rol == 'CallCenter' || Auth::user()->rol == 'Sistemas')
        <div class="col-11 rounded mx-auto mt-5 shadow py-2 d-flex flex-wrap justify-content-center aling-items-center degradado"
            style="height: 84vh">
            <div class="mx-5 py-4" style="height: 35vh">
                <span class="h5 text-light">Grafica Contratos</span>
                <canvas class="mt-3 border rounded p-2 text-light bg-light" id="incidencias" width="400"
                    height="80"></canvas>
            </div>
            <div class="mx-5 py-4" style="height: 35vh">
                <span class="h5 text-light">Capacitados</span>
                <canvas class="mt-3 border rounded p-2 text-light bg-light" id="examen" width="400"
                    height="50"></canvas>
            </div>
            <div class="mx-5 py-4" style="height: 35vh">
                <span class="h5 text-light">Tickets</span>
                <canvas class="mt-3 border rounded p-2 text-light bg-light" id="atencionColaborador" width="400"
                    height="50"></canvas>
            </div>

            <script>
                let contratos = @json($contratos);

                let sinContrato = contratos['sinContrato'],
                    conContrato = contratos['conContrato'];


                const ResultadoExamen = document.getElementById('examen');
                const atencionColaborador = document.getElementById('atencionColaborador');
                const ctx = document.getElementById('incidencias');

                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Sin Contrato', 'Con Contrato'],
                        datasets: [{
                            label: 'Contratos',
                            data: [sinContrato, conContrato],
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)'
                            ],
                            hoverOffset: 4
                        }]
                    }
                });
                new Chart(ResultadoExamen, {
                    type: 'pie',
                    data: {
                        labels: ['No Capacitados',
                            'Capacitados'
                        ],
                        datasets: [{
                            label: 'Respuestas Buenas',
                            data: [12, 10],
                            backgroundColor: [
                                'rgba(255, 99, 132)',
                                'rgba(54, 162, 155)'
                            ]
                        }]
                    }
                });
                new Chart(atencionColaborador, {
                    type: 'line',
                    data: {
                        labels: ['Operacion','Juridico','Contable','TI'],
                        datasets: [{
                            label: 'My First Dataset',
                            data: [65, 59, 80, 81],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)'
                            ],
                            borderWidth: 1
                        }],
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        },
                    }
                });
            </script>
        </div>
    @endif
@endsection
