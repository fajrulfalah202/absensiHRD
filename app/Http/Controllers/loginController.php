<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    // Tampilkan form login
    public function form()
    {
        return view('auth.login'); // Pastikan view ini ada di folder 'resources/views/auth/login.blade.php'
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Autentikasi dengan username dan password
        $credentials = $request->only('username', 'password');

        $user = User::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return $this->authenticated($request, $user);
        } else {
            // Jika autentikasi gagal
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    // Arahkan pengguna setelah login berdasarkan role
    protected function authenticated(Request $request, $user)
    {
        // dd($user->role);
        switch ($user->role) {
            case 'super_admin':
                return redirect()->route('SA-dashboard');
            case 'admin':
                return redirect()->route('Admin-dashboard');
            case 'karyawan':
                return redirect()->route('Karyawan-dashboard');
            default:
                return redirect()->back()->with('error', 'Role tidak dikenali');
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login'); // Arahkan ke halaman login setelah logout
    }
}
