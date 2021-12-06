<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoteProduto extends Model
{
    use HasFactory;

    protected $fillable = ['codigo','produto_id','quantidadeProduto','dataFabricacao'];
}
