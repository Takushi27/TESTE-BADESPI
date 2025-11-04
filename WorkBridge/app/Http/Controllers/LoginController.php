<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function autenticar(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

         $loginData = [
        'email' => $credentials['email'],
        'password' => $credentials['senha']
        ];

        if (Auth::attempt($loginData)) {
        $request->session()->regenerate();
        return redirect('/');
        }
        return back()->withInput()->with('status', 'Login Invalido');
    }
     public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
