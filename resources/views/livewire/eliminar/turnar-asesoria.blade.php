<div class="d-flex flex-row" style="height: 80vh">
    <div class="col-4 pe-3" style="border-right: solid 1.5px white">
        <div class="h5 pt-4 pb-2 col-lg-12">
            <p>
                ¿Deseas continuar la asesoria de
                <b class="text-capitalize">{{ $nombreCompleto }}</b> con el ID
                <b>{{ $idColaborador }}</b>, por turnado a
                Juridico?
            </p>
            <div class="d-flex flex-column mb-3">
                <label class="mb-2">Agregar una breve descripcion</label>
                @error('comentario')
                    <small class="error text-warning">{{ $message }}</small>
                @enderror
                <textarea name="" id="" rows="10" class="rounded textarea" wire:model="comentario"></textarea>
                <button class="btn btn-primary mt-3" wire:click="sendMessage()"><i class="fa-regular fa-comments"></i>
                    Adjuntar
                    Comentario</button>
            </div>
            @if ($flat == true && $comentario != '')
                <div class="h5">
                    Para confirmar la asesoria debes ingresar el
                    siguiente texto en el recuadro que se encuentra al final
                    de esta ventana.
                </div>
                <div class="text-light fw-bold h1 text-center py-4 rounded mt-3" style="background: rgb(0, 0, 0)">
                    {{ $codigo }}
                </div>
            @endif
        </div>
        @if ($flat == true && $comentario != '')
            <div class="d-flex justify-content-center">
                @livewire('eliminar.validacion', ['codigo' => $codigo, 'idColaborador' => $idColaborador, 'solicitud' => 'asesoria', 'idCoordinador' => Auth::user()->id])
            </div>
        @endif
    </div>

    <div class=" col-8 me-auto ms-2">
        <p class="historial_border">Asesoria Activa</p>
        @if (count($activa) > 0)
            <div class="scrollbar" style="overflow-y:scroll;">
                <div>
                    <b>Fecha:</b> @php
                        echo date('d/m/Y h:i:s', strtotime($activa[0]->created_at));
                    @endphp <br>
                    <b>Solicitud: </b>
                    <div class="charbrok">{{ $activa[0]->Comentario }}
                    </div>
                </div>
                <hr>
            </div>
        @endif

        <p class="historial_border">Historial de Asesorias</p>
        <div class="scrollbar" style="height: 90%;overflow-y:scroll;">
            @foreach ($historiaAsesorias as $asesoria)
                <div>
                    <b>Fecha:</b> @php
                        echo date('d/m/Y h:i:s', strtotime($asesoria->created_at));
                    @endphp <br>
                    <b>Solicitud: </b>
                    <div class="charbrok">{{ $asesoria->Comentario }}
                    </div>
                </div>
                <br>
                <div>
                    <b>Fecha:</b> @php
                        echo date('d/m/Y h:i:s', strtotime($asesoria->Fecha_Regresado));
                    @endphp <br>
                     <b>Personal Legal:</b> {{ $asesoria->name }}<br>
                    <b>Respuesta: </b>
                    <div class="charbrok">{{ $asesoria->Respuesta }}
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
