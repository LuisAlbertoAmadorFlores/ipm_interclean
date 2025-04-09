<div>
    <div class="table-responsive bg-light" style="height: 35vh">
        <table class="table table-primary ">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Precio</th>
                    <th>URL</th>
                </tr>
            </thead>
            <tbody>
                @isset($data)
                    @foreach ($data as $item)
                    <tr class="">
                        <td scope="row">{{ $item->Nombre }}</td>
                        <td>{{ $item->Unidades }}</td>
                        <td>${{ $item->Precio }}
                        </td>
                        <td>
                            @if ($item->URL != null)
                                <a href="{{ $item->URL }}" target="_blank" class="btn btn-warning shadow me-2"><i
                                        class="fa-solid fa-eye"></i></a>
                            @endif
                            <button class="btn btn-danger" wire:click="delete({{ $item->idcompras_items }})"><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @php
                        $total = $total + $item->Unidades * $item->Precio;
                    @endphp
                @endforeach
                @endisset
                
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <fieldset>
            <p class="h5">Justificación de la compra</p>
            <textarea name="" id="" class="form-control textarea" rows="5" wire:model="descripcion"></textarea>
            <small id="helpId" class="text-muted text-light"></small>
        </fieldset>
        <hr>
        <div class="fw-bold"><span class="h4"></span></div>
    </div>
    <div class="text-light d-flex flex-column justify-content-end align-items-end">
        <fieldset class="h3">
            <label>Total: </label>
            <label class="fw-bold">$@php
                echo number_format($total, 2);
            @endphp</label>
        </fieldset>
        <button class="btn btn-dark mt-3 mb-2" wire:click="guardar({{$total}},{{Auth::user()->id}})">Solicitar Compra</button>
    </div>
</div>
