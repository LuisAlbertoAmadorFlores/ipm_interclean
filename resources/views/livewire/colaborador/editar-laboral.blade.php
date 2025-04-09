<div>
    <div class="p-0 rounded ms-2">
        <div class="row">
            <div class="h5">Complementaria</div>
            <div class="mx-4 col-lg-5">
                <div class="input-group">
                    <label for="nameinput"
                        class="col-lg-6 col-md-5 input-group-text text-light  border-0 fw-bold bg-dark d-flex justify-content-end">Puesto</label>
                    <input type="text" class="form-control col-3" wire:model="puesto">
                </div>
                <div>
                    @error('puesto')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mx-4 col-lg-5">
                <div class="input-group">
                    <label for="ape2"
                        class="col-lg-6 col-md-5 input-group-text text-light  border-0 fw-bold bg-dark d-flex justify-content-end">Salario(Mensual)</label>
                    <input type="text" class="form-control" required wire:model="salario">
                </div>
                <div>
                    @error('salario')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        
            <div class="mx-4 col-lg-5">
                <div class="input-group mt-3">
                    <label for="ape2"
                        class="col-lg-6 col-md-5 input-group-text text-light  border-0 fw-bold bg-dark d-flex justify-content-end">RFC</label>
                    <input type="text" class="form-control" required wire:model="RFC">
                </div>
                <div>
                    @error('RFC')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mx-4 col-lg-5">
                <div class="input-group mt-3 ">
                    <label
                        class="col-lg-6 col-md-5 input-group-text text-light  border-0 fw-bold bg-dark d-flex justify-content-end">NSS</label>
                    <input type="number" class="form-control" required wire:model="NSS">
                </div>
                <div>
                    @error('NSS')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
           
            <div class="mx-4 col-lg-5">
                <div class="input-group mt-3 ">
                    <label
                        class="col-lg-6 col-md-5 input-group-text text-light  border-0 fw-bold bg-dark d-flex justify-content-end">Fecha
                        de Ingreso</label>
                    <input type="date" class="form-control" required wire:model="Fecha_ingreso">
                </div>
                <div>
                    @error('Fecha_ingreso')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
       
            <div class="mx-4 col-lg-5">
                <div class="input-group mt-3">
                    <label
                        class="col-lg-6 col-md-5 input-group-text text-light  border-0 fw-bold bg-dark d-flex justify-content-end">Modalidad</label>
                    @if ($Modalidad === '0')
                        <select class="form-select" aria-label="Default select example" wire:model="Modalidad">
                            <option>Selecciona un Estado</option>
                            <option value="0" selected>Fijo</option>
                            <option value="1">Cubre-descanso</option>
                            <option value="2">Cubre-evento</option>
                        </select>
                    @endif
                    @if($Modalidad === '1')
                        <select class="form-select" aria-label="Default select example" wire:model="Modalidad">
                            <option>Selecciona un Estado</option>
                            <option value="0">Fijo</option>
                            <option value="1" selected>Cubre-descanso</option>
                            <option value="2">Cubre-evento</option>
                        </select>
                    @endif
                    @if($Modalidad === '2')
                        <select class="form-select" aria-label="Default select example" wire:model="Modalidad">
                            <option>Selecciona un Estado</option>
                            <option value="0">Fijo</option>
                            <option value="1">Cubre-descanso</option>
                            <option value="2" selected>Cubre-evento</option>
                        </select>
                    @endif
                </div>
                <div>
                    @error('Modalidad')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mx-4 col-lg-5">
                <div class="input-group mt-3">
                    <label
                        class="col-lg-6 col-md-5 input-group-text text-light  border-0 fw-bold bg-dark d-flex justify-content-end">Bono</label>
                    <input type="text" class="form-control" required wire:model="Bono">
                </div>
                <div>
                    @error('Bono')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mx-4 col-lg-5">
                <div class="input-group mt-3">
                    <label
                        class="input-group-text text-light  border-0 fw-bold col-lg-6 text-wrap bg-dark d-flex justify-content-end">¿Descuento
                        via nomina?</label>
                    @if ($Descuento_Nomina === '0')
                        <select class="form-select" aria-label="Default select example" wire:model="Descuento_Nomina">
                            <option value="0" selected>SI</option>
                            <option value="1">NO</option>
                        </select>
                    @else
                        <select class="form-select" aria-label="Default select example" wire:model="Descuento_Nomina">
                            <option value="0">SI</option>
                            <option value="1" selected>NO</option>
                        </select>
                    @endif
                </div>
                <div>
                    @error('Descuento_Nomina')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mx-4 col-lg-5">
                <div class="input-group mt-3">
                    <label for="cp"
                        class="input-group-text text-light  border-0 col-lg-6 text-wrap fw-bold bg-dark d-flex justify-content-center">¿Credito
                        Infonavit o
                        Fonacot?</label>
                    @if ($creditoInfonavit === '0')
                        <select class="form-select" wire:model="creditoInfonavit">
                            <option value="0" selected>SI</option>
                            <option value="1">NO</option>
                        </select>
                    @else
                        <select class="form-select" wire:model="creditoInfonavit">

                            <option value="0">SI</option>
                            <option value="1" selected>NO</option>
                        </select>
                    @endif
                </div>
                <div>
                    @error('creditoInfonavit')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mx-4 col-lg-5">
                <div class="input-group mt-3">
                    <label for="cp"
                        class="input-group-text text-light text-wrap col-lg-6  border-0 fw-bold bg-dark d-flex justify-content-center">¿Alguna
                        discapacidad?</label>
                    @if ($Discapacidad === '0')
                        <select class="form-select" aria-label="Default select example" wire:model="Discapacidad">
                            <option value="0" selected>SI</option>
                            <option value="1">NO</option>
                        </select>
                    @else
                        <select class="form-select" aria-label="Default select example" wire:model="Discapacidad">

                            <option value="0">SI</option>
                            <option value="1" selected>NO</option>
                        </select>
                    @endif
                </div>
                <div>
                    @error('Discapacidad')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="h5 text-light">Datos de Emergencia</div>
            <div class="mx-4 col-lg-5">
                <div class="input-group mb-3">
                    <label for="telefono"
                        class="col-lg-3 col-md-5 input-group-text text-light border-0 bg-dark d-flex justify-content-end">Nombre</label>
                    <input type="text" class="form-control" name="telefono" id="telefono"
                        wire:model="emergencia_nombre" pattern="^[0-9]+">
                </div>
            </div>
            <div class="mx-4 col-lg-5">
                <div class="input-group">
                    <label for="email"
                        class="col-lg-6 col-md-5 input-group-text text-light border-0 bg-dark d-flex justify-content-end">Teléfono</label>
                    <input type="phone" class="form-control" name="telefono" id="telefono_emergencia"
                        wire:model="emergencia_telefono" pattern="^[0-9]+">
                </div>
            </div>
            <div class="mx-4 col-lg-5">
                <div class="input-group">
                    <label
                        class="col-lg-6 col-md-5 input-group-text text-light  border-0 bg-dark d-flex justify-content-end">Parentesco</label>
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
            </div>
        </div>
        <div class="row">
            <div class="h5 text-light mt-3 ps-3">Datos Bancarios</div>
            <div class="mx-4 col-lg-5">
                <div class="input-group mb-3">
                    <label for="telefono"
                        class="col-lg-4 col-md-5 input-group-text text-light border-0 bg-dark d-flex justify-content-end">Banco</label>
                    <select class="form-select" wire:model="banco">
                        <option selected>Elije un Banco</option>
                        <option value="HSBC">HSBC</option>
                        <option value="CITIBANAMEX">CITIBANAMEX</option>
                        <option value="Santander">Santander</option>
                        <option value="Banco Azteca">Banco Azteca</option>
                        <option value="Bancomer">Bancomer</option>
                        <option value="Bancoppel">Bancoppel</option>
                        <option value="Banorte">Banorte</option>
                    </select>
                </div>
            </div>
            <div class="mx-4 col-lg-5">
                <div class="input-group mb-3">
                    <label for="email"
                        class="col-lg-4 col-md-5 input-group-text text-light border-0 bg-dark d-flex justify-content-end">CLABE</label>
                    <input type="phone" class="form-control" id="clabe" wire:model="clabe_interbancaria"
                        pattern="^[0-9]+">
                </div>
            </div>
            <div class="mx-4 col-lg-5">
                <div class="input-group">
                    <label for="email"
                        class="col-lg-4 col-md-5 input-group-text text-light border-0 bg-dark d-flex justify-content-end">No.
                        Cuenta</label>
                    <input type="phone" class="form-control" id="cuenta" wire:model="numeroCuenta"
                        pattern="^[0-9]+">
                </div>
            </div>
            <div class="mx-4 col-lg-5">
                <div class="input-group">
                    <label for="email"
                        class="col-lg-4 col-md-5 input-group-text text-light border-0 bg-dark d-flex justify-content-end">No.
                        Tarjeta</label>
                    <input type="phone" class="form-control" id="tarjeta" wire:model="numeroTarjeta"
                        pattern="^[0-9]+">
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="button" class="btn btn-danger mx-3 mb-1" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary  mx-3 mb-1" data-bs-dismiss="modal"
            wire:click="save">Actualizar</button>
    </div>
</div>
