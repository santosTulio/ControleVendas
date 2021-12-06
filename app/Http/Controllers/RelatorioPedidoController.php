<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RelatorioPedidoController extends Controller
{
    public function index(Request $request){

        $validated = Validator::make([
            'perPage'=>$request->input('perPage',5),
            'orderby'=>$request->input('orderby','data'),
            ],[
                'perPage'=>'integer|gte:1',
                'orderby'=>'in:data,valor,-valor,-data'
            ])->validate();
        $pedidos = Pedido::paginate($validated['perPage'])->withQueryString();
        if($validated['orderby']=='valor'){
            return $pedidos->sortby('valorTotal');
        }elseif($validated['orderby']=='data'){
            return $pedidos->sortby('created_at');
        }
        return $pedidos;
    }
}
