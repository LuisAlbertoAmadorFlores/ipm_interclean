<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class historialBajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('bajas')
            ->join('colaborador', 'colaborador.idColaborador', 'bajas.idColaborador')
            ->join('users', 'users.id', 'bajas.idTurno_Juridico')
            ->select('name', 'Nombre', 'Apellido_Paterno', 'Apellido_Materno', 
            'Fecha_Baja', 'bajas.created_at', 'bajas.idColaborador', 
            'idTurno_Contabilidad', 'idTurno_Coordinador','bajas.Fecha_Asignado','idBajas','Fecha_Pago_Finiquito','Finiquito_Negociado','Fecha_Cal_Finiquito')
            ->where('colaborador.Status', '1')->get();
        
        return view('livewire.juridico.historial-bajas.historial', ['bajas' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
