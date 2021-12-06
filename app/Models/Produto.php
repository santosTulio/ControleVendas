<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['codigo','nome','cor','descricao','valor'];
    protected $hidden = ['created_at','updated_at','deleted_at'];

}
