<div class="d-flex justify-content-center mx-auto py-3">
    <div class="d-flex">
        <input type="text"  class="form-control mx-2" placeholder="Buscar ID o Nombre"
            wire:model="search">
        <button class="btn btn-dark btn-busqueda-cc mx-2" wire:click="buscar()"><i
                class="fa-solid fa-magnifying-glass"></i> Buscar</button>
    </div>
</div>
