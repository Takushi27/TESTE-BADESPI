<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vagas;
use Illuminate\Support\Facades\Auth;

class VagaController extends Controller
{
    public function index(){
        $vagas = Vagas::all();
        return view('home', ['vagas'=> $vagas]);
    }
    public function create(){
        return view('create');
    }
     public function candidatar(){
        return view('candidaturas');
    }
    public function showRecrutadorVagas()
    {
        $userId = auth()->id();
        $vagas = Vagas::where('recrutadorid', $userId)->get();

        return view('vagasIndividual', ['vagas' => $vagas]);
    }
    public function store(Request $request){

        $vaga = new Vagas;

        $vaga->name = $request->title;
        $vaga->quantidade = $request->quantidade;
        $vaga->descrição = $request->descrição;
        $vaga->tipo = $request->tipo;
        $vaga->empresa = $request->Empresa;
        $salario = $request->salario;
        $salario = str_replace('.', '', $salario);
        $salario = str_replace(',', '.', $salario);
        $vaga->salario = is_numeric($salario) ? (float)$salario : null;
        $vaga->recrutadorid = auth()->id();


        $vaga->save();
        return redirect('/');

    }
    public function pause($id){
        $vaga = Vagas::findOrFail($id);

        $vaga->status = !$vaga->status;
        $vaga->save();

        return redirect()->back()->with('success', 'Status da vaga atualizado com sucesso');
    }
    public function delete($id){
        $vaga = Vagas::findOrFail($id);

        $vaga->delete();

        return redirect('/');
    }
    public function atualizar(Request $request, $id){
    
        $vaga = Vagas::findOrFail($id);

        $vaga->name = $request->title;
        $vaga->quantidade = $request->quantidade;
        $vaga->descrição = $request->descrição;
        $vaga->tipo = $request->tipo;
        $vaga->empresa = $request->Empresa;
        $salario = $request->salario;
        $salario = str_replace('.', '', $salario);
        $salario = str_replace(',', '.', $salario);
        $vaga->salario = is_numeric($salario) ? (float)$salario : 0;

        $vaga->save();

        return redirect('/')->with('success', 'Vaga atualizada com sucesso!');

    }
    public function edit($id)
    {
        $vaga = Vagas::findOrFail($id);
        return view('update', compact('vaga'));
    }
    public function search(Request $request)
    {
       $query = $request->input('query');

       $vagas =  Vagas::where('name', 'like', "%{$query}%")
                ->orWhere('descrição', 'like', "%{$query}%")
                ->orWhere('tipo', 'like', "%{$query}%")
                ->orWhere('empresa', 'like', "%{$query}%")
                ->get();

        
        return response()->json($vagas);
    }
}