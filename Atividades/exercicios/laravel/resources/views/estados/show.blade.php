@extends('app')

@section('conteudo')

<h1>Dados do produto: {{ $estado->name }}</h1>
<ul>
    <li>Id: {{$estado->id}}</li>
    <li>Nome: {{$estado->name}}</li>
    <li>Sigla: {{$estado->sigla}}</li>
    <li>Criação: {{$estado->created_at}}</li>
    <li>Última alteração: {{$estado->updated_at}}</li>
</ul>
<div>
    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
    <a href="{{ route('estados.edit', $estado->id) }}" class="btn btn-info">Editar</a>
    <a href="#" class="btn btn-danger" onclick="confirmar()">Excluir</a>
</div>
<form name="excluir" action="{{ route('estados.destroy', $estado->id) }}" method="POST">
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