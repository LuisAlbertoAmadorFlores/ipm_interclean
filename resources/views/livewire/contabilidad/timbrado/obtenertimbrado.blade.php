@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center p-3 scrollbar" style="height: 94vh">
        <div class="rounded d-flex justify-content-center flex-wrap aling-items-center col-lg-11">
            <div class="rounded mb-3  degradado mx-4">
                <div class="py-2 ps-2 rounded-top h5 text-white"
                    style="background:rgba(255, 255, 255, 0.24);backdrop-filter:blur(14px)">Entregables</div>
                <div class="mx-0 px-4 py-2">
                    @livewire('contabilidad.timbrado.proyectos')
                </div>
            </div>
        </div>
    </div>
@endsection
