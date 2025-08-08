@extends('layouts.main')

@section('title', 'Minhas Candidaturas')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Minhas Candidaturas</h1>
    <h5 id="sub-main">Veja as vagas que você já se candidatou</h5>
    
    <div class="row">
        @if($candidaturas->isEmpty())
            <p>Você ainda não se candidatou a nenhuma vaga.</p>
        @else
            @foreach($candidaturas as $candidatura)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candidatura->vaga->name ?? 'Vaga removida' }}</h5>
                            <p class="card-text"><strong>Quantidade:</strong> {{ $candidatura->vaga->quantidade ?? '-' }}</p>
                            <p class="card-text"><strong>Empresa:</strong> {{ $candidatura->vaga->empresa ?? '-' }}</p>
                            <p class="card-text"><strong>Tipo:</strong> {{ $candidatura->vaga->tipo ?? '-' }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                           <form action="{{ route('candidaturas.delete', $candidatura->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja desistir dessa vaga?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-custom-card w-100">Desistir da Vaga</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
