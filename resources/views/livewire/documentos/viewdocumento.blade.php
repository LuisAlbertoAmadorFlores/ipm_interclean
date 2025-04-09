@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center p-3 scrollbar entradaDerecha" style="height: 94vh">
    <div class="rounded d-flex justify-content-center aling-items-center col-lg-11 flex-column">
        <div class="rounded mb-3 col-lg-12 degradado">
            <div class="py-2 ps-2 rounded-top encabezados">Carga de Documentos</div>
            <div class="row mx-0 pt-3">
                @livewire('documentos.uploadfile');
            </div>
        </div>
    </div>
</div>
@endsection
