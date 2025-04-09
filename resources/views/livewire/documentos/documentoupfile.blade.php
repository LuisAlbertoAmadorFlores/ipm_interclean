<form wire:submit="guardarDocumentos" class="px-5">
    <div class="row">
        @if (Auth::user()->rol == 'Reclutador' ||
        Auth::user()->rol == 'Coordinador' ||
        Auth::user()->rol == 'Sistemas' ||
        Auth::user()->rol == 'Gerente')
            <div class="col-lg-6 mb-3 ">
            <label for="" class="text-light">Identificación</label>
            <input class="form-control select-input border-0 rounded" type="file" id="identificacion"
                wire:model="Identificacion" accept=".pdf">
        </div>
        <div class="col-lg-6 mb-3">
            <label for="" class="text-light">CURP</label>
            <input class="form-control select-input border-0 rounded" type="file" name="doc_curp" id="curp"
                accept=".pdf" wire:model="Curp">
        </div>

        <div class="col-lg-6 mb-3">
            <label for="" class="text-light">NSS</label>
            <input class="form-control select-input border-0 rounded" type="file" name="doc_nss" id="nss"
                accept=".pdf" wire:model="Nss">
        </div>

        <div class="col-lg-6  mb-3">
            <label for="" class="text-light">Comprobante de Domiclio</label>
            <input class="form-control select-input border-0 rounded" type="file" name="doc_domicilio" id="domicilio"
                accept=".pdf" wire:model="Comprobante_Domiclio">
        </div>

        <div class="col-lg-6 mb-3">
            <label for="" class="text-light">Acta de Naciemiento</label>
            <input class="form-control select-input border-0 rounded" type="file" name="doc_acta" id="nacimiento"
                accept=".pdf" wire:model="Acta_Naciminto">
        </div>

        <div class="col-lg-6 mb-3">
            <label for="" class="text-light">RFC</label>
            <input class="form-control select-input border-0 rounded" type="file" name="doc_rfc" id="RFC"
                accept=".pdf" wire:model="Rfc">
        </div>

        <div class="col-lg-6 mb-3">
            <label for="" class="text-light">Solicitud de Empleo</label>
            <input class="form-control select-input border-0 rounded" type="file" name="doc_empleo" id="Solicitud"
                accept=".pdf" wire:model="Solicitud_Empleo">
        </div>

        <div class="col-lg-6 mb-3 ">
            <label for="" class="text-light">Contrato Digital</label>
            <input class="form-control select-input border-0 rounded" type="file" name="doc_contrato" id="contrato"
                accept=".pdf" wire:model="Contrato_Digital" disabled>
        </div>


        <div class="col-lg-6 mb-3 ">
            <label for="" class="text-light">Caratula Contrato Banco</label>
            <input class="form-control select-input border-0 rounded" type="file" accept=".pdf"
                wire:model="caratula">
        </div>
        <div class="col-lg-6 mb-3 ">
            <label for="" class="text-light">Foto</label>
            <input class="form-control select-input border-0 rounded" type="file" name="doc_foto" id="foto"
                accept="image/*" wire:model="Foto">
        </div>
        @endif
        
        <div class="col-lg-12 mb-3">
            <label for="" class="text-light">Documento Complementario</label>
            <div class="col-lg-12 mb-3 input-group">
                <label for="" class="input-group-text">Nombre</label>
                <input type="text" name="" class="form-control" wire:model="complemento_nombre">
            </div>
            <input class="form-control select-input border-0 rounded" type="file" name="doc_foto"
                id="complemento" accept=".pdf" wire:model="complemento">
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div>
            <span class="text-light" wire:loading>Cargando información, porfavor espera...</span>
        </div>
        <div>
            <button type="submit" class="btn btn-success mb-3" data-bs-dismiss="modal" wire:loading.remove>Guardar</button>
        </div>
    </div>
</form>
