@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem de entidades') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Bairro</th>
                                <th scope="col">Cidade</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entidades as $e)
                            <tr>
                                <th scope="row">{{ $e->id }}</th>
                                <td>{{ $e->nome }}</td>
                                <td>{{ $e->bairro }}</td>
                                <td>{{ $e->cidade }}</td>
                                <td>
                                    <form name="frDelete" action="{{route('entidades.destroy', $e->id) }}" method="post" onSubmit="return confirm('Deseja excluir esta entidade?')">

                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Excluir</button>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
