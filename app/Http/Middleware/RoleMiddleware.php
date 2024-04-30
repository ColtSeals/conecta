<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $roleArray = explode(',', str_replace(' ', '', $roles));

        // Permitir acesso direto se o usuário for superadmin
        if ($request->user() && $request->user()->hasRole('superadmin')) {
            return $next($request);
        }

        if (!$request->user() || !$request->user()->hasAnyRole($roleArray)) {
            return redirect('dashboard')->with('error', 'Você não tem permissão para acessar essa página.');
        }

        if (!Session::has('selectedRole') || !in_array(Session::get('selectedRole')[0], $roleArray)) {
            return redirect('dashboard')->with('error', 'Sua role selecionada não permite acesso a esta página.');
        }

        return $next($request);
    }

}
