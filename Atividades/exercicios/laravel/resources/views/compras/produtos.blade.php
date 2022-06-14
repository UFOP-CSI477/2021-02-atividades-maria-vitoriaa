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
        @foreach($produtos as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->pessoa->name}}</td>
            <td>{{$p->produto->name }}</td>
            <td>{{$p->created_at }}</td>
            <td class="d-flex justify-content-around">
                <a href="{{ route('purchases.show', $p->id) }}" class="btn btn-info">Exibir</a>
                <a href="{{ route('purchases.edit', $p->id) }}" class="btn btn-secundary">Editar</a>
            </td>
        </tr>
        @endforeach
</table>

<div class="container">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
</div>

@endsection