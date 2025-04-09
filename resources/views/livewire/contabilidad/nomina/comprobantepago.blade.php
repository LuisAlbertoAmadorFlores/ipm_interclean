<div>
    <table class="table table-primary">
        <thead>
            <th>Region</th>
            <th>Fecha Inicial</th>
            <th>Fecha Final</th>
        </thead>
        <tbody>
            <td>{{ $region }}</td>
            <td>{{ $fechainicial }}</td>
            <td>{{ $fechafinal }}</td>
        </tbody>
    </table>
    <div class="files mb-2">
        <label for="file" class="w-100">
            <div class="text">
                <span>Cargar comprobante</span>
            </div>
            <input id="file" type="file" wire:model="comprobante" accept=".pdf" class="form-control">
        </label>
        @if ($comprobante!='null')
            
        @endif
    </div>
    <div>
        <div>
            <span class="text-light" wire:loading>Cargando comprobante... espera</span>
        </div>
        <div>
            <button type="submit" class="btn btn-success mb-3 w-100" data-bs-dismiss="modal" wire:loading.remove
                wire:click="guardarComprobante()">Subir</button>
        </div>
    </div>
</div>
