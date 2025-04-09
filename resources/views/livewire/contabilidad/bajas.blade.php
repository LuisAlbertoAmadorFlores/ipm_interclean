@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-start p-3 scrollbar" style="height: 94vh">
        <div class="rounded d-flex justify-content-center aling-items-center col-lg-11">
            <div class="rounded mb-3 col-lg-12 degradado" style="height: 90vh">
                <div class="py-2 ps-2 rounded-top h5 text-dark"
                    style="background:rgba(255, 255, 255, 0.24);backdrop-filter:blur(14px);">Bajas Turnadas IMSS</div>
                <div class="row mx-2 mb-2"
                    style="height: 45vh;background: rgba(255, 255, 255, 0.158);">
                    @livewire('contabilidad.misbajasimss', ['id' => Auth::user()->id])
                </div>
                <div class="row mx-2 mb-2 scrollbar" style="height: 45vh;background: rgba(255, 255, 255, 0.158);">
                    @livewire('contabilidad.bajasimss');
                </div>
            </div>
        </div>
    </div>
@endsection
