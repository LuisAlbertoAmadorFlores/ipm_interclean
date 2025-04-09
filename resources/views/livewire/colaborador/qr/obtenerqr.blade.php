<div>
    @if ($qr == true)
        <div class="d-flex justify-content-center flex-column position-absolute bottom-0 end-0 me-4 mb-4 bg-warning p-2 rounded animate__animated animate__backInUp" id="qr">
            {!! QrCode::size(110)->margin(1)->generate('http://intranetipm.ddns.net:5000/lala/public/fichatecnica/' . $idColaborador) !!}
            <button class="btn btn-dark mt-2" wire:click="showWR()">Ocultar QR</button>
        </div>
    @else
        <div>
            <button class="btn btn-warning position-absolute bottom-0 end-0 me-4 mb-4" wire:click="showWR()"><i
                    class="fa-solid fa-qrcode"></i> Ver QR</button>
        </div>
    @endif
</div>
