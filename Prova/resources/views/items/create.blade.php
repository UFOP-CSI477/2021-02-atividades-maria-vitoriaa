@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Novo item') }}</div>

                <div class="card-body">
                    <form action="{{ route('items.store') }}" method="post">

                        @csrf

                        <div class="mb-3">
                            <label for="descricaoItemInput" class="form-label">Descrição do item</label>
                            <input type="text" class="form-control" id="descricaoItemInput" name="descricao">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
