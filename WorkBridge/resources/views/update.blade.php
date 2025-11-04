@extends('layouts.main')

@section('title', 'Cadastrar Vaga')

@section('content')

<div id="vagas-create-container" class="col-md-6-offset-md-3"> 

    <h1>Oque Deseja Atualizar ?</h1> 
    <form id='upVaga' action="{{route('vagas.atualizar', $vaga->id)}}" method="POST">
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
            <label for="">Salario</label>
            <input type="text" class="form-control" id="salario" name="salario" value="{{ $vaga->salario }}">
            <span id="erroSalario" style="color:red; display:none;">Formato inválido</span>
        </div>
        <input type="submit" class="btn custom-btn" value="Atualizar">

    </form>

</div>
<script>
  document.getElementById('upVaga').addEventListener('submit', function (e){
    const salario = document.getElementById('salario').value.trim();
    const erro = document.getElementById('erroSalario');

    const regex = /^\d{1,3}(\.\d{3})*(,\d{2})$|^\d+(,\d{2})$/;

    if(!regex.test(salario)){
      e.preventDefault();
      erro.style.display = 'inline';
    }
    else{
      erro.style.display = 'none';
    }
  });
</script>


@endsection