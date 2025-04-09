<div class="text-light">
    <p class="h5">Se creara el usuario bajo los siguientes datos:</p>
    <div class="d-flex flex-column border rounded px-2" style="background: #ffffff25;">
        <span>ID: {{ $idColaborador }}</span>
        <span class="text-capitalize">Nombre: {{ $nombreCompleto }}</span>
        <span>Email: {{ $Email }}</span>
    </div>
    <div class="d-flex mt-3">
        <button class="btn btn-warning btn-sm shadown mx-2" wire:click="micontrato()"><i class="fa-solid fa-gavel"></i> Autorizar</button>
        <button class="btn btn-dark btn-sm shadown " wire:click="enviarAccesos()"><i class="fa-solid fa-paper-plane"></i> Enviar Accesos</button>
    </div>
</div>
