<div class="mx-2 d-flex col-12 " style="height: 93%">
    <div class="rounded text-light col-3 me-2" style="background: rgba(255, 255, 255, 0.308);height:100%">
        <div class="d-flex text-dark py-2 rounded-top" style="background: rgba(255, 255, 255, 0.437)">
            <label class="ms-2">Filtros</label>
        </div>
        <div class="px-3 pt-3 text-dark">
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
            <span class="bg-danger px-1 rounded text-light">Intervalo de Fechas</span>
            <div class="">
                <div class="d-flex flex-column">
                    <div class="mb-3 d-flex flex-column">
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
                            <label for="" class="input-group-text bg-dark border-0 text-light">Fecha
                                Final</label>
                            <input type="date" class="form-control" wire:model="fechafinal"
                                @if ($flatBloquedoSearch == true) disabled @endif>
                        </div>
                        @error('fechafinal')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" wire:click="rangeDate()"><i class="fa-solid fa-list"></i>Obtener
                        Lista</button>
                    <button class="btn btn-warning ms-2" wire:click="limpiardata()">Limpiar Busqueda</button>
                </div>
            </div>

        </div>
    </div>
    <div class=" rounded w-100 text-dark" style="background: rgba(255, 255, 255, 0.184)">
        <div class="d-flex py-2 rounded-top" style="background: rgba(255, 255, 255, 0.437)">
            <span class="col-1 text-center">ID</span>
            <span class="col-8">Nombre</span>
            <span>Opciones</span>
        </div>
        <div class="scrollbar rounded-bottom" style="height: 80vh;overflow-y: scroll">
            @isset($listaPersonal)
                @foreach ($listaPersonal as $persona)
                    <div class="text-capitalize bg-light py-2 border-buttom d-flex">
                        <span class="col-1 text-center">{{ $persona->idColaborador }}</span>
                        <span class="col-8">{{ $persona->Nombre }} {{ $persona->Apellido_Paterno }}
                            {{ $persona->Apellido_Materno }}
                        </span>
                        <span>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#{{ $persona->idColaborador }}">
                                Calcular
                            </button>
                            <div class="modal fade" id="{{ $persona->idColaborador }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                    role="document">
                                    <div class="modal-content degradado-modal">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-light" id="modalTitleId">
                                                Desgloce
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
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        </span>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
    <div class="mx-2 col-3 rounded" style="background: rgba(255, 255, 255, 0.184)">
        <div class="d-flex text-dark py-2 rounded-top" style="background: rgba(255, 255, 255, 0.437)">
            <span class="text-center ms-2">Carga de Nomina</span>
        </div>
        <div class="d-flex flex-column border rounded bg-light mx-2 my-2 px-2 py-2">
            <label class="bg-dark rounded text-light px-2" style="width: max-content">Paso <i
                    class="fa-solid fa-2"></i></label>
            <p class="text-justify">Aqui puedes generar un archivo excel con los datos de los colaboradores que en el
                paso 1 hayas
                seleccionado <b class="btn btn-warning btn-sm">Pasar
                    a Excel</b> ,bajo tu criterio en estar correctamente el pago correspondiente a las fechas
                seleccionadas.</p>
            @if ($flatBloquedoSearch == true && isset($listaPersonal))
                <a href="./nomina/{{ $idProyecto }}/{{ $region }}/{{ $lugartrabajo }}/{{ $tipoNomina }}/{{ $fechainicial }}/{{ $fechafinal }}"
                    class="btn btn-primary"><i class="fa-solid fa-download"></i> Descargar Excel</a>
            @endif

        </div>
        <div class="d-flex flex-column border rounded bg-light mx-2 my-2 px-2 py-2">
            <label class="bg-dark rounded text-light px-2" style="width: max-content">Paso <i
                    class="fa-solid fa-3"></i></label>
            <p class="text-justify">Aqui debes cargar el excel que generaste y descargaste en el paso 2, debes
                revisarlo agregarlo para enviarlo a Contabilidad.</p>
            @if ($flatBloquedoSearch == true)
                @livewire('contabilidad.nomina.save-excel')
            @endif
        </div>
        <div class="d-flex flex-column border rounded bg-light mx-2 my-2 px-2 py-2">
            <label class="bg-dark rounded text-light px-2" style="width: max-content">Nominas Pagadas</label>
            <p class="text-justify">Aqui podras consultar comprobantes de pago de cada nomina.</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pagosNomina">
                Ver Comprobantes
            </button>
            <div class="modal fade" id="pagosNomina" tabindex="-1" data-bs-backdrop="static"
                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                    <div class="modal-content degradado">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="modalTitleId">
                                Nominas
                            </h5>
                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-dark">
                            <div>
                                @foreach ($nominasPagadas as $item)
                                    @php
                                        $extraccion = explode('/', $item);
                                        $extracciondatos = explode('_', $extraccion[4]);
                                    @endphp
                                    <div class="d-flex flex-column">
                                        <span class="">Nomina: {{ $extracciondatos[1] }}</span>
                                        <span class="">Fecha Inicio: {{ $extracciondatos[2] }}</span>
                                        <span class="">Fecha Final: {{ $extracciondatos[4] }}</span>
                                        <a href="./download/{{ $extraccion[4] }}"
                                            class="btn btn-success mt-2">Descargar Comprobante</a>
                                        <hr class="text-light">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column border rounded bg-light mx-2 my-2 px-2 py-2">
            <label class="bg-dark rounded text-light px-2" style="width: max-content">Nominas Rechazadas</label>
            <p class="text-justify">Aqui podras consultar si existe el rechazo de nomina por parte de contabilidad para
                poder corregirlo.</p>
            <!-- Modal trigger button -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rechazoNomina">
                Ver Nominas
            </button>

            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="rechazoNomina" tabindex="-1" data-bs-backdrop="static"
                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content degradado">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                                Nominas Rechazadas
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-dark">
                                @foreach ($nominasRechazadas as $rechaz)
                                    @php
                                        $seleccion = explode('/', $rechaz);
                                        $extraccionExcel = explode('.', $seleccion[4]);
                                    @endphp
                                    @if ($extraccionExcel[1] == 'xlsx')
                                        @php
                                            $extraccion = explode('/', $rechaz);
                                            $extracciondatos = explode('_', $extraccion[4]);
                                        @endphp
                                        <div class="d-flex flex-column">
                                            <span class="">Nomina: {{ $extracciondatos[1] }}</span>
                                            <span class="">Fecha Inicio: {{ $extracciondatos[2] }}</span>
                                            <span class="">Fecha Final: {{ $extracciondatos[4] }}</span>
                                        </div>
                                        <div>
                                            @php
                                                echo $contenido = file_get_contents(
                                                    'storage/Nomina/Historial/Nomina_Rechazada/' .
                                                        $extraccionExcel[0] .
                                                        '.ipm',
                                                );
                                            @endphp
                                        </div>
                                        <hr class="text-light">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function sendIDColaborador(id) {
            Livewire.emit('buscarTarjetaColaborador', [{
                'idColaborador': id
            }]);
        }
    </script>
</div>
