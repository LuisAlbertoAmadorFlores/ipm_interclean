<div>
    <button type="button" class="btn btn-dark shadow" data-bs-toggle="modal" data-bs-target="#comentario"><i
            class="fa-solid fa-check-double"></i>
        Auditoria
    </button>
    <div wire:ignore.self class="modal fade" id="comentario" tabindex="-1" data-bs-backdrop="static"
        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
            <div class="modal-content degradado-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Auditoria
                    </h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-2 text-light d-flex">
                        <div class="col-6 border-end pe-3">
                            <span>Documento</span>
                            <h3 class="mb-3">{{ $documento }}</h3>
                            <label class="me-2">Marcar como documento correcto </label><input type="checkbox"
                                class="form-check-input" wire:model="flatcheck" wire:click="changedMark()">
                            <br>
                            <label class="mt-3">Obeservaciones</label>
                            <textarea name="" id="" rows="5" class="form-control" style="resize: none"
                                wire:model="comentario"></textarea><button class="btn btn-dark mt-3"
                                wire:click="save({{ Auth::user()->id }})">Guardar</button>
                        </div>
                        <div class="ms-2 w-100">
                            <span class="">Historial de Comentarios</span>
                            <div class="comentariosAuditoria scrollbar">
                                @foreach ($document as $item)
                                    @if ($item->nombreDoc == $nombreCompleto)
                                        <div class="d-flex flex-column borderComentario">
                                            <span>Nombre: {{ $item->name }}</span>
                                            <span>Comentario: {{ $item->Comentario }}</span>
                                            <span>Fecha: {{ $item->created_at }}</span>
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
