<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    //
    public function index(){
        return view ('auth.login');
    }

    public function authenticate(Request $request){
        $credensial= $request->validate([
                        'email'=>'required',
                        'email'=>'required'
                    ]);
        if (auth::attempt($credensial))
        {
            $request->session()->regenerate();
            return redirect()->intended('/SuperAdmin-dashboard');
        }
        return back()->with([
            'masukan lagi'
        ]);
    }
}
