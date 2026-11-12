<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // 1. Belum login? Arahkan ke halaman login
        if (! $user) {
            return redirect()->route('login');
        }

        // 2. Sudah login, tapi perannya tidak ada di daftar? Tolak
        if (! $user->hasRole(...$roles)) {
            abort(403, 'error', 'Akses ditolak! Anda tidak memiliki hak akses.');
        }

        // 3. Lolos: lanjut ke controller
        return $next($request);
    }
}
