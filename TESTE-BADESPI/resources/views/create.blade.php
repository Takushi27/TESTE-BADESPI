@extends('layouts.main')

@section('title', 'Cadastrar Vaga')

@section('content')

<div id="vagas-create-container" class="col-md-6-offset-md-3"> 

    <h1>Criar Vaga</h1> 
    <form action="/vagas" method="POST">
      @csrf
        <div class="form-group">
            <label for="">Vaga</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome da Vaga">
        </div>

          <div class="form-group">
            <label for="">Quantidade</label>
            <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade de Vagas">
        </div>

        <div class="form-group">
            <label for="">Tipo De Vaga</label>
            <select class="form-control form-control-sm w-50" name="tipo" id="tipo">
            <option value=""></option>
            <option value="CLT">CLT</option>
            <option value="CNPJ">PJ</option>
            <option value="Freelancer">Freelancer</option>
            </select>
        </div>

          <div class="form-group">
            <label for="">Descrição</label>
            <textarea name="descrição" id="descrição-vaga" cols="30" rows="10" class="form-control" placeholder="Informe Sobre a Vaga"></textarea>
        </div>

          <div class="form-group">
            <label for="">Nome Da Empresa</label>
            <input type="text" class="form-control" id="Empresa" name="Empresa" placeholder="Nome da Empresa">
        </div>

          <div class="form-group">
            <label for="">Salario</label>
            <input type="text" class="form-control" id="Salario" name="Salario" placeholder="Salario">
        </div>
        <input type="submit" class="btn custom-btn" value="Cadastrar Vaga">

    </form>

</div>


@endsection