<div class="">
    <fieldset>
        <div class="input-group py-2">
            <label for="" class="input-group-text bg-dark text-light border-0 col-5">Motivo</label>
            <select name="" id="" class="form-control" wire:model="motivo">
                <option value="">Selecciona una opcion</option>
                <option value="cubrioTurno">Cubrio Turno</option>
                <option value="adeudoPago">Adeudo Pago</option>
                <option value="SaldoFavorDescuento">Saldo a Favor Descuento</option>
            </select>
        </div>

        @if ($motivo == 'cubrioTurno')
            <div class="input-group mb-2 ">
                <label for="" class="input-group-text bg-dark text-light border-0 col-5">¿A quien?</label>
                <select name="" id="" class="form-control" wire:model="idColaboradorCubierto">
                    <option value="""># | Selecciona un colaborador</option>
                    @foreach ($allColaboradores as $item)
                        @if ($idColaborador != $item->idColaborador)
                            <option value="{{ $item->idColaborador }}">{{ $item->idColaborador }} |
                                {{ $item->Nombre_Completo }} {{ $item->Apellido_Paterno }} {{ $item->Apellido_Materno }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-2 ">
                <label for="" class="input-group-text bg-dark text-light border-0 col-5">¿Cuando?</label>
                <input type="date" class="form-control" wire:model="fechacubrio">
            </div>
        @endif
        <div class="input-group mb-2">
            <label for="" class="input-group-text bg-dark text-light border-0 col-5">Cantidad</label>
            <input type="number" class="form-control" wire:model="cantidad">
        </div>
        <div class="input-group">
            <label for="" class="input-group-text bg-dark text-light border-0 col-5">Descripcion</label>
            <textarea type="number" class="form-control scrollbar" wire:model="descripcion" rows="4" style="resize: none"></textarea>
        </div>
        @if ($errors->any())
            <small>Llena todos los campos</small>
        @endif
        <div class="pt-2 mx-auto autorizarlista">
            <button class="btn w-100 " wire:click="registrarExtra()">Aplicar</button>
        </div>
    </fieldset>
</div>
