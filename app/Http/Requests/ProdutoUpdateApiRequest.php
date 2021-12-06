<?php

namespace App\Http\Requests;

use App\Models\Vendedor;
use Illuminate\Foundation\Http\FormRequest;

class ProdutoUpdateApiRequest extends FormRequest
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
            'nome'=>'required|string|min:4',
            'codigo'=>'required|string|min:4',
            'cor'=>'required|string|min:4',
            'descricao'=>"nullable|string|min:4",
            'valor'=>"required|numeric|gte:0"
        ];
    }
}
