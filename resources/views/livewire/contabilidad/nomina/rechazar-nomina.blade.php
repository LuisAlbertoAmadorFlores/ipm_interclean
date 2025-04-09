<div class="d-flex flex-column">
    {{ $nombre }}
    <hr>
    <label for="">Comentario</label>
    <textarea name="" id="" cols="30" rows="10" class="textarea" wire:model.defer="comentario"></textarea>
    <button class="btn btn-warning mt-3" wire:click="rechazar">Rechazar</button>
</div>