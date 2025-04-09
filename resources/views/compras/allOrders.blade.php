@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-start p-3 scrollbar" style="height: 94vh">
        <div class="rounded d-flex justify-content-center aling-items-center col-lg-11">
            <div class="rounded mb-3 col-lg-12 degradado" style="height: 90vh">
                <div class="py-2 ps-2 rounded-top h5 encabezados text-light">Orden de Compra
                </div>
                <div class="mb-3 text-light barras-title m-2 rounded">
                    {{-- <label class="ps-2 h5 py-2 barras-title w-100">Mis ordenes de compra</label> --}}
                    <form action="{{ route('newOrder') }}" method="get" class="ps-2">
                        @csrf
                        <input type="text" value="{{ $codigo }}" name="codigo" hidden>
                        <button class="btn btn-warning mt-2"><i class="fa-solid fa-plus"></i> Nueva Compra</button>
                    </form>
                    <div class="mt-3 bg-light">
                        <table class="table">
                            <tr>
                                <th># Solicitud</th>
                                <th>Justificacion</th>
                                <th>Total</th>
                                <th>Estatus</th>
                                <th>Adquisicion</th>
                                <th>Opciones</th>
                            </tr>
                            @foreach ($misordenes as $orden)
                                @if ($orden->Status != 'Cancelado')
                                    <tr>
                                        <td>{{ $orden->Codigo_Asociativo }}</td>
                                        <td>{{ $orden->Comentario }}</td>
                                        <td>@php
                                            echo "$" . number_format(intval($orden->Total_Gasto), 2);
                                        @endphp</td>
                                        <td>{{ $orden->Status }}<br>
                                            @switch($orden->prioridad)
                                                @case('Inmediata')
                                                @break

                                                @case('Alta')
                                                    <span class="bg-danger rounded px-1 text-light">Prioridad:
                                                        {{ $orden->prioridad }}</span>
                                                @break

                                                @case('Baja')
                                                    <span class="bg-danger rounded px-1 text-light">Prioridad:
                                                        {{ $orden->prioridad }}</span>
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td>
                                            @php
                                                if ($orden->Fecha_Adquisicion != null) {
                                                    echo date('d-m-Y', strtotime($orden->Fecha_Adquisicion));
                                                }

                                            @endphp</td>
                                        <td>
                                            <a href="./getMyOrder/{{ $orden->Codigo_Asociativo }}"
                                                class="btn btn-primary btn-sm">
                                                Detalles
                                            </a>

                                            @if ($orden->Status == 'Activo')
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#cancelarOrden{{ $orden->idcompras }}">
                                                    Cancelar
                                                </button>
                                                <div class="modal fade" id="cancelarOrden{{ $orden->idcompras }}"
                                                    tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                                                    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-top modal-sm"
                                                        role="document">
                                                        <div class="modal-content degradado text-light">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTitleId">
                                                                    Confirmacion </h5>
                                                                <button type="button" class="btn-close bg-light"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">Deseas cancelar la orden de compra con
                                                                el ID
                                                                <b>{{ $orden->Codigo_Asociativo }}</b>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('deleteOrder') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="text" value="{{ $orden->idcompras }}"
                                                                        name="id" hidden><button type="submit"
                                                                        class="btn btn-primary">Si</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>{{ $misordenes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
