@extends('app')

@section('conteudo')

<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cidades as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td><a href="{{ route('cidades.show', $c->id) }}">{{$c->name}}</a></td>
            <td>{{ $c->estado->name }} - {{ $c->estado->sigla }}</td>
            <td class="d-flex justify-content-around">
                <a href="{{ route('cidades.show', $c->id) }}" class="btn btn-info">Exibir</a>
                <a href="{{ route('cidades.edit', $c->id) }}" class="btn btn-primary">Editar</a>
        </tr>
        @endforeach
</table>
<div class="container">
    <a class="btn btn-primary" href="{{ route('cidades.create') }}">Incluir</a>

</div>

@endsection