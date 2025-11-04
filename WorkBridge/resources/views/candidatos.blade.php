@extends('layouts.main')

@section('title', 'Candidatos da Vaga')

@section('content')
<div class="container mt-4">
    <h2>Candidatos para a vaga: {{ $vaga->name }}</h2>

    @if($vaga->candidaturas->count() > 0)
        <ul class="list-group mt-3">
            @foreach($vaga->candidaturas as $candidatura)
                <li class="list-group-item">
                    <strong>Nome:</strong> {{ $candidatura->name }}<br>
                    <a class="btn btn-light border text-dark w-60" href="{{ route('curriculo.download', ['id' => $candidatura->id]) }}">Ver Currículo</a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="mt-3">Nenhum candidato para esta vaga ainda.</p>
    @endif
</div>
@endsection
