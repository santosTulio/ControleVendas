<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoUpdateRequest;
use App\Models\Pedido;

class PedidosApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pedido::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pedido::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PedidoUpdateRequest $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->validated());
        return Response($pedido,201);
    }
}
