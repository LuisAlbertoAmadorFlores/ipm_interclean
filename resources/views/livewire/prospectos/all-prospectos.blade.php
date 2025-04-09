<div class="mx-auto mt-5 col-lg-11 rounded degradado">
    <div class="rounded">
        <div class="py-2 ps-2 rounded-top h5 encabezados">Consultar Prospectos</div>
        <div class="rounded px-3">
            <div>
                @livewire('colaborador.inputsearch', ['id' => '', 'proyecto' => ''])
            </div>
        </div>
        <div class=" table-responsive px-3">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr class="fs-6">
                        <th class="text-dark" style="background: rgba(255, 255, 255, 0.521);">ID</th>
                        <th class="text-dark" style="background: rgba(255, 255, 255, 0.521);">Nombre</th>
                        <th class="text-dark" style="background: rgba(255, 255, 255, 0.521);">Edad</th>
                        <th class="text-dark" style="background: rgba(255, 255, 255, 0.521);">Dirección</th>
                        <th class="text-dark" style="background: rgba(255, 255, 255, 0.521);">
                            Municipio
                        </th>
                        <th class="text-dark" style="background: rgba(255, 255, 255, 0.521);">Estado</th>
                        <th class="text-dark" style="background: rgba(255, 255, 255, 0.521);">Codigo Postal</th>
                        <th class="text-dark" style="background: rgba(255, 255, 255, 0.521);">Telefono</th>
                        <th class="text-dark" style="background: rgba(255, 255, 255, 0.521);">Correo Electronico</th>
                        <th class="text-dark" style="background: rgba(255, 255, 255, 0.521);">Registrado por</th>
                        <th class="text-dark" style="background: rgba(255, 255, 255, 0.521);">Fecha de Registro</th>
                    </tr>
                </thead>
                <div>
                    <tbody>
                        @if (isset($listColaborador) != '')
                            @if (count($listColaborador) != 0)
                                @foreach ($listColaborador as $colaborador)
                                    <tr>
                                        <td>{{ $colaborador->id }}</td>
                                        <td>{{ $colaborador->Nombre }} {{ $colaborador->Apellido_Paterno }}
                                            {{ $colaborador->Apellido_Materno }}</td>
                                        <td>{{ $colaborador->Edad }}</td>
                                        <td>{{ $colaborador->Direccion }}</td>
                                        <td>{{ $colaborador->Municipio }}</td>
                                        <td>{{ $colaborador->Estado }}</td>
                                        <td>{{ $colaborador->Codigo_Postal }}</td>
                                        <td>{{ $colaborador->Telefono }}</td>
                                        <td>{{ $colaborador->Email }}</td>
                                        <td>{{ $colaborador->name }}</td>
                                        <td><?php echo date('d/m/Y', strtotime($colaborador->created_at)); ?></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="11" class="text-center">Ninguna coincidencia</td>
                                </tr>
                            @endif
                        @endif
                    </tbody>
                </div>

            </table>
        </div>
    </div>
</div>
