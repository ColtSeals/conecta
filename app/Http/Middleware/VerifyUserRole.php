<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyUserRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->hasRole('dispatcher') && !$user->userBattalion) {
            return redirect()->route('config.battalion');
        } elseif ($user && !$user->hasRole('dispatcher')) {
            return redirect()->route('dashboard'); // Ajuste para redirecionar para a página inicial adequada
        }

        return $next($request);
    }
}
