<?php

namespace App\Http\Livewire\Colaborador;

use Livewire\WithFileUploads;
use Livewire\Component;


class FilesUpload extends Component
{
    use WithFileUploads;

    public $Identificacion;
    public $Curp;
    public $Nss;
    public $Comprobante_Domiclio;
    public $Acta_Naciminto;
    public $Rfc;
    public $Solicitud_Empleo;
    public $Estudio_Socio_Economico;
    public $Contrato_Digital;
    public $Foto;
    public $id_usuario;

    protected $rule=[
        'Identificacion'=>'required'
    ];

    protected $listeners = ['saveDocument' => 'guardarDocumentos'];

    public function guardarDocumentos($id)
    {
        try {
            $carpetaraiz = 'public/Colaboradores';
            $carpetaColaborador = $carpetaraiz . '/' . $id;
            $this->Identificacion->storeAs($carpetaColaborador, 'Identificacion.pdf');
            $this->Curp->storeAs($carpetaColaborador, 'CURP.pdf');
            $this->Nss->storeAs($carpetaColaborador, 'NSS.pdf');
            $this->Comprobante_Domiclio->storeAs($carpetaColaborador, 'Domicilio.pdf');
            $this->Acta_Naciminto->storeAs($carpetaColaborador, 'Acta_Nacimiento.pdf');
            $this->Rfc->storeAs($carpetaColaborador, 'RFC.pdf');
            $this->Solicitud_Empleo->storeAs($carpetaColaborador, 'Solicitud_Empleo.pdf');
            $this->Estudio_Socio_Economico->storeAs($carpetaColaborador, 'Estudio_Socieconomico.pdf');
            $this->Contrato_Digital->storeAs($carpetaColaborador, 'Contrato.pdf');
            $this->Foto->storeAs($carpetaColaborador, 'Foto.png');
            $this->emit('Registro', 'Se realizo el nuevo registro correctamente');
            $this->emit('insertCreate');
        } catch (\Throwable $th) {
            if ($th->getCode() == "0") {
                $this->emit('errorDocumentos', 'Se ha registrado el nuevo colaborador, pero falta su documentacion. Por favor agregala desde Consultar Persona');
            }
        }
    }

    public function render()
    {
        return view('livewire.colaborador.files-upload', ['msj' => 'Colaborador guardado exitosamente.']);
    }
}
