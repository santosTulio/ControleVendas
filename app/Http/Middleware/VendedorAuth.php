<?php

namespace App\Http\Middleware;

use App\Models\Vendedor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendedorAuth{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if (Auth::guard('sanctum')->check() && Vendedor::where('user_id',Auth::id())->exists()) {
            return $next($request);
        } else {
            $message = ["message" => "Permission Denied"];
            return response($message, 401);
        }
    }
}
