@extends('app')

@section('conteudo')

<h1>Dados da cidade: {{ $cidade->name }}</h1>

<ul>
    <li>Id: {{$cidade->id}}</li>
    <li>Nome: {{$cidade->name}}</li>
    <li>Estado:<a href="{{ route('estados.show', $cidade->estado_id) }}">{{$cidade->estado->name}}</a></li>
    <li>Criação: {{$cidade->created_at}}</li>
    <li>Última alteração: {{$cidade->updated_at}}</li>
</ul>
<div>
    <a href="{{ url()->previous() }}" class="btn btn-secundary">Voltar</a>
    <a href="{{ route('cidades.edit', $cidade->id) }}" class="btn btn-info">Editar</a>
    <a href="#" class="btn btn-danger" onclick="confirmar()">Excluir</a>
</div>
<form name="excluir" action="{{ route('cidades.destroy', $cidade->id) }}" method="POST">
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