<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoUpdateApiRequest;
use App\Models\Produto;

class ProdutosApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Produto::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoUpdateApiRequest $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->validated());
        return Response($produto,201);
    }
}
