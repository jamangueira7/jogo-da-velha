<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class CheckLogin
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
        $nao_logado = [
            '/login',
            '/logar',
            '/criar-user',
            '/cadastro',
            ];

        //dd(session('login'), $request->getRequestUri());

        if(empty(session('login')) &&  !in_array($request->getRequestUri(), $nao_logado)){
            return redirect('login');
        }

        if(!empty(session('login')) &&  in_array($request->getRequestUri(), $nao_logado)){
            return redirect('/');
        }

        return $next($request);
    }
}
