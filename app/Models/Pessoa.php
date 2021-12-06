<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id','pedido_id','quantidade','valor_unitario'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
}
