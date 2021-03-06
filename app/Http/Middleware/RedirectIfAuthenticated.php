<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            $role = Auth::user()->name;
            //dd($role);
            $categoria = explode('.', $role);
            switch ($categoria) {
                case 'admin':
                    return redirect()->route('admin');
                    break;
                case 'operador':
                    return redirect('/manter');
                    break;
                case 'categorias':
                    return redirect('/categoria');
                    break;
                case 'marcas':
                    return redirect('/marcas');
                    break;
                default:
                    return redirect('/home');
                    break;
            }
        }
        return $next($request);
    }
}
