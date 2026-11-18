<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Cek apakah sudah login
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();

        // Cek apakah role user diizinkan
        if (!in_array($user->role, $roles, true)) {
            abort(403, 'Akses ditolak. Anda tidak memiliki hak akses sebagai Admin.');
        }

        return $next($request);
    }
}