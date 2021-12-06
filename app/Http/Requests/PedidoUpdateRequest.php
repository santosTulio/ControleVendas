<?php

namespace App\Http\Requests;

use App\Models\Vendedor;
use Illuminate\Foundation\Http\FormRequest;

class PedidoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Vendedor::where('user_id',$this->user()->id)->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cliente_id'=>'required|exists:pessoas,id',
            'vendedor_id'=>'required|exists:vendedores,id',
            'valorTotal'=>'required|numeric|gt:0',
            'produtos_pedidos'=>"required|array|min:1",
            'produtos_pedidos.*.id'=> 'nullable|exists:produtos,id',
            'produtos_pedidos.*.produto_id'=> 'required|exists:produtos,id',
            'produtos_pedidos.*.quantidade'=> 'required|integer|gt:0'
        ];
    }

}
