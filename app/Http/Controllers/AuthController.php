<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if(!Auth::attempt($credentials)){
            return back()->withErrors(['password' => 'Wrong email or password']);
        }

        return redirect()->route('dashboard');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
