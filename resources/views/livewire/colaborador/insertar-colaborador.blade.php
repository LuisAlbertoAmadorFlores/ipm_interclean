@extends('layouts.app')
@section('content')
    @livewire('colaborador.crear-colaborador', ['title' => 'Nuevo Colaborador', 'idUser' => auth()->user()->id]);
@endsection
