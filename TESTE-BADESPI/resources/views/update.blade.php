@extends('layouts.main')

@section('title', 'Cadastrar Vaga')

@section('content')

<div id="vagas-create-container" class="col-md-6-offset-md-3"> 

    <h1>Oque Deseja Atualizar ?</h1> 
    <form action="{{route('vagas.atualizar', $vaga->id)}}" method="POST">
      @csrf

        @method('PUT')

        <div class="form-group">
            <label for="">Vaga</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $vaga->name }}">
        </div>

          <div class="form-group">
            <label for="">Quantidade</label>
            <input type="text" class="form-control" id="quantidade" name="quantidade" value="{{ $vaga->quantidade }}">
        </div>

        <div class="form-group">
            <label for="">Tipo</label>
            <select class="form-control form-control-sm w-50" name="tipo" id="tipo">
            <option value="CLT" {{ $vaga->tipo == 'CLT' ? 'selected' : '' }}>CLT</option>
            <option value="PJ" {{ $vaga->tipo == 'PJ' ? 'selected' : '' }}>PJ</option>
            <option value="Freelancer" {{ $vaga->tipo == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
            </select>
        </div>

          <div class="form-group">
            <label for="">Descrição</label>
            <textarea name="descrição" id="descrição-vaga" cols="30" rows="10" class="form-control">{{ old('descrição', $vaga->descrição) }}</textarea>
        </div>

          <div class="form-group">
            <label for="">Nome Da Empresa</label>
            <input type="text" class="form-control" id="Empresa" name="Empresa" value="{{ $vaga->empresa }}">
        </div>

          <div class="form-group">
            <label for="">salario</label>
            <input type="text" class="form-control" id="Salario" name="Salario" value="{{ $vaga->salario }}">
        </div>
        <input type="submit" class="btn custom-btn" value="Atualizar">

    </form>

</div>


@endsection