<?php

namespace App\Http\Livewire\Colaborador;

use Livewire\Component;
use DB;
use function Ramsey\Uuid\v1;

class EditarLaboral extends Component
{
    public $data;
    public $puesto;
    public $salario;
    public $Bono;
    public $RFC;
    public $NSS;
    public $SMN;
    public $CEDIS;
    public $Zona;
    public $CURP;
    public $banco;
    public $clabe_interbancaria;
    public $numeroCuenta;
    public $numeroTarjeta;
    public $emergencia_nombre;
    public $emergencia_telefono;
    public $emergencia_parentesco;
    public $Fecha_ingreso;
    public $Estudios;
    public $Modalidad;
    public $Vigencia;

    public $Descuento_Nomina;
    public $creditoInfonavit;
    public $Discapacidad;
    public $idColaborador;

    public function mount($id)
    {
        $this->data = DB::table('complementos')->where('id_colaborador', $id)->join('proyectos', 'proyectos.idProyecto', 'complementos.Proyecto_Asignado')->get();
        $this->puesto = $this->data[0]->Puesto;
        $this->salario = $this->data[0]->Salario;
        $this->Bono = $this->data[0]->Bono;
        $this->RFC = $this->data[0]->RFC;
        $this->NSS = $this->data[0]->NSS;
        $this->SMN = $this->data[0]->SMN;
        $this->Zona = $this->data[0]->Zona;
        $this->CEDIS = $this->data[0]->Nombre_Corto_Proyecto;
        $this->banco = $this->data[0]->Banco;
        $this->clabe_interbancaria = $this->data[0]->Clave_Interbancaria;
        $this->numeroCuenta = $this->data[0]->Numero_Cuenta;
        $this->numeroTarjeta = $this->data[0]->Numero_Tarjeta;
        $this->Fecha_ingreso = $this->data[0]->Fecha_Ingreso;
        $this->emergencia_nombre = $this->data[0]->Emergencia_Nombre;
        $this->emergencia_telefono = $this->data[0]->Emergencia_Telefono;
        $this->emergencia_parentesco = $this->data[0]->Emergencia_Parentesco;
        $this->NSS = $this->data[0]->NSS;
        $this->CURP = $this->data[0]->CURP;
        $this->Estudios = $this->data[0]->Estudios;
        $this->Modalidad = $this->data[0]->Modalidad;
        // $this->Vigencia = $this->data[0]->Vigencia;
        $this->Descuento_Nomina = $this->data[0]->Descuento_Nomina;
        $this->creditoInfonavit = $this->data[0]->Credito_Infonavit_Fonacot;
        $this->Discapacidad = $this->data[0]->Discapacidad;
        $this->idColaborador = $this->data[0]->id_colaborador;
    }

    public function save()
    {   
       

        DB::table('complementos')->where('id_colaborador', $this->idColaborador)
            ->update([
                // 'Zona' => $this->Zona,
                // 'Proyecto_Asignado' => $this->CEDIS,
                'Puesto' => $this->puesto,
                'Salario' => $this->salario,
                'Bono'=>$this->Bono,
                'RFC' => $this->RFC,
                'NSS' => $this->NSS,
                'CURP' => $this->CURP,
                'SMN' => $this->SMN,
                'Fecha_Ingreso'=> $this->Fecha_ingreso,
                'Emergencia_Telefono'=>$this->emergencia_telefono,
                'Emergencia_Nombre'=>$this->emergencia_nombre,
                'Emergencia_Parentesco'=>$this->emergencia_parentesco,
                'Estudios' => $this->Estudios,
                'Modalidad' => $this->Modalidad,
                'Descuento_Nomina' => $this->Descuento_Nomina,
                'Credito_Infonavit_Fonacot' => $this->creditoInfonavit,
                'Discapacidad' => $this->Discapacidad,
                'Banco'=>$this->banco,
                'Clave_Interbancaria'=>$this->clabe_interbancaria,
                'Numero_Cuenta'=>$this->numeroCuenta,
                'Numero_Tarjeta'=>$this->numeroTarjeta
            ]);
        $this->emit('Laborales', 'Los datos se han actualizado correctamente.');
        return redirect()->route('consultaColaborador');
    }

    public function render()
    {
        return view('livewire.colaborador.editar-laboral', ['Colaborador' => $this->data[0]]);
    }
}
