<div>
    <div class="h4 text-start mb-3 border-bottom">@foreach ($nombre as $item)
        Colaborador: {{$item->Nombre}} {{$item->Apellido_Paterno}} {{$item->Apellido_Materno}}
    @endforeach</div>
    <div class="d-flex flex-column justify-content-start mb-5 border-bottom">
        <div class="d-flex">
            @switch($statusIdentificacion)
                @case('Correcto')
                    <i class="fa-solid fa-check fa-2x me-2"></i>
                @break

                @case('Revision')
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
                @break

                @case('Comentario')
                    <i class="fa-solid fa-exclamation fa-2x me-2"></i>
                @break

                @default
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
            @endswitch

            <h3>INE</h3>
        </div>
        <div class="text-start mt-2">
            <label for="">Estatus: {{ $statusIdentificacion }}</label><br>
            <label for="">Observacion</label><br>
            <span>{{ $comentarioIdentificacion }}</span>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-start mb-5 border-bottom">
        <div class="d-flex">
            @switch($statusCURP)
                @case('Correcto')
                    <i class="fa-solid fa-check fa-2x me-2"></i>
                @break

                @case('Revision')
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
                @break

                @case('Comentario')
                    <i class="fa-solid fa-exclamation fa-2x me-2"></i>
                @break

                @default
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
            @endswitch
            <h3>CURP</h3>
        </div>
        <div class="text-start mt-2">
            <label for="">Estatus: {{ $statusCURP }}</label><br>
            <label for="">Observacion</label><br>
            <span>{{ $comentarioCURP }}</span>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-start mb-5 border-bottom">
        <div class="d-flex">
            @switch($statusNSS)
                @case('Correcto')
                    <i class="fa-solid fa-check fa-2x me-2"></i>
                @break

                @case('Revision')
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
                @break

                @case('Comentario')
                    <i class="fa-solid fa-circle-exclamation fa-2x me-2"></i>
                @break

                @default
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
            @endswitch
            <h3>NSS</h3>
        </div>
        <div class="text-start mt-2">
            <label for="">Estatus: {{ $statusNSS }}</label><br>
            <label for="">Observacion</label><br>
            <span>{{ $comentarioNSS }}</span>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-start mb-5 border-bottom">
        <div class="d-flex">
            @switch($statusComprobanteDomicilio)
                @case('Correcto')
                    <i class="fa-solid fa-check fa-2x me-2"></i>
                @break

                @case('Revision')
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
                @break

                @case('Comentario')
                    <i class="fa-solid fa-circle-exclamation fa-2x me-2"></i>
                @break

                @default
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
            @endswitch
            <h3>Comprobante de Domicilio</h3>
        </div>
        <div class="text-start mt-2">
            <label for="">Estatus: {{ $statusComprobanteDomicilio }}</label><br>
            <label for="">Observacion</label><br>
            <span>{{ $comentarioComprobante }}</span>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-start mb-5 border-bottom">
        <div class="d-flex">
            @switch($statusActa_Nacimiento)
                @case('Correcto')
                    <i class="fa-solid fa-check fa-2x me-2"></i>
                @break

                @case('Revision')
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
                @break

                @case('Comentario')
                    <i class="fa-solid fa-circle-exclamation fa-2x me-2"></i>
                @break

                @default
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
            @endswitch
            <h3>Acta de Nacimiento</h3>
        </div>
        <div class="text-start mt-2">
            <label for="">Estatus: {{ $statusActa_Nacimiento }}</label><br>
            <label for="">Observacion</label><br>
            <span>{{ $comentarioActa }}</span>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-start mb-5 border-bottom">
        <div class="d-flex">
            @switch($statusRFC)
                @case('Correcto')
                    <i class="fa-solid fa-check fa-2x me-2"></i>
                @break

                @case('Revision')
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
                @break

                @case('Comentario')
                    <i class="fa-solid fa-circle-exclamation fa-2x me-2"></i>
                @break

                @default
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
            @endswitch
            <h3>RFC</h3>
        </div>
        <div class="text-start mt-2">
            <label for="">Estatus: {{ $statusRFC }}</label><br>
            <label for="">Observacion</label><br>
            <span>{{ $comentarioRFC }}</span>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-start mb-5 border-bottom">
        <div class="d-flex">
            @switch($statusCV)
                @case('Correcto')
                    <i class="fa-solid fa-check fa-2x me-2"></i>
                @break

                @case('Revision')
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
                @break

                @case('Comentario')
                    <i class="fa-solid fa-circle-exclamation fa-2x me-2"></i>
                @break

                @default
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
            @endswitch
            <h3>Solicitud de Empleo</h3>
        </div>
        <div class="text-start mt-2">
            <label for="">Estatus: {{ $statusCV }}</label><br>
            <label for="">Observacion</label><br>
            <span>{{ $comentarioCV }}</span>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-start mb-5 border-bottom">
        <div class="d-flex">
            @switch($statusContrato)
                @case('Correcto')
                    <i class="fa-solid fa-check fa-2x me-2"></i>
                @break

                @case('Revision')
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
                @break

                @case('Comentario')
                    <i class="fa-solid fa-circle-exclamation fa-2x me-2"></i>
                @break

                @default
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
            @endswitch
            <h3>Contrato Digital</h3>
        </div>
        <div class="text-start mt-2">
            <label for="">Estatus: {{ $statusContrato }}</label><br>
            <label for="">Observacion</label><br>
            <span>{{ $comentarioContrato }}</span>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-start mb-5 border-bottom">
        <div class="d-flex">
            @switch($statusCaratulaBanco)
                @case('Correcto')
                    <i class="fa-solid fa-check fa-2x me-2"></i>
                @break

                @case('Revision')
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
                @break

                @case('Comentario')
                    <i class="fa-solid fa-circle-exclamation fa-2x me-2"></i>
                @break

                @default
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
            @endswitch
            <h3>Caratula Banco</h3>
        </div>
        <div class="text-start mt-2">
            <label for="">Estatus: {{ $statusCaratulaBanco }}</label><br>
            <label for="">Observacion</label><br>
            <span>{{ $comentarioBanco }}</span>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-start mb-5 border-bottom">
        <div class="d-flex">
            @switch($statusFoto)
                @case('Correcto')
                    <i class="fa-solid fa-check fa-2x me-2"></i>
                @break

                @case('Revision')
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
                @break

                @case('Comentario')
                    <i class="fa-solid fa-circle-exclamation fa-2x me-2"></i>
                @break

                @default
                    <i class="fa-solid fa-hourglass-start fa-2x me-2"></i>
            @endswitch
            <h3>Foto</h3>
        </div>
        <div class="text-start mt-2">
            <label for="">Estatus: {{ $statusFoto }}</label><br>
            <label for="">Observacion</label><br>
            <span>{{ $comentarioFoto }}</span>
        </div>
    </div>
</div>
