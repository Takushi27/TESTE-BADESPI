<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

class CadastrarController extends Controller
{
    public function cadastrar(Request $request){

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
