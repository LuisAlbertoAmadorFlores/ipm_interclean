<div class="p-0 rounded">
    <div class="h5 text-light pt-4 pb-2 col-lg-12 ">Datos Personales</div>
    <div class="row">
        <div class="mx-4 col-lg-5">
            <div class="input-group">
                <label
                    class="col-lg-6 col-md-5 input-group-text text-light  border-0 fw-bold bg-dark d-flex justify-content-end">Nombre(s)</label>
                <input type="text" class="form-control" wire:model="nombre">
            </div>
            <div>
                @error('nombre')
                    <span class="error text-warning fs-6">{{ $message }}
                    @enderror
            </div>
        </div>
        <div class="mx-4 col-lg-5">
            <div class="input-group">
                <label for="ape2"
                    class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold bg-dark d-flex justify-content-end">Apellido
                    Paterno</label>
                <input type="text" class="form-control" wire:model="apellido_paterno">
            </div>
            <div>
                @error('apellido_paterno')
                    <span class="error text-warning text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mx-4 col-lg-5">
            <div class="input-group mt-3">
                <label
                    class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold bg-dark d-flex justify-content-end">Apellido
                    Materno</label>
                <input type="text" class="form-control" wire:model="apellido_materno">
            </div>
            <div>
                @error('apellido_materno')
                    <span class="error text-warning text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mx-4 col-lg-5">
            <div class="input-group mt-3">
                <label
                    class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold bg-dark d-flex justify-content-end">Edad</label>
                <input type="number" class="form-control edadcontrol" id="edad" wire:model="edad" min="18"
                    pattern="^[0-9]+">
                <label class="input-group-text bg-dark border-0 text-light" patterns="[0-9]+">Años</label>
            </div>
            <div>
                @error('edad')
                    <span class="error text-warning text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mx-4 col-lg-5">
            <div class="input-group mt-3">
                <label for="direccion"
                    class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold bg-dark d-flex justify-content-end">Dirección</label>
                <input type="text" class="form-control" id="direccion" wire:model="direccion">
            </div>
            <div>
                @error('direccion')
                    <span class="error text-warning text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mx-4 col-lg-5">
            <div class="input-group mt-3">
                <label
                    class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold bg-dark d-flex justify-content-end">Municipio</label>
                <input type="text" class="form-control" id="municipio" wire:model="municipio">
            </div>
            <div>
                @error('municipio')
                    <span class="error text-warning text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mx-4 col-lg-5">
            <div class="input-group mt-3">
                <label for="estado"
                    class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold bg-dark d-flex justify-content-end">Estado</label>
                <select class="form-select" id="estado" aria-label="Default select example" wire:model="estado">
                    @foreach ($AllEstados as $item)
                        {{ $contador++ }}
                        @if ($contador == $estado)
                            <option value="{{ $contador }}" selected>
                                {{ $item }}</option>
                        @else
                            <option value="{{ $contador }}">{{ $item }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('estado')
                <span class="error text-warning text-center">{{ $message }}</span>
            @enderror
        </div>
        <div class="mx-4 col-lg-5">
            <div class="input-group mt-3">
                <label for="cp"
                    class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold bg-dark d-flex justify-content-end">Codigo
                    Postal</label>
                <input type="number" class="form-control" id="codigoPostal" wire:model="codigo_postal"
                    pattern="^[0-9]+">
            </div>
            <div>
                @error('codigo_postal')
                    <span class="error text-warning text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="h5 text-light col-lg-12 mt-4">Datos de Contacto</div>
        <div class="mx-4 col-lg-5">
            <div class="input-group">
                <label for="telefono"
                    class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold bg-dark d-flex justify-content-end">Telefono</label>
                <input type="phone" class="form-control" name="telefono" id="telefono" wire:model="telefono"
                    pattern="^[0-9]+">
            </div>
            <div>
                @error('telefono')
                    <span class="error text-warning text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mx-4 col-lg-5 mb-3">
            <div class="input-group">
                <label for="email"
                    class="col-lg-6 col-md-5 input-group-text text-light border-0 fw-bold bg-dark d-flex justify-content-end">Correo
                    Electronico</label>
                <input type="email" class="form-control" wire:model="correo">
            </div>
            <div>
                @error('correo')
                    <span class="error text-warning text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-danger mx-3 mb-1" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary  mx-3 mb-1" wire:click="savedata" data-bs-dismiss="modal">Actualizar</button>
    </div>
</div>
