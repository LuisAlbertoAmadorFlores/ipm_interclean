@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 94.5vh">
        <div class="col-11 mx-auto degradado">
            <div class="py-2 w-100 text-light ps-2 h5 encabezados rounded-top">
                Todas las bajas
            </div>
            <div class=" ">
                @livewire('juridico.todos-turnos')
            </div>
        </div>
    </div>
@endsection
