@extends('app')

@section('conteudo')

<h1>Dados do produto: {{ $produto->name }}</h1>

<ul>
    <li>Id: {{$produto->id}}</li>
    <li>Nome: {{$produto->name}}</li>
    <li>Unidade de medida: {{$produto->um}}</li>
    <li>Criação: {{$produto->created_at}}</li>
    <li>Última alteração: {{$produto->updated_at}}</li>
</ul>

<div>
    <a href="{{ url()->previous() }}" class="btn btn-secundary">Voltar</a>
    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-info">Editar</a>
    <a href="#" class="btn btn-danger" onclick="confirmar()">Excluir</a>
</div>

<form name="excluir" action="{{ route('produtos.destroy', $produto->id) }}" method="post">
    @csrf
    @method('DELETE')
</form>

<script>
    function confirmar() {
        if (confirm('Confirma a exclusão do produto?')) {
            document.excluir.submit();
        }
    }
</script>
@endsection 