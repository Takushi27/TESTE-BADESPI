@extends('layouts.main')

@section('title', 'Cadastrar Vaga')

@section('content')

<div id="vagas-create-container" class="col-md-6-offset-md-3"> 

    <h1>Bem Vindo</h1> 
    <form action="{{ route('curriculos.storeCandidaturas') }}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group">

            <input type="hidden" name="vagaid" value="{{ $vaga->id }}">
            <input type="hidden" name="candidatoid" value="{{ auth()->user()->id }}">

            <label for="">Envie Seu Curriculo</label>
            <input type="file" class="form-control" id="curriculo" name="curriculo" accept=".pdf,.doc,.docx">
        </div>
        <input type="submit" class="btn custom-btn" value="Enviar">

    </form>

</div>


@endsection