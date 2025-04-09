<form wire:submit.prevent="guardarDocumentos" style="box-shadow:rgba(255, 255, 255, 0.507) 1px 1px 5px;" class="px-5">
    <div class="h5 text-light pt-4 pb-2 col-lg-12 mx-4"">
        Anexo de Documentos
    </div>
    <div class="row">
        <div class="col-lg-2 mb-3 ">
            <input class="form-control select-input border-0 rounded" type="file" id="identificacion"
                wire:model="Identificacion" accept=".pdf" required onchange="return validarExt()">

        </div>
        @error('Identificacion')
            <span class="error">{{ $message }}</span>
        @enderror
        <div class="col-lg-2 mb-3">
            <input class="form-control select-input border-0 rounded" type="file" name="doc_curp" id="curp"
                accept=".pdf" wire:model="Curp">
        </div>

        <div class="col-lg-2 mb-3">
            <input class="form-control select-input border-0 rounded" type="file" name="doc_nss" id="nss"
                accept=".pdf" wire:model="Nss">
        </div>

        <div class="col-lg-2  mb-3">
            <input class="form-control select-input border-0 rounded" type="file" name="doc_domicilio" id="domicilio"
                accept=".pdf" wire:model="Comprobante_Domiclio">
        </div>

        <div class="col-lg-2 mb-3">
            <input class="form-control select-input border-0 rounded" type="file" name="doc_acta" id="nacimiento"
                accept=".pdf" wire:model="Acta_Naciminto">
        </div>

        <div class="col-lg-2 mb-3">
            <input class="form-control select-input border-0 rounded" type="file" name="doc_rfc" id="RFC"
                accept=".pdf" wire:model="Rfc">
        </div>

        <div class="col-lg-2 mb-3">
            <input class="form-control select-input border-0 rounded" type="file" name="doc_empleo" id="Solicitud"
                accept=".pdf" wire:model="Solicitud_Empleo">
        </div>

        <div class="col-lg-2 mb-3">
            <input class="form-control select-input border-0 rounded" type="file" name="doc_llamada" id="Estudio_Socio_Economico"
                accept=".pdf" wire:model="Estudio_Socio_Economico">
        </div>

        <div class="col-lg-2 mb-3 ">
            <input class="form-control select-input border-0 rounded" type="file" name="doc_contrato" id="contrato"
                accept=".pdf" wire:model="Contrato_Digital">
        </div>

        <div class="col-lg-2 mb-3 ">
            <input class="form-control select-input border-0 rounded" type="file" name="doc_foto" id="foto"
                accept="image/png" wire:model="Foto">
        </div>
    </div>


</form>
