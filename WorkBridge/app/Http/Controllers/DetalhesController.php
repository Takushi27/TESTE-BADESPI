<?php

namespace App\Http\Controllers;
use App\Models\Vagas;


class DetalhesController extends Controller
{
    public function detalhar(){
        return view('detalhes');
    }
    public function detalhes()
    {
    $vagas = Vagas::all();
    return view('detalhes', ['vagas' => $vagas]);
    }   
    public function show($id){
        $vaga = Vagas::findOrFail($id);
        return view('detalhes', ['vaga' => $vaga]);
    }
}
