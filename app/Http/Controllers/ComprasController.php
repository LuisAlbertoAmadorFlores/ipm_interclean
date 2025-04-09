<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    private function code()
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < 8; $i++) $key .= $pattern[mt_rand(0, $max)];
        $codigo = DB::table('compras')->where('Codigo_Asociativo', $key)->first();
        if ($codigo != null) {
            $this->code();
        } else {
            return $key;
        }
    }

    public function index(Request $request)
    {
        $misOrdenes = DB::table('compras')->paginate(15);
        return view('compras.allOrders', ['codigo' => $this->code(), 'misordenes' => $misOrdenes]);
    }

    public function indexContabilidad(Request $request)
    {
        $misOrdenes = DB::table('compras')->join('users', 'compras.Solicitante', 'users.id')->paginate(15);
        return view('compras.Orders', ['codigo' => $this->code(), 'misordenes' => $misOrdenes]);
    }

    public function  newOrder(Request $request)
    {
        return view('compras.newOrder', ['codigo' => $request->codigo]);
    }

    public function generateEstatus($codifo)
    {
        $orden = DB::table('compras')->where('Codigo_Asociativo', $codifo);
        $totalItems = DB::table('compras_items')->where('Codigo_Asociativo', $codifo)->get();
        return view('compras.estatusCompra', ['detalles' => $orden, 'items' => $totalItems, 'codigo' => $codifo]);
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

        $requisicion = DB::table('compras')->where('codigo_asociativo', $id)->get();
        $data = DB::table('compras_items')->where('codigo_asociativo', $id)->paginate(15);

        return view('compras.showIdOrder', ['data' => $data, 'compra' => $requisicion]);
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
    public function destroy(Request $request)
    {
        try {
            DB::table('compras')->where('idcompras', $request->id)->update(['Status' => 'Cancelado']);
            return redirect()->route('viewallOrder');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
