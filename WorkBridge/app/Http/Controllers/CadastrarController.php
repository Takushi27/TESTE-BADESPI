<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

class CadastrarController extends Controller
{
    public function cadastrar(Request $request){

        $request->validate([
            'email'=>'required|email|unique:usuarios,email',
            'name'=>'required|string|max:255',
            'senha'=>'required|min:6',
        ],[
            'email.unique' => 'Este e-mail já está cadastrado.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Digite um e-mail válido.',
        ]);

        $usuarios = new Usuarios;

        $usuarios->name = $request->name;
        $usuarios->email = $request->email;
        $usuarios->senha = Hash::make($request->senha);
        $usuarios->recrutador = $request->recrutador;

        $usuarios->save();
        return redirect('/login');

    }
    public function cadastro(){
        return view('/cadastrar');
    }
}
