@extends('layouts.app')
@section('content')
    <div class="scrollbar w-100 d-flex justify-content-center align-items-center degradado" style="height: 94.5vh;">
        <div class="row d-lg-flex col-11 mx-auto  rounded degradado">
            <div class="py-2 ps-2 rounded-top h5 text-light encabezados">Atencion al Colaborador
            </div>
            <div class="d-flex">
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
                <div class="pt-2" style="height:80vh;width: 100%">
                    <div class="rounded-end pt-3">
                        <div class="mx-0 rounded" style="height:100%;background:#ffffff2c">
                            @livewire('contactcenter.atc.tarjeta', ['idColaborador' => ''])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function sendDocument(colaborador) {
            Livewire.emit('sendDocumento' => [{
                'idColaborador': colaborador
            }]);
        }
    </script>
@endsection
