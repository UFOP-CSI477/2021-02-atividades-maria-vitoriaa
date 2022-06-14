@extends('app')

@section('conteudo')

<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Pessoa</th>
            <th>Produto</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($compras as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->pessoa->name}}</td>
            <td>{{$p->produto->name }}</td>
            <td>{{$p->created_at }}</td>
            <td class="d-flex justify-content-around">
                <a href="{{ route('compras.show', $p->id) }}" class="btn btn-info">Exibir</a>
                <a href="{{ route('compras.edit', $p->id) }}" class="btn btn-scundary">Editar</a>
            </td>
        </tr>
        @endforeach
</table>

<div class="container">
    <a class="btn btn-secundary" href="{{ route('compras.create') }}">Incluir</a>
    <a class="btn btn-secundary" href="{{ route('compras.people') }}">Listar (pessoa)</a>
    <a class="btn btn-secundary" href="{{ route('compras.date') }}">Listar (data)</a>
    <a class="btn btn-secundary" href="{{ route('compras.products') }}">Listar (produto)</a>
</div>

@endsection