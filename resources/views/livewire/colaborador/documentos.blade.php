<div>
    <div class="d-flex rounded p-0" style="background: rgba(255, 255, 255, 0.199)">
        <div class="input-group w-75 mt-3 mb-3 mx-3">
            <label class="input-group-text bg-dark border-0 text-light" for="inputGroupSelect01">Documento</label>
            <select wire:model="documento" class="form-select" id="inputGroupSelect01">
                <option value="" selected>Elije un documento</option>
                <optgroup label="Documentación Basica">
                    <option value="Acta_Naciminto">Acta Nacimiento</option>
                    <option value="Identificacion">Identificacion Oficial</option>
                    <option value="NSS">NSS</option>
                    <option value="Comprobante_Domiclio">Comprobante de Domicilio</option>
                    <option value="RFC">RFC</option>
                    <option value="CURP">CURP</option>
                    <option value="Solicitud_Empleo">Solicitud de Empleo</option>
                    <option value="Caratula_Banco">Caratula de Banco</option>
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
        </div>
        <div class="w-25 mt-3 mb-3 me-3">
            <button wire:click="buscarDocumento" class="btn btn-primary w-100">Buscar</button>
        </div>
    </div>
    <div class="" style="width:100%">
        @if ($documentoView != 0)
            <embed src="{{ asset($documentoView) }}#" style="width: 100%;height:69vh" type="application/pdf"
                class="embebido mt-3" />
        @endif
        @if ($documentoView === 0)
            <div class="d-flex justify-content-center">
                <h4 class="bg-dark p-3 rounded">Sin documento adjunto</h4>
            </div>
        @endif
    </div>
</div>
