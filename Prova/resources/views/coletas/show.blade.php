@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Coleta') }}</div>

                <div class="card-body">
                    <span>Item:</span>
                    <p>{{$coleta->item->descricao}}</p>
                    <span>Entidade:</span>
                    <p>{{$coleta->entidade->nome}}</p>
                    <span>Quantidade:</span>
                    <p>{{$coleta->quantidade}}</p>
                    <span>Data:</span>
                    <p>{{\Carbon\Carbon::parse($coleta->data)->format('d/m/Y')}}</p>

                    <div class="d-flex flex-row gap-3">

                        <a href="{{ route('coletas.edit', $coleta->id )}}">
                            <button type="button" class="btn btn-success btn-sm">Editar</button>
                        </a>

                        <form name="frDelete" action="{{route('coletas.destroy', $coleta->id) }}" method="post" onSubmit="return confirm('Deseja excluir esta coleta?')">

                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
