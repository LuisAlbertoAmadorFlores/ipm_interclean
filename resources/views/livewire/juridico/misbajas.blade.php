@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 94.5vh">
        <div class="col-lg-10 mx-auto degradado">
            <div class="py-2 w-100 text-light ps-2 h5 encabezados">
                Mis bajas
            </div>
            <div class="">
                @livewire('juridico.mis-turnados', ['id' => Auth::user()->id])
            </div>
        </div>
    </div>
    <script src="{{ asset('js/funcionalclass.js') }}"></script>
@endsection