<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vagas;
use App\Models\Candidaturas;

class CandidaturasController extends Controller
{
    public function storeCandidaturas(Request $request)
    {


        $file = $request->file('curriculo');
        $fileContent = file_get_contents($file->getRealPath());


        $candidatura = new Candidaturas;
        $candidatura->name = auth()->user()->name;
        $candidatura->candidatoid = auth()->user()->id;
        $candidatura->vagaid = $request->vagaid;
        $candidatura->curriculo = $fileContent;

        $candidatura->save();
        return redirect('/');
    }
      public function candidatar($id){
        $vaga = Vagas::findOrFail($id);
        return view('candidaturas', compact('vaga'));
    }
    public function showCandidaturasIndividual()
    {
        $user = auth()->user();
        $candidaturas = $user->candidaturas()->with('vaga')->get();

        return view('candidaturasIndividual', compact('candidaturas'));
    }
    public function candidaturasDetalhes($id)
    {
        $vaga = Vagas::findOrFail($id);
        return view('update', compact('vaga'));
    }
    public function delete($id)
    {
        $candidatura = Candidaturas::findOrFail($id);

        if ($candidatura->candidatoid !== auth()->user()->id) {
            abort(403, 'Ação não autorizada.');
        }

        $candidatura->delete();

        return redirect('/')->with('success', 'Candidatura excluída com sucesso!');
    }
    public function listarCandidatos($id)
    {
        $vaga = Vagas::with('candidaturas')->findOrFail($id);
        return view('Candidatos', compact('vaga'));
    }
   public function download($id)
    {
        $candidatura = Candidaturas::findOrFail($id);

        $mime = $candidatura->mimetype ?? 'application/octet-stream';

        $filename = $candidatura->filename ?? 'curriculo';

        return response($candidatura->curriculo)
            ->header('Content-Type', $mime)
            ->header('Content-Disposition', 'attachment; filename="'.$filename.'"');
    }
}
