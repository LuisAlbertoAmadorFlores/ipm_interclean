@extends('layouts.app')
@section('content')
    <div class="scrollbar w-100 d-flex justify-content-center align-items-center" style="height: 94.5vh;">
        <div class="row d-lg-flex col-11 mx-auto  rounded degradado">
            <div class="py-2 ps-2 rounded-top h5 text-light encabezados">Revisar Documentos
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <div class="">
                        @livewire('colaborador.inputsearch', ['id' => '', 'proyecto' => Auth::user()->proyecto])
                    </div>
                    <div class="pt-0 col-lg-12 rounded scrollbar" style="height: 70vh;background:#ffffff2c">
                        @livewire('colaborador.tablacolaboradores', ['idColaborador' => ''])
                    </div>
                </div>
            </div>
            <div class="col-lg pt-2" style="height:80vh">
                <div class="rounded-end pt-3">
                    <div class="mx-0 rounded" style="height:78vh;background:#ffffff2c">
                        @livewire('juridico.tarjetajuridico', ['idColaborador' => ''])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end position-absolute text-dark " style="top:55px;right:57px;">
        <table class="rounded shadow" id="tableNumerica"
            style="backdrop-filter:blur(4px);background:#ffffffbe;cursor:pointer">
            <tr>
                <th colspan="10" class="text-center">
                    Guia de documentos
                </th>
            </tr>
            <tr>
                <td class="px-2 fs-6">1</td>
                <td clas>INE</td>
                <td class="px-2">2</td>
                <td>CURP</td>
                <td class="px-2">3</td>
                <td style="width: 5rem">NSS</td>
                <td class="px-2">4</td>
                <td>Domicilio</td>
            </tr>
            <tr>
                <td class="px-2">5</td>
                <td>Acta de Nacimiento</td>
                <td class="px-2">6</td>
                <td>RFC</td>
                <td class="px-2">7</td>
                <td>Solicitud CV</td>
                <td class="px-2">8</td>
                <td>Contrato Digital</td>
            </tr>
            <tr>
                <td class="px-2">9</td>
                <td>Foto</td>
                <td class="px-2">10</td>
                <td>Caratula de Banco</td>
                <td class="px-2">11</td>
                <td>Complementos</td>
            </tr>
        </table>
    </div>
    <script>
        tableNumerica.onmousedown = function(event) {

            let shiftX = event.clientX - tableNumerica.getBoundingClientRect().left;
            let shiftY = event.clientY - tableNumerica.getBoundingClientRect().top;

            tableNumerica.style.position = 'absolute';
            tableNumerica.style.zIndex = 1000;
            document.body.append(tableNumerica);

            moveAt(event.pageX, event.pageY);

            // mueve la pelota a las coordenadas (pageX, pageY)
            // tomando la posición inicial en cuenta
            function moveAt(pageX, pageY) {
                tableNumerica.style.left = pageX - shiftX + 'px';
                tableNumerica.style.top = pageY - shiftY + 'px';
            }

            function onMouseMove(event) {
                moveAt(event.pageX, event.pageY);
            }

            // mueve la pelota con mousemove
            document.addEventListener('mousemove', onMouseMove);

            // suelta la pelota, elimina el manejador innecesario
            tableNumerica.onmouseup = function() {
                document.removeEventListener('mousemove', onMouseMove);
                tableNumerica.onmouseup = null;
            };

        };

        tableNumerica.ondragstart = function() {
            return false;
        };

        function sendDocument(documento, colaborador) {
            Livewire.emit('sendDocumento' => [{
                'nombredocumento': documento,
                'idColaborador': colaborador
            }]);
        }
    </script>
@endsection
