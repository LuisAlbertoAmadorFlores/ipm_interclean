<?php

namespace App\Http\Controllers;

use App\Models\cedisModel;
use Illuminate\Http\Request;
use DB;
use File;

class CedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            $datos = new cedisModel();
            $datos->Proyecto = $request->Proyecto;
            $datos->Region = $request->Region;
            $datos->Nombre = $request->Nombre;
            $datos->Estado = $request->Estado;
            $datos->Municipio = $request->Municipio;
            $datos->Responsable = $request->Responsable;
            $datos->Telefono = $request->Telefono;
            $datos->Correo = $request->Mail;
            $datos->save();
            if ($datos->id > 0) {
                $this->createFolder($datos->id);
                return redirect()->route('cedis');
            }

            
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function createFolder($id)
    {

        $path = 'storage/cedis/';
        // if (!File::exists($path)) {
        File::makeDirectory($path . '/' . $id, 0755, true, true);
        File::makeDirectory($path . '/' . $id . '/Incidencias', 0755, true, true);
        // }
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
