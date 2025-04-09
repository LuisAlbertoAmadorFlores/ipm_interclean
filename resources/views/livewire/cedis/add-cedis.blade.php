<div class="mb-3 mx-3">
    <button type="button" class=" btn btn-success" data-bs-toggle="modal" data-bs-target="#modalId">
        <i class="fa-solid fa-circle-plus"></i> Agregar Nuevo
    </button>
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content text-light" style="background-color: rgba(32, 96, 164, 0.411);">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Agregar Datos
                    </h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('cedis-create')}}" method="post">
                        @csrf
                        <div class="mb-3"><label for="">Proyecto</label>
                            <select class="form-select scrollbar" id="estado" name="Proyecto" required>
                                <option selected>Elije una opción</option>
                                @foreach ($listaProyectos as $item)
                                    <option value="{{ $item->idProyecto }}">{{ $item->Nombre_Largo_Proyecto }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3" <label for="">Región</label>
                            <select class="form-select scrollbar" id="estado" name="Region" required>
                                <option selected>Elije una opción</option>
                                <option value="Valle Mexico">Valle de Mexico</option>
                                <option value="Occidente">Occidente</option>
                                <option value="Norte">Norte</option>
                                <option value="Sur">Sur</option>
                                <option value="Noreste">Noreste</option>
                                <option value="Centro">Centro</option>
                            </select>
                        </div>
                        <div class="mb-3"><label for="">Nombre</label>
                            <input class="form-control" type="text" name="Nombre" required>
                        </div>
                        <div class="mb-3"><label for="">Estado</label>
                            <select class="form-select scrollbar" id="estado" name="Estado" required>
                                <option selected>Elije una opción</option>
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="CDMX">CDMX</option>
                                <option value="Coahuila">Coahuila</option>
                                <option value="Colima">Colima</option>
                                <option value="Durango">Durango</option>
                                <option value="Estado de Mexico">Estado de Mexico</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="Michoacan">Michoacan</option>
                                <option value="Morelos">Morelos</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="Nuevo Leon">Nuevo Leon</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Queretaro">Queretaro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="San Luis Potosi">San Luis Potosi</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Sonora</option>
                                <option value="Tabasco">Tabasco</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Tlaxcala">Tlaxcala</option>
                                <option value="Veracruz">Veracruz</option>
                                <option value="Yucatan">Yucatan</option>
                                <option value="Zacatecas">Zacatecas</option>
                            </select>
                        </div>

                        <div class="mb-3"><label for="">Municipio</label>
                            <input class="form-control" type="text" name="Municipio" required>
                        </div>

                        <div class="mb-3"><label for="">Responsable</label>
                            <input class="form-control" type="text" name="Responsable" required>
                        </div>

                        <div class="mb-3"><label for="">Telefono</label>
                            <input class="form-control" type="text" name="Telefono" required>
                        </div>
                        <div class="mb-3"><label for="">Email</label>
                            <input class="form-control" type="text" name="Mail" required>
                        </div><button type="submit" class="btn btn-success w-100"
                            wire:click="saveCedi()">Guardar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
