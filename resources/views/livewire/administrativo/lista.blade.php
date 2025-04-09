@extends('layouts.app')
@section('content')
    {{-- @if (Auth::user()->rol != 'Sistemas') --}}
        {{-- <div class="d-flex justify-content-center align-items-center p-3 scrollbar entradaDerecha" style="height: 94vh">
            @include('mantenimiento');
        </div> --}}
    {{-- @else --}}
        <div class="d-flex justify-content-center align-items-center p-3 scrollbar entradaDerecha" style="height: 94vh">
            <div class="rounded mb-3 col-lg-11 degradado" style="height:50vh">
                <div class="py-2 ps-2 rounded-top h5 encabezados text-light">Lista de Asistencia</div>
                @livewire('administrativo.crear-lista', ['proyecto' => Auth::user()->proyecto, 'region' => Auth::user()->Region])
            </div>
        </div>
    {{-- @endif --}}
@endsection
