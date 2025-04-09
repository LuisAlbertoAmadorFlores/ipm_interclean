@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center p-3 scrollbar" style="height: 94vh">
        <div class="rounded d-flex justify-content-center aling-items-e col-lg-11">
            <div class="rounded mb-3 col-lg-12"
                style="background: linear-gradient(100deg, rgba(32, 96, 164, 0.767), rgba(0, 0, 0, 0.575));">
                <div class="h3 text-light ps-3 pt-3">Gestionar Cuentas</div>
                <div class="row mx-3">
                    @livewire('sistemas.all-cuentas')
                </div>
            </div>
        </div>
    </div>
@endsection