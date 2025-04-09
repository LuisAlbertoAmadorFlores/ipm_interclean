@extends('layouts.app')
@section('content')
    <div class="d-lg-flex  justify-content-center align-items-start p-3 scrollbar entradaDerecha" style="height: 94vh">
        <div class="rounded d-flex  justify-content-center aling-items-center col-lg-11">
            <div class="rounded mb-3 col-12 degradado d-flex flex-column" style="height: 90vh">
                <div class="py-2 ps-2 rounded-top h5 text-dark" style="background:rgba(255, 255, 255, 0.24);">Asesorias Turnadas
                </div>
                <div>
                    <div class="mx-2 mb-2 rounded mb-4 scrollbar" style="height: 45%;background: rgba(255, 255, 255, 0.158);">
                        <div class="h5 text-dark py-2 ps-2">Mis Asesorias Pendientes</div>
                        @livewire('juridico.asesorias.mis-asesoria', ['id' => Auth::user()->id])
                    </div>
                    <div class="mx-2 rounded-top mt-4" style="height: 45%;background: rgba(255, 255, 255, 0.158);">
                        <div class="h5 text-dark py-2 ps-2">Todas las Asesorias</div>
                        @livewire('juridico.asesorias.todas-asesorias')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection