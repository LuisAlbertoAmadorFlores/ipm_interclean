<div class="col-11 mx-auto mt-3 rounded d-flex justify-content-center ">
    <div class="row mx-0">
        <div class="py-2 ps-2 rounded-top titulos-block encabezados">
            {{ $title }}
        </div>
        <div class="d-lg-flex  justify-content-evenly scrollbar degradado rounded-bottom" style="height:85vh; overflow-y: scroll;">
            <div class="col-lg-5 rounded mb-3">
                <div class="blur14 shadowup rounded">
                    <div class="h5  m-3 pt-3 titulos-block">Datos Personales</div>
                    <div class="row m-0">
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Nombre(s)</label>
                                <input type="text" class="form-control" wire:model="nombre" pattern="[A-Za-z]">
                            </div>
                            @error('nombre')
                                <small class="error ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label for="ape2"
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Apellido
                                    Paterno</label>
                                <input type="text" class="form-control" wire:model="apellido_paterno">
                            </div>
                            @error('apellido_paterno')
                                <small class="error ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0   d-flex justify-content-end"
                                    id="encabezado">Apellido
                                    Materno</label>
                                <input type="text" class="form-control" wire:model="apellido_materno">
                            </div>
                            @error('apellido_materno')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label for="estado"
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Sexo</label>
                                <select class="form-select" id="sexo" wire:model="sexo">
                                    <option selected>Elije una opción</option>
                                    <option value="H">Masculino</option>
                                    <option value="M">Femenino</option>
                                </select>
                            </div>
                            @error('sexo')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Edad</label>
                                <input type="number" class="form-control edadcontrol" id="edad" wire:model="edad"
                                    min="18" pattern="^[0-9]+" value="18">
                                <label class="input-group-text border-0 text-light" id="encabezado"
                                    patterns="[0-9]+">Años</label>
                            </div>
                            @error('edad')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label for="direccion"
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Dirección</label>
                                <input type="text" class="form-control" id="direccion" wire:model="direccion">
                            </div>
                            @error('direccion')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label for="direccion"
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Colonia</label>
                                <input type="text" class="form-control" id="direccion" wire:model="colonia">
                            </div>
                            @error('colonia')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Municipio</label>
                                <input type="text" class="form-control" id="municipio" wire:model="municipio">
                            </div>
                            @error('municipio')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label for="estado"
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Estado</label>
                                <select class="form-select" id="estado" wire:model="estado">
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
                            @error('estado')
                                <small class="error ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label for="cp"
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Código
                                    Postal</label>
                                <input type="number" class="form-control" id="codigoPostal"
                                    wire:model="codigo_postal" pattern="^[0-9]+">
                            </div>
                            @error('codigo_postal')
                                <small class="error ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Nivel
                                    de Estudios</label>
                                <select class="form-select" wire:model="Estudios"
                                    aria-label="Default select example">
                                    <option selected>Elije una opción</option>
                                    <option value="Ninguno">Ninguno</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                    <option value="Preparatoria">Preparatoria</option>
                                    <option value="Licenciatura">Licenciatura</option>
                                </select>
                            </div>
                            @error('Estudios')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label for="telefono"
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Teléfono</label>
                                <input type="phone" class="form-control" name="telefono" id="telefono"
                                    wire:model="telefono" pattern="^[0-9]+">
                            </div>
                            @error('telefono')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label for="email"
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Email</label>
                                <input type="email" class="form-control" wire:model="correo">
                            </div>
                            @error('correo')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-3 blur14 shadowup rounded ">
                    <div class="h5 ms-3 pt-3 titulo-block">Datos de Emergencia</div>
                    <div class="row mx-0">
                        <div class="col-lg-12 mb-3">
                            <div class="input-group ">
                                <label for="telefono"
                                    class="col-lg-3 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Nombre</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    wire:model="emergencia_nombre" pattern="^[0-9]+">
                            </div>
                            @error('emergencia_nombre')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label for="email"
                                    class="col-lg-6 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Teléfono</label>
                                <input type="phone" class="form-control" name="telefono" id="telefono_emergencia"
                                    wire:model="emergencia_telefono" pattern="^[0-9]+">
                            </div>
                            @error('emergencia_telefono')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Parentesco</label>
                                <select class="form-select" wire:model="emergencia_parentesco">
                                    <option selected>Elije una opción</option>
                                    <option value="Padres">Padre/Madre</option>
                                    <option value="Pareja">Esposo(a)</option>
                                    <option value="Hijo(a)">Hijo(a)</option>
                                    <option value="Hermano(a)">Hermano(a)</option>
                                    <option value="Amigo(a)">Amigo(a)</option>
                                    <option value="Familia Indirecto">Familiar Indirecto</option>
                                </select>
                            </div>
                            @error('emergencia_parentesco')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-3 mb-3 blur14 shadowup rounded">
                    <div class="row m-0">
                        <div class="h5 mt-3 ps-3 titulos-block">Datos Bancarios</div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label for="telefono"
                                    class="col-lg-4 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">Banco</label>
                                <select class="form-select" wire:model="banco">
                                    <option selected>Elije un Banco</option>
                                    <option value="HSBC">HSBC</option>
                                    <option value="CITIBANAMEX">CITIBANAMEX</option>
                                    <option value="Santander">Santander</option>
                                    <option value="Banco Azteca">Banco Azteca</option>
                                    <option value="Bancomer">Bancomer</option>
                                    <option value="Bancoppel">Bancoppel</option>
                                    <option value="Banorte">Banorte</option>
                                    <option value="Scotiabank">Scotiabank</option>
                                    <option value="Banregio">Banregio</option>
                                </select>
                            </div>
                            @error('banco')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label for="email"
                                    class="col-lg-4 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">CLABE</label>
                                <input type="phone" class="form-control" id="clabe"
                                    wire:model="clabe_interbancaria" pattern="^[0-9]+">
                            </div>
                            @error('clabe_interbancaria')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label for="email"
                                    class="col-lg-4 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">No.
                                    Cuenta</label>
                                <input type="phone" class="form-control" id="cuenta" wire:model="numeroCuenta"
                                    pattern="^[0-9]+">
                            </div>
                            @error('numeroCuenta')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label for="email"
                                    class="col-lg-4 col-md-5 input-group-text text-light border-0  d-flex justify-content-end"
                                    id="encabezado">No.
                                    Tarjeta</label>
                                <input type="phone" class="form-control" id="tarjeta" wire:model="numeroTarjeta"
                                    pattern="^[0-9]+">
                            </div>
                            @error('numeroCuenta')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 rounded mt-3">
                <div class="blur14 shadowup rounded">
                    <div class="row">
                        <div class="h5 ms-3 mb-3 pt-3 titulos-block">Datos Complementarios</div>
                        <div class="row mx-0">
                            <div class="col-lg-6 mb-3">
                                <div class="input-group ">
                                    <label for="direccion"
                                        class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                        id="encabezado">CURP</label>
                                    <input type="text" class="form-control" wire:model="CURP" id="CURP"
                                        required>
                                </div>
                                @error('CURP')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="input-group ">
                                    <label for="ape2"
                                        class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                        id="encabezado">RFC</label>
                                    <input type="text" class="form-control" wire:model="RFC" id="RFC"
                                        required>
                                </div>
                                @error('RFC')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3 ">
                                <div class="input-group ">
                                    <label
                                        class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                        id="encabezado">NSS</label>
                                    <input type="number" class="form-control" wire:model="NSS" id="NSS"
                                        required>
                                </div>
                                @error('NSS')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="input-group ">
                                    <label
                                        class="col-lg-6 col-md-5 input-group-text text-light text-wrap border-0  d-flex justify-content-end"
                                        id="encabezado">CP del RFC</label>
                                    <input type="number" class="form-control" id="codigoPostalRFC"
                                        wire:model="codigo_postal_rfc" required>
                                </div>
                                @error('codigo_postal_rfc')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="input-group ">
                                    <label for="cp"
                                        class="input-group-text text-light text-wrap border-0 col-lg-6  d-flex justify-content-center"
                                        id="encabezado">¿Credito
                                        Infonavit/Fonacot?</label>
                                    <select class="form-select" id="" wire:model="creditoInfonavit">
                                        <option selected>Elije una opción</option>
                                        <option value="0">SI</option>
                                        <option value="1">NO</option>
                                    </select>
                                </div> @error('creditoInfonavit')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="input-group ">
                                    <label for="cp"
                                        class="input-group-text text-light  border-0 text-wrap col-6  d-flex justify-content-center"
                                        id="encabezado">
                                        ¿Alguna
                                        discapacidad?</label>
                                    <select class="form-select" id="" wire:model="Discapacidad">
                                        <option selected>Elije una opción</option>
                                        <option value="0">SI</option>
                                        <option value="1">NO</option>
                                    </select>
                                </div>
                                @error('creditoInfonavit')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 blur14 shadowup rounded">
                    <div class="h5 pt-4 pb-2 ps-3 titulos-block">Datos del Puesto</div>
                    <div class="row mx-0 mb-3">
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Proyecto</label>
                                <select name="" class="form-control col-3" wire:model="proyecto">
                                    <option value="">Selecciona una opcion</option>
                                    @foreach ($proyectos as $proyecto)
                                        <option value="{{ $proyecto->idProyecto }}">
                                            {{ $proyecto->Nombre_Corto_Proyecto }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('proyecto')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Cedis</label>
                                {{-- <input type="text" class="form-control col-3" wire:model="Zona"> --}}
                                <select name="" class="form-control col-3" wire:model="Zona">
                                    <option value="">Selecciona una opcion</option>
                                    @foreach ($cedis as $ced)
                                        <option value="{{ $ced->id }}">
                                            {{ $ced->Nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('Zona')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label for="nameinput"
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Puesto</label>
                                <select class="form-control col-3" wire:model="puesto">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Lavador - Movedor">Lavador - Movedor</option>
                                    <option value="Lavador">Lavador</option>
                                </select>
                            </div>
                            @error('puesto')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label for="ape2"
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Salario(Mensual)</label>
                                <input type="text" class="form-control" wire:model="salario" required>
                            </div>
                            @error('salario')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Pago de Salario</label>
                                <select class="form-select" wire:model="tipoPago">
                                    <option selected>Selecciona un Estado</option>
                                    <option value="Semanal">Semanal</option>
                                    <option value="Quincenal">Quincenal</option>
                                </select>
                            </div>
                            @error('tipoPago')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label for="ape2"
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Bono</label>
                                <input type="text" class="form-control" wire:model="bono" required>
                            </div>
                            @error('bono')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group">
                                <label for="ape2"
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Pago
                                    de Bono</label>
                                <select class="form-select" wire:model="tipoPagoBono">
                                    <option selected>Selecciona una opcion</option>
                                    <option value="Semanal">Semanal</option>
                                    <option value="Quincenal">Quincenal</option>
                                    <option value="Mensual">Mensual</option>
                                    <option value="Mensual">No Aplica</option>
                                </select>
                            </div>
                            @error('bono')
                                <small class="error ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Modalidad</label>
                                <select class="form-select" wire:model="Modalidad"
                                    aria-label="Default select example">
                                    <option selected>Selecciona un Estado</option>
                                    <option value="0">Fijo</option>
                                    <option value="1">Cubre-Descanso</option>
                                    <option value="2">Cubre-Evento</option>
                                </select>
                            </div>
                            @error('Modalidad')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Jornada</label>
                                <select class="form-select" id="sexo" wire:model="Jornada">
                                    <option selected>Elije una opción</option>
                                    <option value="Diurno">Diurno</option>
                                    <option value="Matutino">Matutino</option>
                                    <option value="Vespertino">Vespertino</option>
                                    <option value="Nocturno">Nocturno</option>
                                </select>
                            </div>
                            @error('Jornada')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="input-group ">
                                <label
                                    class="col-lg-6 col-md-5 input-group-text text-light  border-0  d-flex justify-content-end"
                                    id="encabezado">Fecha
                                    de Ingreso</label>
                                <input type="date" class="form-control" wire:model="fecha_Ingreso" required>
                            </div>
                            @error('fecha_Ingreso')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>
                <div>
                    <div class="d-lg-flex justify-content-end guardar">
                        <button class=" mb-3" wire:click="datos"><i class="fa-solid fa-floppy-disk"></i>
                            Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
