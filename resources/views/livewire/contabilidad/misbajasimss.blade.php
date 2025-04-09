<div>
    <div class="h5 mt-3">Mis Bajas Pendientes</div>
    <div>
        <table class="table table-hover">
            <tr>
                <th>
                    ID
                </th>
                <th>Información</th>
                {{-- <th>Estatus</th> --}}
                <th></th>
                <th style="background: rgba(255, 255, 255, 0.89)">Opciones</th>
            </tr>
            @isset($misturnos)
                @foreach ($misturnos as $persona)
                    <tr class="text-capitalize">
                        <td>{{ $persona->idColaborador }}</td>
                        <td><b class="">Nombre:</b> {{ $persona->Nombre }} {{ $persona->Apellido_Paterno }}
                            {{ $persona->Apellido_Materno }}
                            <br><b>N° IMSS:</b> {{ $persona->NSS }}
                        </td>
                        
                        {{-- <td>{{ $persona->Status_baja }}</td> --}}
                        <td></td>
                        <td style="background: rgba(255, 255, 255, 0.900)">
                            <button class="btn btn-primary" wire:click="liberar({{ $persona->idColaborador }})">
                                <i class="fa-solid fa-link-slash"></i> Liberar</button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalId">
                                <i class="fa-solid fa-dollar-sign"></i> Finiquito
                            </button>
                            <a href="./fichatecnica/{{ $persona->idColaborador }}"
                                target="_blank"class="btn btn-dark"><i class="fa-regular fa-address-card"></i>
                                Expediente</a>
                            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content text-light"
                                        style="background-color:rgba(32, 96, 164, 0.808);backdrop-filter:blur(14px);">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Finiquito
                                            </h5>
                                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                Salario: ${{ $persona->Salario }}
                                                <br>
                                                Finiquito: ${{ $persona->Finiquito }}
                                            </div>
                                            <div class="input-group">
                                                <label for="" class="">Finiquito autorizado</label>
                                            </div>
                                            <div>
                                                @livewire('contabilidad.finiquito', ['idBajas' => $persona->idBajas])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#imss">
                                <i class="fa-solid fa-hands-holding-circle"></i> IMSS
                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="imss" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                    role="document">
                                    <div class="modal-content text-light" style="background-color:rgba(32, 96, 164, 0.808);backdrop-filter:blur(14px);">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Adjuntar Evidencia de Baja
                                            </h5>
                                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" 
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           @livewire('contabilidad.recibobaja')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endisset
        </table>
    </div>
</div>
