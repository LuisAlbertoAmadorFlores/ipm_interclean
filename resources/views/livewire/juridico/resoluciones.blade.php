<div>
    <div>Total de comentarios ({{ $total }})</div>
    <div class="tablas-y scrollbar" style="overflow-y: scroll;height:35vh;background:rgba(255, 255, 255, 0.308)">
        <table class="table">
            <tr>
                <th>Comentario</th>
                <th></th>
            </tr>
            @isset($persona)
            @foreach ($persona as $item)
                <tr>
                    <td><b>ID:</b> {{ $item->idHistorialBaja }}
                        <br>
                        <b>Abogado:</b> {{ $item->name }}
                        <br>
                        <b>Comentario:</b><br> {{ $item->Comentario }}
                    </td>
                    <td><button class="btn btn-dark mt-3" wire:click="descargarEvidencia({{ $item->idHistorialBaja }})"><i
                                class="fa-solid fa-download"></i> Descargar</button></td>
                </tr>
            @endforeach
            @endisset
        </table>
    </div>
</div>