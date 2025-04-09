<div>
    <form wire:submit.prevent="enviarCorreo()" method="get">
        <div class="text-light mb-3">
            <h5>Codigo de Validación</h5>
            <div class="rounded bg-dark text-light py-2 d-flex justify-content-center align-items-center">
                <p class="h2">{{ $codigo }}</p>
            </div>
        </div>
        <div class="mt-2  d-flex justify-content-end align-items-center">
            <button type="" class="btn btn-warning">Validar Correo Electronico</button>
        </div>
    </form>
</div>
