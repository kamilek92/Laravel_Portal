<?php

namespace App\Http\Middleware;

use Closure;
use App\Post;

class CheckPostPremission
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

        $post_exists = Post::where([
            'id'=>$request->post,
            'user_id'=>\Auth::id()
        ])->exists();


//        if(!\Auth::check() && !Post::where('id', $request->post)->where('user_id', \Auth::id())->exists){
         if(!\Auth::check() || !$post_exists)  {
//             return redirect('/home');
            abort(403, 'Brak dostępnu');
         }
        return $next($request);
    }
}
