@extends('layouts.main')

@section('title', 'Cadastrar')

@section('content')

<div id="cadastro-container" class="col-md-6-offset-md-3"> 

    <h1>Cadastre-se</h1> 
    <form action="/cadastrar" method="POST">
      @csrf
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu Nome">
        </div>

          <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Digite Email">
        </div>

        <div class="form-group">
            <label for="">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite Sua Senha" autocomplete="new-password" autocapitalize="off" autocorrect="off" spellcheck="false" required>
        </div>

        <div class="form-group-cadastro">
            <label for="recrutador">Recrutador?</label>
            <select class="form-control form-control-sm w-50" name="recrutador" id="recrutador">
            <option value=""></option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
            </select>
        </div>
        <input type="submit" class="btn custom-btn" value="Cadastrar">
    </form>

</div>


@endsection