@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center p-3 scrollbar" style="height: 94vh">
        <div class="rounded d-flex justify-content-center aling-items-center col-lg-11">
            <div class="rounded mb-3 col-lg-12 degradado">
                <div class="py-2 ps-2 rounded-top text-light encabezados">Control de Incidencias</div>
                <div class="row mx-0 degradado">
                    <div class="col-lg-7">
                        <div>
                            @livewire('colaborador.inputsearch', ['id' => '','proyecto'=>Auth::user()->proyecto])
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
