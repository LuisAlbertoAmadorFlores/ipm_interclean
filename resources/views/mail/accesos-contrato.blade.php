<div>
    <style>
        .header,
        .footer {
            background: #2698bd;
            height: 5vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div style="background:#faf9f6;">
        <div style="background: #2698bd;
            padding: 1rem 0;text-align: center">
            <img src="http://intranetipm.ddns.net:5000/lala/public/img/logo.png" alt="" width="200px"
                height="auto">
            <h4 style="color: #ffff;text-align:center">Estimado(a):</h4>
        </div>
        <div style="background:#faf9f6;margin-top: 2rem;color:black;text-align:center">
            Te hacemos llegar tus accesos para que puedas generar la celebracion de tu contrato en acompañamiento de
            unos de nuestros administrativos.
            <div style="margin-top: 2rem">
                Usuario: {{$correo}} <br>
                Contraseña:12345678{{ $idColaborador }}
            </div>
            <div style="margin-top: 2rem">
                <a href="http://intranetipm.ddns.net:5000/manage_contract/prosman/"
                style="margin-top: 1rem;border:solid 1px orange;background:orange;color:#000000;padding:1rem 2rem">Firmar
                Contrato</a>
            </div>
            
        </div>
        <div style="background: #2698bd; padding: 2rem 0;text-align: center">
            <a href="http://www.prosman.com.mx" style="color: #ffff">www.prosman.com.mx</a>
        </div>
    </div>

</div>
