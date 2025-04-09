<div>
    <div class="bg-light">
        <div class="col-12 w-100 d-flex rounded fw-bold">
            <span class="col-1  py-1 text-center">
                ID
            </span>
            <span class="col-7  ps-1 py-1">Nombre</span>
            <span class="col-2  ps-1  py-1">Estatus</span>
            <span class="col-2  ps-1  py-1"></span>
        </div>
        <div class="scrollbar rounded-bottom" style="height:33vh;overflow: scroll">
            @foreach ($todos as $persona)
                <div class="text-capitalize col-12 w-100 d-flex align-items-center border-bottom py-1 tablehover">
                    <span class="col-1 text-center">{{ $persona->idColaborador }}</span>
                    <span class="col-7 ">{{ $persona->Nombre }} {{ $persona->Apellido_Paterno }}
                        {{ $persona->Apellido_Materno }}</span>
                    <span class="col-2 ">
                        {{ $persona->Status_Asesoria }}
                    </span>
                    <span><button class="btn btn-success"
                            wire:click="tomarColaborador({{ $persona->idColaborador }},{{ Auth::user()->id }})"><i
                                class="fa-solid fa-link"></i> Tomar
                            Colaborador</button></span>
                </div>
            @endforeach
        </div>
    </div>
</div>
