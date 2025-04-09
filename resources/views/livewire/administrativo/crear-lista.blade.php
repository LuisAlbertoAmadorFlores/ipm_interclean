<div class="mx-3 mt-4 rounded-bottom d-flex" style="height: 83%">
    <div class="rounded w-100" style="background: rgba(255, 255, 255, 0.308);">
        <div class="text-dark ps-2 py-2">Personal Activo</div>
        <div class=" rounded-bottom scrollbar" style="height: 94%;overflow:scroll">
            @foreach ($regiones as $region)
                @foreach ($mysRegio as $reg)
                    @if ($reg === $region->Region)
                        <div class="text-dark ps-3 py-2 fw-bold encabezado-region">
                            Region: {{ $region->Region }} </div>
                        @foreach ($cedis as $item)
                            @if ($region->Region === $item->Region)
                                <div class="text-light ps-3 py-2" style="background:rgb(0, 0, 0)">
                                    {{ $item->Nombre }} / {{ $item->Estado }}</div>
                                @foreach ($listaPersonal as $persona)
                                    @if ($item->id == $persona['Zona'])
                                        @if ($persona['Status'] != 'OK')
                                            <div class="d-flex bg-light py-2 border-bottom listaAsistencia ">
                                                <span class="col-1 text-center">{{ $persona['idColaborador'] }}</span>
                                                <span class="col-7 text-capitalize">
                                                    {{ $persona['Nombre'] }} {{ $persona['Apellido_Paterno'] }}
                                                    {{ $persona['Apellido_Materno'] }}
                                                </span>
                                                <span class="listaPersonal">
                                                    <button type="submit" class=""
                                                        wire:click="pasarLista({{ $persona['idColaborador'] }})">
                                                        <span>Pasar Lista</span></button>
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="d-flex  col-lg-5 rounded text-light ms-2 entradaDerecha">
        <div class="col-lg-6 col-md-6 entradaDerecha">
            <div class="tarjetalogo rounded mx-3">
                @if ($foto)
                    @if ($foto == 'img/tarjeta.png')
                        <img class="rounded silueta" src="{{ $foto }}" alt="Foto Colaborador" width="100%"
                            height="394px">
                    @else
                        <img class="rounded  " src="{{ $foto }}" alt="Foto Colaborador" width="100%"
                            height="394px">
                    @endif
                @else
                    <img class="rounded silueta" src="{{ asset('img/tarjeta.png') }}" alt="Foto Colaborador" width="100%"
                    height="394px">
                @endif
            </div>
        </div>
        <div class="col-lg-6  entradaDerecha">
            <div class="d-flex flex-column">
                <span>ID: <b>{{ $idColaborador }}</b></span>
                <span class="text-capitalize">Nombre: <b>{{ $Nombre }}</b></span>
                @if ($sabado == 'true')
                    <div>
                        <p>Fecha: <b> <?php $hoy = date('d-m-Y', strtotime($fechahoy . '-1day'));
                        echo $hoy; ?></b></p>
                    </div>
                @else
                    <div>
                        <p>Fecha: <b> <?php $hoy = date('d-m-Y', strtotime($fechahoy));
                        echo $hoy; ?></b></p>
                    </div>
                @endif
            </div>
            {{-- @if (date('l') == 'Monday')
                <div class="rounded d-flex mb-3 py-2">
                    <input class="me-1" style="width: 20px" type="checkbox" value="" id="flexCheckDefault"
                        wire:model="sabado">
                    <label class="fw-bold ">
                        Sabado
                    </label>
                </div>
            @endif --}}
            <hr>
            <div class="mb-3">
                <label for="" class="form-label">Tomar dia como:</label>
                <select class="form-select form-select" name="" id="" wire:model="asistencia">
                    <option selected>Selecciona una opción</option>
                    <option value="laborado">Laborado</option>
                    <option value="faltaJustificada">Falta justificada</option>
                    <option value="faltaInjustificada">Falta injustificada</option>
                    <option value="descanso">Descanso</option>
                    <option value="festivo">Festivo</option>
                </select>
            </div>
            <div class="d-flex justify-content-around">
                @switch($asistencia)
                    @case('laborado')
                        <div>
                            <label for="">Hora de Entrada</label>
                            <input type="time" name="" id="" class="mb-2 form-control" wire:model="Entrada">
                            @error('Entrada')
                                <small class="text-light">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="">Hora de Salida</label>
                            <input type="time" name="" id="" class="mb-2 form-control" wire:model="Salida">
                            @error('Salida')
                                <small class="text-light">{{ $message }}</small>
                            @enderror
                        </div>
                    @break

                    @case('faltaJustificada')
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-column">
                                <input type="file" class="mb-2 form-control" accept="image/*" wire:model="documento">
                                @error('documento')
                                    <small class="text-light">{{ $message }}</small>
                                @enderror
                            </div>
                            @if ($documento)
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#previewDoc">
                                    <i class="fa-solid fa-expand"></i> Vista Previa
                                </button>


                                <div class="modal fade" id="previewDoc" tabindex="-1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                        role="document">
                                        <div class="modal-content degradado">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="modalTitleId">
                                                    Vista Previa
                                                </h5>
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $documento->temporaryUrl() }}" width="100%" height="600px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @break

                    @default
                @endswitch

            </div>
            <hr>

            <div class="d-flex justify-content-end mt-3 ">
                <button class="mb-3 w-100 btn btn-success"
                    wire:click="autorizar({{ $idColaborador }},{{ Auth::user()->id }})"><i
                        class="fa-regular fa-floppy-disk"></i> Guardar</button>
            </div>
            <div wire:loading>
                <span>Cargando archivo,por favor espera...</span>
            </div>

        </div>
    </div>
    {{-- @endforeach --}}
    {{-- @foreach ($proyectos as $proyecto)
                <div class="text-dark ps-3 py-2 fw-bold" style="background:rgb(236, 157, 9)">
                    Proyecto: {{ $proyecto->Nombre_Largo_Proyecto }}</div>
                @foreach ($regiones as $region)
                    <div class="text-light ps-3 py-2 fw-bold" style="background:rgb(18, 35, 185)">
                        Region: {{ $region->Region }} </div>
                    @foreach ($listaPersonal as $persona)
                        @if ($region->Region == $persona['Region'])
                            @foreach ($cedis as $cedi)
                                <div class="text-light ps-3 py-2 fw-bold" style="background:rgb(48, 64, 206)">
                                    CEDIS: {{ $cedi->Nombre }} </div>
                                @if ($cedi->id == $persona['Zona'])
                                    @if ($persona['Status'] != 'OK')
                                        <div class="d-flex bg-light py-2 border-bottom listaAsistencia ">
                                            <span class="col-1 text-center">{{ $persona['idColaborador'] }}</span>
                                            <span class="col-7 text-capitalize">
                                                {{ $persona['Nombre'] }} {{ $persona['Apellido_Paterno'] }}
                                                {{ $persona['Apellido_Materno'] }} {{ $persona['Zona'] }}
                                            </span>
                                            <span class="listaPersonal">
                                                <button type="submit" class=""
                                                    wire:click="pasarLista({{ $persona['idColaborador'] }})">
                                                    <span>Pasar Lista</span></button>
                                            </span>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endforeach
            @endforeach --}}
</div>


{{-- Respaldo Code --}}
{{-- <div class="mx-3 mt-4 rounded-bottom d-flex" style="height: 83%">
    <div class="rounded w-100" style="background: rgba(255, 255, 255, 0.308);">
        <div class="ps-2 py-2">Personal Activo</div>
        <div class=" rounded-bottom scrollbar" style="height: 91%;overflow:scroll">
            @foreach ($proyectos as $proyecto)
                @foreach ($showRegion as $item)
                    @if ($item === $proyecto->Region)
                        <div class="bg-dark text-light ps-3 py-2">{{ $proyecto->Region }} / {{ $proyecto->Nombre }}</div>
                        @foreach ($listaPersonal as $persona)
                            @if ($proyecto->id == $persona->Zona)
                                <div class="d-flex bg-light py-2 border-bottom listaAsistencia ">
                                    <span class="col-1 text-center">{{ $persona->idColaborador }}</span>
                                    <span class="col-7 text-capitalize">
                                        {{ $persona->Nombre }} {{ $persona->Apellido_Paterno }}
                                        {{ $persona->Apellido_Materno }}
                                    </span>
                                    <span class="listaPersonal">
                                        <button type="submit" class=""
                                            wire:click="pasarLista({{ $persona->idColaborador }})">
                                            <span>Pasar Lista</span></button>
                                    </span>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="d-flex  col-lg-5 rounded text-light ms-2">
        <div class="col-lg-6 col-md-6">
            <div class="px-3">
                @if ($foto)
                    <img class="rounded imagengrande" src="{{ $foto }}" alt="Foto Colaborador" width="100%"
                        height="394px"
                        style="box-shadow:rgba(255, 255, 255, 0.507) 1px 1px 5px;backdrop-filter: blur(14px);">
                @else
                    <img class="rounded imagengrande" src="{{ asset('img/tarjeta.png') }}" alt="Foto Colaborador CRS"
                        width="100%" height="394px"
                        style="box-shadow:rgba(255, 255, 255, 0.507) 1px 1px 5px;backdrop-filter: blur(14px);">
                @endif
            </div>
        </div>



        <div class="col-lg-6">
            <div>
                <p>ID: <b>{{ $idColaborador }}</b></p>
            </div>
            <div>
                <p class="text-capitalize">Nombre: <b>{{ $Nombre }}</b></p>
                @error('Nombre')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div>
                @if ($sabado == 'true')
                    <div>
                        <p>Fecha: <b> <?php $hoy = date('d-m-Y', strtotime($fechainicial . '- 2 days'));
                        echo $hoy; ?></b></p>
                    </div>
                @else
                    <div>
                        
                        <p>Fecha: <b> <?php $hoy = date('d-m-Y', strtotime($fechainicial . '- 1 days'));
                        echo $hoy; ?></b></p>
                    </div>
                @endif

            </div>

            @if (date('l') == 'Monday')
                <div class="rounded d-flex mb-3 py-2">
                    <input class="me-1" style="width: 20px" type="checkbox" value="" id="flexCheckDefault"
                        wire:model="sabado">
                    <label class="fw-bold ">
                        Sabado
                    </label>
                </div>
            @endif

            <div class="rounded d-flex justify-content-center mb-3 py-2" style="background: white">
                <input class="me-1" style="width: 20px" type="checkbox" value="" id="flexCheckDefault"
                    wire:model="descanzo">
                <label class="fw-bold text-dark">
                    Dia de descanso
                </label>
            </div>

            <div class="d-flex justify-content-around">
                <div>
                    <label for="">Hora de Entrada</label>
                    <input type="time" name="" id="" class="mb-2 form-control" wire:model="Entrada"
                        @if ($descanzo == true) disabled @endif>
                    @error('Entrada')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="">Hora de Salida</label>
                    <input type="time" name="" id="" class="mb-2 form-control" wire:model="Salida"
                        @if ($descanzo == true) disabled @endif>
                    @error('Salida')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3 autorizarlista">
                <button class="mb-3 w-100" wire:click="autorizar({{ $idColaborador }},{{ Auth::user()->id }})"><i
                        class="fa-regular fa-floppy-disk"></i> Guardar</button>
            </div>
        </div>
    </div>
</div> --}}
