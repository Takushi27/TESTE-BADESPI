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
        $vaga->salario = str_replace(',', '.', $request->Salario);
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
        $vaga->salario = str_replace(',', '.', $request->Salario);

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
        try {
            $query = $request->input('query');

            $vagas = Vagas::query();

            if ($query) {
                $vagas->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('descrição', 'LIKE', "%{$query}%");
            }

            $results = $vagas->limit(10)->get();

            return response()->json($results);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'file'  => $e->getFile(),
                'line'  => $e->getLine()
            ], 500);
        }
    }
}