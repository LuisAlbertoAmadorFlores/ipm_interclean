<div class="row mx-2  pt-3 mb-3 d-flex justify-content-around">
    <div class="col-lg-12 rounded mb-3"
        style="background:rgba(255, 255, 255, 0.24);box-shadow:rgba(255, 255, 255, 0.507) 1px 1px 5px;">
        <div class="h5 text-light m-3 ">Datos Personales</div>
        <div class="row m-0">
            <div class="col-lg-4">
                <div class="input-group">
                    <label
                        class="col-lg-4 col-md-5 input-group-text text-light  border-0 fw-bold bg-dark d-flex justify-content-end">Nombre(s)</label>
                    <input type="text" class="form-control" wire:model="nombre">
                </div>
                <div>
                    @error('nombre')
                        <span class="error text-warning fs-6">{{ $message }}
                        @enderror
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="input-group">
                    <label for="email"
                        class="col-lg-4 col-md-5 input-group-text text-light border-0 fw-bold bg-dark d-flex justify-content-end">Correo
                        Electronico</label>
                    <input type="email" class="form-control" wire:model="correo">
                </div>
                <div>
                    @error('correo')
                        <span class="error text-warning text-center">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group mb-3">
                    <label for="estado"
                        class="col-lg-4 col-md-5 input-group-text text-light border-0 fw-bold bg-dark d-flex justify-content-end">Rol</label>
                    <select class="form-select" id="sexo" aria-label="Default select example" wire:model="rol">
                        <option selected>Selecciona una opción</option>
                        <option value="Reclutador">Reclutador</option>
                        <option value="Coordinador">Coordinador</option>
                        <option value="Juridico">Juridico</option>
                        <option value="Contabilidad">Contabilidad</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Sistemas">Sistemas</option>
                        <option value="Alto Rango">Alto Rango</option>
                    </select>
                </div>
                @error('rol')
                    <span class="error text-warning text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end col-11">
        <button class="btn btn-success btn-lg mb-3 mt-3" wire:click="datos"><i class="fa-solid fa-floppy-disk"></i>
            Guardar</button>
    </div>
</div>
