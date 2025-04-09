<div class="col-lg-8 mx-auto rounded m-3 p-3 d-flex align-items-center" style="height:90vh">
    <div class="rounded degradado">
        <div class="py-2 ps-2 rounded-top h5 titulos-block encabezados">Nuevo Prospecto</div>
        <div class="row flex-wrap flex-row m-3 rounded pb-3 degradado-tarjeta">
            <div class="h5 pt-4 pb-2 col-lg-12 titulos-block">Datos Personales</div>
            <div class="col-lg-4">
                <div class="input-group mt-3">
                    <label for="nameinput"
                        class="col-lg-4 col-md-5 input-group-text text-light  border-0 fw-bold d-flex justify-content-end"
                        id="encabezado">Nombre(s)</label>
                    <input type="text" class="form-control" id="nombre" wire:model="Nombre">
                </div>
                <div>
                    @error('Nombre')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group mt-3">
                    <label for="ape2"
                        class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold  d-flex justify-content-end"
                        id="encabezado">Apellido
                        Paterno</label>
                    <input type="text" class="form-control" id="apellidop" wire:model="Apellido_Paterno">
                </div>
                <div>
                    @error('Apellido_Paterno')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group mt-3">
                    <label for="ape2"
                        class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold  d-flex justify-content-end"
                        id="encabezado">Apellido
                        Materno</label>
                    <input type="text" class="form-control" id="apellidom" wire:model="Apellido_Materno">
                </div>
                <div>
                    @error('Apellido_Materno')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group mt-3">
                    <label
                        class="col-lg-4 col-md-5 input-group-text text-light border-0 fw-bold  d-flex justify-content-end"
                        id="encabezado">Edad</label>
                    <input type="number" class="form-control" id="edad" wire:model="edad">
                    <label class="input-group-text border-0 text-light" min="18" patterns="[0-9]+"
                        id="encabezado">Años</label>
                </div>
                <div>
                    @error('edad')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group mt-3">
                    <label for="direccion"
                        class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold  d-flex justify-content-end"
                        id="encabezado">Dirección</label>
                    <input type="text" class="form-control" id="direccion" wire:model="direccion">
                </div>
                <div>
                    @error('direccion')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group mt-3">
                    <label
                        class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold  d-flex justify-content-end"
                        id="encabezado">Colonia</label>
                    <input type="text" class="form-control" id="municipio" wire:model="Colonia">
                </div>
                <div>
                    @error('Colonia')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group mt-3">
                    <label
                        class="col-lg-4 col-md-5 input-group-text text-light border-0 fw-bold  d-flex justify-content-end"
                        id="encabezado">Municipio</label>
                    <input type="text" class="form-control" id="municipio" wire:model="Municipio">
                </div>
                <div>
                    @error('Municipio')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group mt-3">
                    <label for="estado"
                        class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold  d-flex justify-content-end"
                        id="encabezado">Estado</label>
                    <select class="form-select scrollbar" id="estado" aria-label="Default select example" wire:model="Estado"
                        required>
                        <option selected>Selecciona un Estado</option>
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
                <div>
                    @error('Estado')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group mt-3">
                    <label for="cp"
                        class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold  d-flex justify-content-end"
                        id="encabezado">Codigo
                        Postal</label>
                    <input type="number" class="form-control" id="codigoPostal" wire:model="Codigo_Postal">
                </div>
                <div>
                    @error('Codigo_postal')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row flex-wrap flex-row m-3 rounded pb-3 degradado-tarjeta">
            <div class="h5 pb-2 pt-4 titulos-block">Datos de Contacto</div>
            <div class="col-lg-5">
                <div class="col-lg-4 input-group mt-3">
                    <label for="telefono"
                        class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold  d-flex justify-content-end"
                        id="encabezado">Telefono</label>
                    <input type="phone" class="form-control" name="telefono" id="telefono"
                        wire:model="Telefono">
                </div>
                <div>
                    @error('Telefono')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-7">
                <div class="col-lg-6 input-group mt-3">
                    <label for="email"
                        class="col-lg-5 col-md-5 input-group-text text-light border-0 fw-bold  d-flex justify-content-end"
                        id="encabezado">Correo
                        Electronico</label>
                    <input type="email" class="form-control" name="email" id="email" wire:model="Email">
                </div>
                <div>
                    @error('Email')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end pe-3">
            <button class="btn btn-success mb-3 mt-3" wire:click="saveProspecto"><i
                    class="fa-solid fa-floppy-disk"></i>
                Guardar</button>
        </div>
    </div>

</div>
