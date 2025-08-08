@extends('layouts.main')

@section('title', 'Login')

@section('content')

<div id="Login-container" class="col-md-6-offset-md-3"> 
  @if(session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
  @endif

    <h1>Conectar-se</h1> 
    <form action="{{ route('autenticar') }}" method="POST">
      @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite Seu Email">
        </div>

          <div class="form-group">
            <label for="">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite Sua Senha" autocomplete="new-password" autocapitalize="off" autocorrect="off" spellcheck="false" required>
        </div>
        <input type="submit" class="btn custom-btn" value="Fazer Login">

    </form>

</div>


@endsection