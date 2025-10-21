@extends('layouts.main')

@section('title', 'Cadastrar Vaga')

@section('content')

<div id="vagas-create-container" class="col-md-6-offset-md-3"> 

    <h1>Bem Vindo</h1> 
    @auth
        <form action="{{ route('curriculos.storeCandidaturas') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">

                <input type="hidden" name="vagaid" value="{{ $vaga->id }}">
                <input type="hidden" name="candidatoid" value="{{ auth()->user()->id }}">

                <label for="">Envie Seu Curriculo</label>
                <p for="">Tamano Maxima de 4MB</p>
                <input type="file" class="form-control" id="curriculo" name="curriculo" accept=".pdf,.doc,.docx">
                @if($errors->has('curriculo'))
                    <span style="color:red">{{$errors->first('curriculo')}}</span>
                @endif
            </div>
            <input type="submit" class="btn custom-btn" value="Enviar">

        </form>
    @else
        <div class="">
            <p>Você precisar Entrar na sua conta para enviar o seu currículo</p>
        </div>
    @endauth

</div>


@endsection