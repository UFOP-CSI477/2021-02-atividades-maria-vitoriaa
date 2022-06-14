@extends('app')

@section('conteudo')

<h1>Compra:</h1>

<ul>
    <li>Id: {{$compra->id}}</li>
    <li>Pessoa: {{$compra->pessoa->name}}</li>
    <li>Produto: {{$compra->produto->name}}</li>
    <li>Criação: {{$compra->created_at}}</li>
    <li>Última alteração: {{$compra->updated_at}}</li>
</ul>

<div>
    <a href="{{ url()->previous() }}" class="btn btn-secundary">Voltar</a>
    <a href="{{ route('compras.edit', $compra->id) }}" class="btn btn-info">Editar</a>
    <a href="#" class="btn btn-danger" onclick="confirmar()">Excluir</a>
</div>

<form name="excluir" action="{{ route('compras.destroy', $compra->id) }}" method="post">
    @csrf
    @method('DELETE')
</form>

<script>
    function confirmar() {
        if (confirm('Confirma a exlusão do produto?')) {
            document.excluir.submit();
        }
    }
</script>
@endsection 