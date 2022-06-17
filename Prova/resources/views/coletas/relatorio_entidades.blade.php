@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Doações') }}</div>

                <div class="card-body">
                    <p class="h2">Total de doações recebidas</h1>
                    <table class="table table-sm">

                        <thead>
                            <tr>
                                <th scope="col">Entidade</th>
                                <th scope="col">Itens</th>
                            </tr>
                        </thead>
                        <tbody>

                            @for($i = 0; $i < $entidades->count(); $i++)
                                <tr>
                                    <td>{{ $entidades[$i]->nome }}</td>
                                    <td>{{ number_format($array_coletado_entidades[$i], 2, ',', '.')}}</td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td class="fw-bold">TOTAL GERAL</td>
                                    <td>{{ number_format($total_entidades, 2, ',', '.')}}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
