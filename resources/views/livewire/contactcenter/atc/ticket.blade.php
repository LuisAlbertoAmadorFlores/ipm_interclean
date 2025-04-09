<div>
    <div>
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <form wire:submit.prevent="save">
        <div class="mb-3">
            <label for="" class="form-label">Departamento Involucrado</label>
            <select class="form-select form-select" name="" id="" wire:model="departamento">
                <option selected>Selecciona un departamento</option>
                <option value="Juridico">Juridico</option>
                <option value="Contabilidad">Contabilidad</option>
                <option value="Operaciones">Operaciones</option>
                <option value="TI">TI</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Problematica<span>*</span></label>
            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                placeholder="" wire:model="problematica" />
            <small id="helpId" class="form-text text-light">Ejemplo:Finiquito,Asistencia,etc.</small>
            @error('problematica')
                <small id="helpId" class="form-text text-light">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Comentario<span>*</span></label>
            <textarea name="" id="" cols="30" rows="10" class="form-control textarea"
                wire:model="comentario"></textarea>
            <small id="helpId" class="form-text text-light">Agrega una descripción.</small>
            @error('comentario')
                <small id="helpId" class="form-text text-light">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-warning w-100">Crear Ticket</button>
    </form>
</div>
