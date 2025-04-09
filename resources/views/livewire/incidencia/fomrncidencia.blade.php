<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="input-group mb-3">
                <label for="nameinput"
                    class="input-group-text bg-dark border-0 text-light col-lg-5 d-flex justify-content-end"
                    style="background-color: rgba(32, 96, 164, 0.767); ">Fecha
                    Incidencia</label>
                <input type="date" class="form-control" wire:model="fecha" required>
            </div>
            <div>
                @error('fecha')
                    <span class="error text-warning text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class=" input-group mb-3">
                <label for="nameinput"
                    class="input-group-text bg-dark border-0 text-light col-lg-5 d-flex justify-content-end"
                    style="background-color: rgba(32, 96, 164, 0.767);">Tipo
                    de
                    Incidencia</label>
                <input type="text" class="form-control " name="tipo" id="tipo"
                    placeholder="Tipo de Incidencia" wire:model="tipo" required>
            </div>
            <div>
                @error('tipo')
                    <span class="error text-warning text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="input-group">
                <label for="estado"
                    class="col-lg-5 col-md-5 input-group-text text-light border-0 bg-dark d-flex justify-content-end">Categoria</label>
                <select class="form-select" id="Categoria" aria-label="Default select example" wire:model="categoria">
                    <option selected>Selecciona una opción</option>
                    <option value="Administrativa">Administrativa</option>
                    <option value="Operativa">Operativa</option>
                </select>
            </div>
            @error('categoria')
                <span class="error text-warning text-center">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-6">
            <div class="input-group mb-3 ">
                <label for="nameinput"
                    class="col-lg-5 col-md-5 input-group-text bg-dark border-0 text-light d-flex justify-content-end"
                    style="background-color: rgba(32, 96, 164, 0.767);">Evidencia</label>
                <input type="file" class="form-control" name="Documento" accept="video/*,image/*,.pdf,audio/*" wire:model="evidencia"
                    required>
            </div>
        </div>
    </div>

    <div class=" mb-3">
        <label for="nameinput" class="input-group-text bg-dark border-0 text-light"
            style="background-color: rgba(32, 96, 164, 0.767);">Descripcion
            Breve</label>
        <textarea class="form-control" name="Descripcion" id="exampleFormControlTextarea1" rows="5"
            wire:model="descripcion"></textarea>
        <div>
            @error('descripcion')
                <span class="error text-warning text-center">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="d-flex justify-content-between">

        <div>
            <span wire:loading>Cargando Información, espera por favor.</span>
        </div>
        <div wire:loading.remove>
            <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">
                Cerrar
            </button>
            <button  type="button" class="btn btn-primary"
                wire:click="saveIncidencia({{ Auth::user()->id }})" data-bs-dismiss="modal">Guardar</button>
        </div>

    </div>
</div>
