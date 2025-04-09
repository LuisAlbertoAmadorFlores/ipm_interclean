@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center p-3 scrollbar" style="height: 94vh">
        <div class="rounded d-flex justify-content-center aling-items-center col-lg-11">
            <div class="rounded mb-3 col-lg-12"
                style="background: linear-gradient(100deg, rgba(32, 96, 164, 0.767), rgba(0, 0, 0, 0.575));">
                <div class="py-2 ps-2 rounded-top h5 text-white"
                    style="background:rgba(255, 255, 255, 0.24);backdrop-filter:blur(14px)">Control de Incidencias</div>
                <div class="row mx-0">
                    <div class="col-lg-7">
                        <div>
                            @livewire('cedis.search', ['id' => ''])
                        </div>
                        <div class="mb-2 pt-0 table-responsive col-lg-12 rounded-bottom scrollbar"
                            style="height: 35vh;background:#ffffff2c;backdrop-filter:blur(14px)">
                            @livewire('colaborador.tablacolaboradores', ['idColaborador' => ''])
                        </div>
                    </div>
                    <div class="col-lg-5 p-0 pt-2">
                        @livewire('incidencia.tarjetaincidencia', ['byID' => auth()->user()->id, 'Nombre' => auth()->user()->name])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
