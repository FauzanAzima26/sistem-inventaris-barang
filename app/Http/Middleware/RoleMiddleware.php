<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $role = $user->role ?? Session::get('role'); // pakai user->role dulu, fallback ke session

        // Jika editor, batasi akses beberapa route
        if ($role === 'editor') {
            // Ambil nama route yang sedang diakses
            $currentRouteName = $request->route()->getName();

            // Daftar route yang dibatasi untuk editor
            $restrictedPages = [
                'managemen-user.index',
                'managemen-user.create',
                'managemen-user.edit',
                'managemen-user.destroy',
                'pengaturan.index',
                'pengaturan.edit',
            ];

            if (in_array($currentRouteName, $restrictedPages)) {
                abort(403, 'Unauthorized'); // redirect otomatis 403
            }
        }

        // Admin bebas, editor terbatas
        return $next($request);
    }
}
