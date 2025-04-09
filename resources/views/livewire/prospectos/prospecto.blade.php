@extends('layouts.app')
@section('content')
    @livewire('prospectos.nuevo-prospecto',['idReclutador'=>auth()->user()->id])
@endsection
