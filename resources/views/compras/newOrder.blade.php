@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-start p-3 scrollbar" style="height: 94vh">
        <div class="rounded d-flex justify-content-center aling-items-center col-lg-11">
            <div class="rounded mb-3 col-lg-12 degradado" style="height: 90vh">
                <div class="py-2 ps-2 rounded-top h5 text-light encabezados">Agregar Items
                </div>
                <div class="mb-2 mt-3">
                    <a href="{{ route('viewallOrder') }}"
                        class="ps-3 h5 link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><i
                            class="fa-solid fa-arrow-left"></i> Volver</a>
                </div>
                <div class="mb-3 d-flex text-light ">
                    <div class="w-100 barras-title rounded mx-2">
                        <fieldset>
                            {{-- <p class="h5 py-2 barras-title rounded-top ps-2">Cotización</p> --}}
                            <button type="button" class="btn btn-warning ms-2 mt-2" data-bs-toggle="modal"
                                data-bs-target="#modalId">
                                <i class="fa-solid fa-plus"></i> Agregar un item
                            </button>
                            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                    role="document">
                                    <div class="modal-content degradado-modal">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Detalles de Producto
                                            </h5>
                                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @livewire('compras.item-compra', ['codigo' => $codigo])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 mx-2">
                                @livewire('compras.view-items-compra', ['codigo' => $codigo])
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
