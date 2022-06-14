@extends('app')

@section('conteudo')

<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Sigla</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estados as $s)
        <tr>
            <td>{{$s->id}}</td>
            <td><a href="{{ route('estados.show', $s->id) }}">{{$s->name}}</a></td>
            <td>{{$s->sigla}}</td>
            <td class="d-flex justify-content-around">
                <a href="{{ route('estados.show', $s->id) }}" class="btn btn-info">Exibir</a>
                <a href="{{ route('estados.edit', $s->id) }}" class="btn btn-primary">Editar</a>
        </tr>
        @endforeach
</table>

<div class="container">
    <a class="btn btn-primary" href="{{ route('estados.create') }}">Incluir</a>

</div>

@endsection