@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar coleta') }}</div>

                <div class="card-body">
                    <form class="row g-3" action="{{ route('coletas.update', $coleta->id) }}" method="post">

                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label for="selectItem" class="form-label">Item</label>
                            <select class="form-select" name="item_id" aria-label="Default select example">
                                <option selected>Selecione uma opção</option>

                                @foreach($items as $i)
                                <option value="{{ $i->id }}" @if($i->id == $coleta->item_id) selected @endif>{{ $i->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="selectEntidade" class="form-label">Entidade</label>
                            <select class="form-select" name="entidade_id" aria-label="Default select example">
                                <option selected>Selecione uma opção
                                </option>
                                @foreach($entidades as $e)
                                <option value="{{ $e->id }}" @if($e->id == $coleta->entidade_id) selected @endif>{{ $e->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputQuantidade" class="form-label">Quantidade</label>
                            <input type="number" class="form-control" id="inputQuantidade" name="quantidade" value="{{ $coleta->quantidade }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputData" class="form-label">Data</label>
                            <input type="date" class="form-control" id="inputData" name="data" value="{{$coleta->data}}">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
