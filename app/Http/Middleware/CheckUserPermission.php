<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Auth;
class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        if(Auth::check() || $request->user != Auth::id()){
            return redirect('/home');
//            abort(403, "Brak dostępu");
//            view('errors.403');
        }
        return $next($request);
    }
}
