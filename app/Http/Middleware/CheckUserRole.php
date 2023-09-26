<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Mendapatkan pengguna yang saat ini masuk
        $user = Auth::user();

        // Memeriksa apakah pengguna memiliki salah satu dari peran yang sesuai
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki peran yang sesuai, Anda dapat melakukan tindakan seperti mengarahkan mereka ke halaman tertentu atau memberikan pesan kesalahan
        abort(403, 'Akses Dilarang');
    }
}
