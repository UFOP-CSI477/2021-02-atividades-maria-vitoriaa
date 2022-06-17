@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Items') }}</div>

                <div class="card-body">
                    <p class="h2">Total de itens recebidos</h1>
                    <table class="table table-sm">

                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>

                            @for($i = 0; $i < $items->count(); $i++)
                                <tr>
                                    <td>{{ $items[$i]->descricao }}</td>
                                    <td>{{ number_format($array_coletado_items[$i], 2, ',', '.' )}}</td>
                                    <td>{{ number_format(($array_coletado_items[$i] / $total_items) * 100, 2, ',', '.')}}%</td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td class="fw-bold">TOTAL GERAL</td>
                                    <td>{{number_format($total_items, 2, ',', '.')}}</td>
                                    <td>{{number_format(($total_items / $total_items)*100, 2, ',', '.')}}%</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
