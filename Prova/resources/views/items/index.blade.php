@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem de items') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $i)
                            <tr>
                                <th scope="row">{{ $i->id }}</th>
                                <td>{{ $i->descricao }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('items.create') }}">
                        <button type="button" class="btn btn-primary">Adicionar item</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
