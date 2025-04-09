<div class="px-2 d-flex col-12 " style="height: 93%">
    <div class="rounded  col-3 " style="background: rgba(255, 255, 255, 0.308);height:100%">
        <div class="w-100 degradado py-2 ps-2 rounded-top">Filtros</div>
        <div class="px-3 pt-3">
            <label class="bg-dark rounded text-light px-2 mb-2" style="width: max-content">Paso <i
                    class="fa-solid fa-1"></i></label>
            <br>
            <span class="">Proyecto</span>
            <select name="" id="" class="form-control mb-3" wire:model="idProyecto"
                @if ($flatBloquedoSearch == true) disabled @endif>
                <option value="" selected>Selecciona un proyecto</option>
                @foreach ($proyectos as $proyecto)
                    <option value="{{ $proyecto->idProyecto }}">{{ $proyecto->Nombre_Largo_Proyecto }}</option>
                @endforeach
            </select>
            <hr class="">
            <label class="">Zona</label>
            <select name="" id="" class="form-control mb-3" wire:model="region"
                @if (!$idProyecto) disabled @endif @if ($flatBloquedoSearch == true) disabled @endif>
                <option value="" selected>Selecciona una zona</option>
                @isset($zonas)
                    @foreach ($regiones as $zona)
                        @switch($zona)
                            @case('Valle Mexico')
                                <option value="{{ $zona }}">Valle de Mexico</option>
                            @break

                            @case('Occidente')
                                <option value="{{ $zona }}">Occidente</option>
                            @break

                            @case('Norte')
                                <option value="{{ $zona }}">Norte</option>
                            @break

                            @case('Sur')
                                <option value="{{ $zona }}">Sur</option>
                            @break

                            @case('Noreste')
                                <option value="{{ $zona }}">Noreste</option>
                            @break

                            @case('Centro')
                                <option value="{{ $zona }}">Centro</option>
                            @break
                        @endswitch
                    @endforeach
                @endisset
            </select>
            <hr>
            <label class="">CEDIS</label>
            <div class="">
                <select name="" id="" class="form-control mb-3" wire:model="lugartrabajo"
                    @if ($flatBloquedoSearch == true) disabled @endif>
                    <option value="">Selecciona una opción</option>
                    @isset($cedis)
                        @foreach ($cedis as $cedi)
                            <option value="{{ $cedi->id }}">{{ $cedi->Nombre }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <hr>
            <span class="">Tipo de Nomina</span>
            <select name="" id="" class="form-control mb-3" wire:model="tipoNomina"
                @if ($flatBloquedoSearch == true) disabled @endif>
                <option value="">Selecciona una opción</option>
                <option value="Semanal" selected>Semanal</option>
                <option value="Quincenal">Quincenal</option>
            </select>
            <hr>
            <span class="">Intervalo de Fechas</span>
            <div class="">
                <div class="mb-3  d-flex flex-column">
                    <div class="input-group">
                        <label class="input-group-text bg-dark border-0 text-light">Fecha Inicial</label>
                        <input type="date" class="form-control" wire:model="fechainicial"
                            @if ($flatBloquedoSearch == true) disabled @endif>
                    </div>
                    @error('fechainicial')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class=" mb-3 input-group">
                    <div class="input-group">
                        <label for="" class="input-group-text bg-dark border-0 text-light">Fecha Final</label>
                        <input type="date" class="form-control" wire:model="fechafinal"
                            @if ($flatBloquedoSearch == true) disabled @endif>
                    </div>
                    @error('fechafinal')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" wire:click="rangeDate()"
                        @if ($flatBloquedoSearch == true) disabled @endif><i class="fa-solid fa-list"></i>Obtener
                        Lista</button>
                    <button class="btn btn-warning ms-2" wire:click="limpiardata()">Limpiar Busqueda</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-3 rounded w-100" style="background: rgba(255, 255, 255, 0.184)">
        <div class="d-flex py-2 rounded-top degradado">
            <span class="col-1 text-center">ID</span>
            <span class="col-8">Nombre</span>
            <span>Opciones</span>
        </div>
        <div class="">
            @isset($listaPersonal)
                @foreach ($listaPersonal as $persona)
                    <div class="text-capitalize bg-light py-2 border-buttom d-flex">
                        <span class="col-1 text-center">{{ $persona->idColaborador }}</span>
                        <span class="col-6">{{ $persona->Nombre }} {{ $persona->Apellido_Paterno }}
                            {{ $persona->Apellido_Materno }}
                        </span>
                        <span>
                            <button type="button" class="btn btn-outline-warning text-dark" data-bs-toggle="modal"
                                data-bs-target="#{{ $persona->idColaborador }}">
                                <i class="fa-solid fa-calculator"></i> Calcular
                            </button>

                            <div class="modal fade" id="{{ $persona->idColaborador }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                    role="document">
                                    <div class="modal-content degradado">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-light" id="modalTitleId">
                                                Calculo Nomina
                                            </h5>
                                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @livewire('contabilidad.nomina.persona', ['idColaborador' => $persona->idColaborador, 'fechaInicial' => $fechainicial, 'fechafinal' => $fechafinal])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                        
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
    <div class="col-3">
        @livewire('contabilidad.nomina.show-excel')
    </div>
    <script>
        function sendIDColaborador(id) {
            Livewire.emit('buscarTarjetaColaborador', [{
                'idColaborador': id
            }]);
        }
    </script>
</div>
