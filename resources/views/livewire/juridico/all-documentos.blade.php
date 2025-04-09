<div class="">
    <div class="input-group mb-3">
        <select wire:model="documento" class="form-select">
            <option value="0">Selecciona una documento</option>
            <optgroup label="Documentación Basica">
                <option value="Identificacion"> Identificaciórn Oficial</option>
                <option value="CURP">CURP</option>
                <option value="NSS">NSS</option>
                <option value="Comprobante_Domiclio">Comprobante de Domicilio</option>
                <option value="Acta_Naciminto" selected>Acta Nacimiento</option>
                <option value="RFC">RFC</option>
                <option value="Caratula_Banco">Caratula de Banco</option>
                <option value="Solicitud_Empleo">Solicitud de Empleo</option>
                <option value="Contrato_Digital">Contrato Digital</option>
                <option value="Foto">Foto</option>
            </optgroup>
            <optgroup label="Documentación Complementaria">
                @foreach ($complementario as $documento)
                    @php
                        $arrayDocument = [];
                        $arraynameDocument = [];
                        foreach (explode('/', $documento) as $value) {
                            array_push($arrayDocument, $value);
                        }
                        foreach (explode('.pdf', $arrayDocument[4]) as $name) {
                            array_push($arraynameDocument, $name);
                        }
                    @endphp
                    <option value="{{ $arraynameDocument[0] }}">
                        {{ $arraynameDocument[0] }}
                    </option>
                @endforeach
            </optgroup>
        </select>
        <button wire:click="buscarDocumentos" class="btn btn-secondary rounded-end">Buscar</button>
    </div>
    <div class=" scrollbar" style="width:100%;overflow-y:scroll;position: relative">
        @if ($documentoView != 0)
            <embed src="{{ asset($documentoView) }}#" style="width: 100%;height:55vh;overflow-y:scroll"
                type="application/pdf" class="embebido scrollbar" />
            <div style="position: absolute; bottom:20px;right:20px">
                @if ($documento)
                    @livewire('juridico.auditoria.revision-documento')
                @endif
            </div>
        @endif
        @if ($documentoView === 0)
            <div class="d-flex justify-content-center">
                <h4 class="bg-secondary p-3 rounded">Sin documento adjunto</h4>
            </div>
        @endif
    </div>
</div>
