@extends('layouts.main')

@section('title')

@section('content')

<div class="container mt-4">
        <h1 class="mb-4">Vagas de Emprego</h1>
        <h5 id="sub-main">Encontre as melhores oportunidades de trabalho</h5>
        
    <div id="defaultResults" class="row">
        @foreach($vagas as $vaga)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $vaga->name }}</h5>
                        <p class="card-text"><strong>Vagas:</strong> {{ $vaga->quantidade }}</p>
                        <p class="card-text"><strong>Empresa:</strong> {{ $vaga->empresa }}</p>
                        <p class="card-text"><strong>Tipo:</strong> {{ $vaga->tipo }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <a href="{{ route('vagas.show', ['id' => $vaga->id]) }}" class="btn btn-custom-card w-100">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection