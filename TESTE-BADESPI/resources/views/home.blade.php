@extends('layouts.main')

@section('title')

@section('content')

<link rel="stylesheet" href="/css/pesquisa.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container mt-4">
        <h1 class="mb-4">Vagas de Emprego</h1>
        <h5 id="sub-main">Encontre as melhores oportunidades de trabalho</h5>
    <div id='pesquisa-vaga'>
        <form action="">
            <input id="barra-pesquisa" type="text" placeholder="Pesquisar Vaga">
            <ul id="results" class="list-group mt-2"></ul>
        </form>
    </div>
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
<script>
    $(document).ready(function(){

        $('#pesquisa-vaga form').on('submit', function(e){
            e.preventDefault();
        });

        $('#barra-pesquisa').on('keyup', function(){
            
            let query = $(this).val();

            if(query.length > 0){
                $.ajax({
                    url: "{{ route('vagas.search') }}",
                    type: 'GET',
                    data: {query: query},
                    success: function(data){
                        let html = '';
                        if(data.length > 0){
                            data.forEach(function(vaga){
                                html += `
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">${vaga.name}</h5>
                                            <p class="card-text"><strong>Vagas:</strong> ${vaga.quantidade}</p>
                                            <p class="card-text"><strong>Empresa:</strong> ${vaga.empresa}</p>
                                            <p class="card-text"><strong>Tipo:</strong> ${vaga.tipo}</p>
                                        </div>
                                        <div class="card-footer bg-transparent border-top-0">
                                            <a href="/vagas/${vaga.id}" class="btn btn-custom-card w-100">Ver Detalhes</a>
                                        </div>
                                    </div>
                                </div>
                                `;
                            });
                        } else {
                            html = '<p class="mt-3">Nenhuma vaga encontrada</p>';
                        }
                        $('#defaultResults').html(html);
                    }
                });
           } else {
                $('#defaultResults').html(`
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
                `);
            }
        });
    });
</script>


@endsection