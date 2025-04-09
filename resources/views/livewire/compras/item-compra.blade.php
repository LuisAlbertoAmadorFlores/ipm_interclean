<div>
    <div class="">
        <div class="mb-3 text-light">
            <label for="" class="form-label">Nombre <span class="text-danger">*</span></label>
            <input
                type="text"
                name=""
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId" wire:model='nombre'
            />
            @error('nombre')
            <small id="helpId" class="text-danger text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Unidades Requeridas <span class="text-danger">*</span></label>
            <input
                type="number"
                name=""
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId" wire:model='unidades'
            />
            @error('unidades')
            <small id="helpId" class="text-danger text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio por Unidad <span class="text-danger">*</span></label>
            <input
                type="number"
                name=""
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId" wire:model='precio'
            />
            @error('precio')
            <small id="helpId" class="text-danger text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">URL</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control" wire:model='url'></textarea>
            <small id="helpId" class="">Solo aplica si el producto se comprara por linea(Mercado Libre,Amazon,ETC)</small>
        </div>
        <button class="btn btn-primary w-100" wire:click="agregarItem()">Agregar</button>
    </div>
</div>
