<?php

use App\Http\Controllers\Auth\AuthApiController;
use App\Http\Controllers\PedidosApiController;
use App\Http\Controllers\ProdutosApiController;
use App\Http\Controllers\RelatorioPedidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthApiController::class, 'login']);
Route::group(['middleware'=>['auth:sanctum','permissaoVendedor']],function(){
    Route::resource('pedidos',PedidosApiController::class)->only(['index','update','show']);
    Route::resource('produtos',ProdutosApiController::class)->only(['index','update','show']);
    Route::get('relatorio/pedidos',[RelatorioPedidoController::class, 'index']);
});
