<div>
    <table class="table table-hover ">
        <thead class="pb-3 text-dark">
            <tr>
                <th class=""># TICKET</th>
                <th class="">Problematica</th>
                <th class="">Departamento</th>
                <th class="">Estatus</th>
                <th class="">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @isset($Alltickets)
                @if (count($Alltickets) > 0)
                    @foreach ($Alltickets as $ticket)
                        <tr>
                            <td class="text-capitalize">{{ $ticket->Ticket }}</td>
                            <td>{{ $ticket->Problematica }}
                            </td>
                            <td>
                                {{ $ticket->Involucrados }}</td>
                            <td>@php
                                if ($ticket->Respuesta == 'Sin respuesta') {
                                    echo "<span class='bg-danger px-2 py-1 rounded text-light'>Sin respuesta</span>";
                                } else {
                                    echo "<span class='bg-success px-2 py-1 rounded text-light'>Atendido</span>";
                                }
                            @endphp</td>

                            <td>
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#comentario{{ $ticket->Ticket }}">
                                    <i class="fa-solid fa-comment"></i> Descripción
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="comentario{{ $ticket->Ticket }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                        role="document">
                                        <div class="modal-content text-light degradado-modal">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">
                                                    Descripcion
                                                </h5>
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">{{ $ticket->Comentario }}</div>
                                        </div>
                                    </div>
                                </div>
                                @if ($ticket->Respuesta != 'Sin respuesta')
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#respuesta{{ $ticket->Ticket }}">
                                        <i class="fa-solid fa-envelopes-bulk"></i> Respuesta
                                    </button>
                                @endif


                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="respuesta{{ $ticket->Ticket }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                        role="document">
                                        <div class="modal-content text-light degradado-modal">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">
                                                    Respuesta
                                                </h5>
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <embed
                                                    src="https://mail.google.com/mail/u/0/#inbox/WhctKLbVkhxNNQfNDSxSJvRkJHkCbWrcrWCFVCHjZThbfnjFjWknRcqxmJVHLGHXwwfNDDL"
                                                    type="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Sin tickets registrados</td>
                    </tr>
                @endif
            </tbody>
        </table>{{ $Alltickets->links() }}
    @endisset
</div>
