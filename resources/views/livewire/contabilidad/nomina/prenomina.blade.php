@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-start p-3 scrollbar entradaDerech" style="height: 94vh">
        <div class="rounded d-flex justify-content-center aling-items-center col-lg-11">
            <div class="rounded mb-3 col-lg-12 degradado" style="height: 90vh">
                <div class="py-2 ps-2 rounded-top h5 degradado"">Pre-Nomina
                </div>
                @livewire('contabilidad.nomina.lista', ['proyecto' => Auth::user()->proyecto, 'region' => Auth::user()->Region]);
            </div>
        </div>
    </div>
@endsection
