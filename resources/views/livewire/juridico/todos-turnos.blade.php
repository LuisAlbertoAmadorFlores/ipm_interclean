<div>
    {{-- <div class="col-lg-5 my-3 mx-auto">
        @livewire('components.inputsearch')
    </div> --}}
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estatus</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @isset($todos)
                    @if (count($todos) > 0)
                        @foreach ($todos as $persona)
                            <tr>
                                <td scope="row">{{ $persona->idColaborador }}</td>
                                <td class="text-capitalize">{{ $persona->Nombre }} {{ $persona->Apellido_Paterno }}
                                    {{ $persona->Apellido_Materno }}</td>
                                <td>{{ $persona->Status_baja }} </td>
                                <td><button class="btn btn-success"
                                        wire:click="tomarColaborador({{ $persona->idColaborador }},{{ Auth::user()->id }})"><i
                                            class="fa-solid fa-link"></i> Tomar
                                        Colaborador</button></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">Sin colaboradores encontrados</td>
                        </tr>
                    @endif
                @endisset

            </tbody>
        </table>{{ $todos->links() }}
    </div>
</div>
