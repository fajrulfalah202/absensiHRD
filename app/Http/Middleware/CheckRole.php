<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle(Request $request, Closure $next, $role)
    {
        \Log::info('Middleware CheckRole dijalankan', ['role' => $role, 'user_role' => Auth::user()->role]);
        // Pastikan pengguna sudah login
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/'); // Arahkan ke halaman lain jika tidak memiliki role yang benar
        }

        return $next($request);
    }
}
