@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center p-3 scrollbar" style="height: 94vh">
        <div class="rounded d-flex justify-content-center aling-items-center col-lg-11 flex-column">
            <div class="rounded mb-3 col-lg-12 degradado">
                <div class="py-2 ps-2 rounded-top h5" style="background:rgba(255, 255, 255, 0.24);backdrop-filter:blur(14px)">
                    Administracion de CEDIS</div>
                <div class="d-flex flex-column">
                        <div class="w-50 mx-auto d-flex justify-content-center align-items-center ">
                            @livewire('cedis.add-cedis')
                            @livewire('cedis.listado')
                        </div>
                        <div class="mb-2">
                            @livewire('cedis.todos-cedis')
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
