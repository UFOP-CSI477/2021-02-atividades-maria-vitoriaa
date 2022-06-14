@extends('app')

@section('conteudo')

<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Unid. de medida</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td><a href="{{ route('proddutos.show', $p->id) }}">{{$p->name}}</a></td>
            <td>{{$p->um}}</td>
            <a href="{{ route('produtos.show', $p->id) }}" class="btn btn-info">Exibir</a>
            <a href="{{ route('produtos.edit', $p->id) }}" class="btn btn-info">Editar</a>
        </tr>
        @endforeach
</table>
<div class="container">
    <a class="btn btn-secundary" href="{{ route('produtos.create') }}">Incluir</a>

</div>

@endsection