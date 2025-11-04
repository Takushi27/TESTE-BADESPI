@extends('layouts.main')

@section('title', 'Detalhes da Vaga')

@section('content')

<div id="detalhes-vaga" class="container mt-5">
    @auth
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm p-4 border-0 rounded" style="background-color: #ffffff;">
                    <div class="card-body">
                        <h2 class="card-title mb-3" style="color: #333333;">{{ $vaga->name }}</h2>

                        <ul class="list-unstyled mb-4" style="color: #555555;">
                            <li><strong>Tipo:</strong> {{ $vaga->tipo }}</li>
                            <li><span style="text-align: justify; display: block;"><strong>Descrição:</strong> {{ $vaga-> descrição }}</span></li>
                            <li><strong>Vagas:</strong> {{ $vaga->quantidade }}</li>
                            <li><strong>Salário:</strong> R$ {{ number_format($vaga->salario, 2, ',', '.') }}</li>
                            <li><strong>Empresa:</strong> {{ $vaga->empresa }}</li>
                        </ul>
                        <ul>
                            <li><strong>Status:</strong> {{ $vaga->status ? 'Ativo' : 'Inativo' }}</li>
                            <li><strong>Criador:</strong> {{ $vaga->recrutador->name }}</li>
                        </ul>
                        <div class="d-flex flex-column gap-2 mt-3">
                            @if(strtolower(auth()->user()->recrutador) === 'sim')
                                @if((auth()->user()->id) === $vaga->recrutadorid)
                                    <form action="{{ route('vagas.pause', $vaga->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-light border text-dark w-100" >
                                            {{ $vaga->status ? 'Pausar Vaga' : 'Ativar Vaga' }}
                                        </button>
                                    </form>
                                     <form action="{{ route('vagas.delete', $vaga->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja desistir dessa vaga?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-light border text-dark w-100">Deletar Vaga</button>
                                    </form>
                                    <a href="{{ route('vagas.edit', $vaga->id) }}" class="btn btn-light border text-dark w-100">Editar Vaga</a>
                                @elseif((auth()->user()->id) !== $vaga->recrutadorid)
                                    <a href="{{ route('vagas.candidatar', ['id' => $vaga->id]) }}" class="btn btn-light border text-dark w-100">Candidatar-se</a>
                                @endif
                            @elseif(strtolower(auth()->user()->recrutador) === 'não')
                                @if($vaga->status === 1)
                                    <a href="{{ route('vagas.candidatar', ['id' => $vaga->id]) }}" class="btn btn-light border text-dark w-100">Candidatar-se</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center mt-5">
            <p class="text-secondary">Você precisa estar logado para ver as vagas.</p>
        </div>
    @endauth
</div>

@endsection
