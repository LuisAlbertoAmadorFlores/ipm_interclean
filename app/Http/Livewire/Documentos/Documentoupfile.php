<?php

namespace App\Http\Livewire\Documentos;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class Documentoupfile extends Component
{
    use WithFileUploads;

    //tabla documentos
    public $Identificacion;
    public $Curp;
    public $Nss;
    public $Comprobante_Domiclio;
    public $Acta_Naciminto;
    public $Rfc;
    public $Solicitud_Empleo;
    public $Estudio_Socio_Economico;
    public $Contrato_Digital;
    public $caratula;
    public $Foto;

    public $complemento;
    public $complemento_nombre;
    public $id_usuario;

    public $data;

    protected $listeners = ['detallesDocumentos' => 'asigan', 'updateListDocument' => 'mount'];

    protected $rule = [
        'Identificacion' => 'required'
    ];

    public function asigan($id)
    {
        $this->id_usuario = $id;
        $this->data = DB::table('documentos')->where('documentos.id_usuario', '=', $this->id_usuario)->get();
    }

    public function guardarDocumentos()
    {
        $carpetaraiz = 'public/Colaboradores/' . $this->id_usuario;
        $otros = $carpetaraiz . '/Otros/';
        try {
            if ($this->Identificacion != null) {
                try {
                    $this->Identificacion->storeAs($carpetaraiz, 'Identificacion.pdf');
                    DB::table('documentos')->where('id_usuario', $this->id_usuario)
                        ->update([
                            'Identificacion' => '1',
                        ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
            if ($this->Curp != null) {
                try {
                    $this->Curp->storeAs($carpetaraiz, 'CURP.pdf');
                    DB::table('documentos')->where('id_usuario', $this->id_usuario)
                        ->update([
                            'CURP' => '1',
                        ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
            if ($this->Nss != null) {
                try {
                    $this->Nss->storeAs($carpetaraiz, 'NSS.pdf');
                    DB::table('documentos')->where('id_usuario', $this->id_usuario)
                        ->update([
                            'NSS' => '1',
                        ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
            if ($this->Comprobante_Domiclio != null) {
                try {
                    $this->Comprobante_Domiclio->storeAs($carpetaraiz, 'Comprobante_Domiclio.pdf');
                    DB::table('documentos')->where('id_usuario', $this->id_usuario)
                        ->update([
                            'Comprobante_Domiclio' => '1',
                        ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
            if ($this->Acta_Naciminto != null) {
                try {
                    $this->Acta_Naciminto->storeAs($carpetaraiz, 'Acta_Naciminto.pdf');
                    DB::table('documentos')->where('id_usuario', $this->id_usuario)
                        ->update([
                            'Acta_Naciminto' => '1',
                        ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
            if ($this->Rfc != null) {
                try {
                    $this->Rfc->storeAs($carpetaraiz, 'RFC.pdf');
                    DB::table('documentos')->where('id_usuario', $this->id_usuario)
                        ->update([
                            'Rfc' => '1',
                        ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
            if ($this->Solicitud_Empleo != null) {
                try {
                    $this->Solicitud_Empleo->storeAs($carpetaraiz, 'Solicitud_Empleo.pdf');
                    DB::table('documentos')->where('id_usuario', $this->id_usuario)
                        ->update([
                            'Solicitud_Empleo' => '1',
                        ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
            if ($this->Contrato_Digital != null) {
                try {
                    $this->Contrato_Digital->storeAs($carpetaraiz, 'Contrato_Digital.pdf');
                    DB::table('documentos')->where('id_usuario', $this->id_usuario)
                        ->update([
                            'Contrato_Digital' => '1',
                        ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
            if ($this->caratula != null) {
                try {
                    $this->caratula->storeAs($carpetaraiz, 'Caratula_Banco.pdf');
                    DB::table('documentos')->where('id_usuario', $this->id_usuario)
                        ->update([
                            'Caratula_Banco' => '1',
                        ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
            if ($this->Foto != null) {
                try {
                    $this->Foto->storeAs($carpetaraiz, 'Foto.jpg');
                    DB::table('documentos')->where('id_usuario', $this->id_usuario)
                        ->update([
                            'Foto' => '1',
                        ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            }

            if ($this->complemento != null) {
                try {
                    $this->complemento->storeAs($otros, $this->complemento_nombre . '.pdf');
                    DB::table('documentos')->where('id_usuario', $this->id_usuario)
                        ->update([
                            'Otro' => '1',
                        ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
            $this->emit('errorDocumentos', 'Documento(s) cargado(s) con exito.');
        } catch (\Throwable $th) {
            if ($th->getCode() == "0") {
                $this->emit('errorDocumentos', $th->getMessage());
            } else {
                $this->emit('errorDocumentos', $th->getMessage());
            }
        }
        $this->emit('updateTableDocumentos');
        return redirect()->route('files');
    }

    public function render()
    {
        return view('livewire.documentos.documentoupfile', ['listdocumentos' => $this->data]);
    }
}
