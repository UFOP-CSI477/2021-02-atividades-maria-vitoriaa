@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem de coletas') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Item</th>
                                <th scope="col">Entidade</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Data</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coletas as $c)
                            <tr>
                                <th scope="row">{{$c->id}}</th>
                                <td>{{$c->item->descricao}}</td>
                                <td>{{$c->entidade->nome}}</td>
                                <td>{{number_format($c->quantidade, 2, ',', '.')}}</td>
                                <td>{{\Carbon\Carbon::parse($c->data)->format('d/m/Y')}}</td>
                                <td>
                                    <a href="{{route('coletas.show', $c->id )}}">
                                        <button type="button" class="btn btn-secondary btn-sm">Ver</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('coletas.edit', $c->id )}}">
                                        <button type="button" class="btn btn-success btn-sm">Editar</button>
                                    </a>
                                </td>
                                <td>
                                    <form name="frDelete" action="{{route('coletas.destroy', $c->id) }}" method="post" onSubmit="return confirm('Deseja excluir esta coleta?')">

                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('coletas.create') }}">
                        <button type="button" class="btn btn-primary">Nova coleta</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
