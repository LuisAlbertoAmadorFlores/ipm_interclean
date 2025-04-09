<div>
    {{-- @switch($rol)
        @case('Coordinador') --}}
            <div class="degradado-modal text-light p-3 rounded animate__animated  animate__backInUp">
                <div class="modal-content">
                    <div class="modal-header mb-2 d-flex justify-content-between">
                        <h5 class="modal-title" id="modalTitleId">
                            ¡Aviso Importante!
                        </h5>
                        <button type="button" class="btn-close bg-light p-2" id="CerrarAvisos"></button>
                    </div>
                    <div class="modal-body">
                        <embed src="{{ asset('img/aviso_capacitacion.png') }}" type="" width="600" height="auto">
                    </div>
                </div>
            </div>
        {{-- @break --}}

        {{-- @case('Sistemas')
            <div class="degradado-modal text-light p-3 rounded animate__animated  animate__backInUp">
                <div class="modal-content">
                    <div class="modal-header mb-2 d-flex justify-content-between">
                        <h5 class="modal-title" id="modalTitleId">
                            ¡Aviso Importante!
                        </h5>
                        <button type="button" class="btn-close bg-light p-2" id="CerrarAvisos"></button>
                    </div>
                    <div class="modal-body">

                        
                        <h4>Estimado Colaborador!</h4>
                       
                        <p>Porfavor presentarse en Recursos Humanos para la firma de sus contratos bajo los siguientes horarios.
                        </p>
                    </div>
                </div>
            </div>
        @break

        @default
    @endswitch --}}



</div>
