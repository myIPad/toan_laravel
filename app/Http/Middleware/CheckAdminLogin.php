<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckAdminLogin
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
        if(Auth::check())
            {
                $user = Auth::user();
                if($user->level==1||2){
                    return $next($request);
                }
                else{
                    return redirect()->route('admin.login.getlogin')->with('error','you can\'t access');
                }
            }
            else
                return redirect()->route('admin.login.getlogin')->with('error','you can\'t access');
    }

}
