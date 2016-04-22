<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckRole
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

        if ($request->user() === null) {
            //return response()->view('errors.401');
            Session::flash('mistake', 'У вас нет прав доступа к этой странице');
            return redirect('/');
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if ($request->user()->hasAnyRole($roles) /*|| !$roles*/) {
            return $next($request);
        }
        Session::flash('mistake', 'У вас нет прав доступа к этой странице');
        return redirect('/');
    }
}
