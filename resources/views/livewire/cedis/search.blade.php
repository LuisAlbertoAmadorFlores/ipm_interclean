<div>
    <div class="input-group p-3 pb-4 mt-4 rounded-top text-static searchpersonar" style="background:#ffffff2c;backdrop-filter:blur(14px)">
        <input type="text" wire:model="dato" class="form-control rounded col-6 "
            placeholder="Ingresa nombre" aria-describedby="helpId" id="idsearch" />
        <button wire:click="sendDato" class="btn btn-dark ms-2 rounded">Buscar</button>
        <div class="col-12">
            @error('dato')
                <span class="error text-warning text-center">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
