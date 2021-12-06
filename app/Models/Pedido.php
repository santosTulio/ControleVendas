<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id','vendedor_id','valorTotal'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $appends = ['produtos_pedidos'];
    protected $primaryKey = 'numero';

    public function getProdutosPedidosAttribute(){
        return $this->hasMany(PedidoProduto::class,'pedido_id')->get();
    }
}
