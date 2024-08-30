<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    //
    private function getDummyUsers()
    {
        return [
            ['username' => 'user1', 'password' => 'akutan'],
            ['username' => 'user2', 'password' => 'password2'],
            // Tambahkan pengguna lainnya sesuai kebutuhan
        ];
    }

    public function form(){
        return view ('auth.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $users = collect($this->getDummyUsers());
        $user = $users->firstWhere('username', $request->username);


        if ($user && $user['password'] === $request->password) {
            // Simpan informasi login di session
            session(['user' => $user]);
            // dd(session()->all());
            return redirect()->route('SA-dashboard'); // Ganti dengan route dashboard Anda
        } else {
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }
}

