@extends('app')

@section('conteudo')

<form action="{{ route('produtos.store') }}" method="POST">
    @csrf

    <div>
        <label for="name" class="form-label">Nome:</label>
        <input type="text" name="name" id="name" class="form-control 
        @error('name') 
            is-invalid
        @enderror" value="{{ old('name') }}">
    </div>

    <div>
        <label for="um" class="form-label">Unid. de Medida:</label>
        <input type="text" name="um" id="um" class="form-control 
        @error('um') 
            is-invalid
        @enderror" value="{{ old('um') }}">
    </div>


    <div class="my-4">
        <input type="submit" value="Cadastrar" class="btn btn-secundary">
        <input type="reset" value="Limpar" class="btn btn-info">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
    </div>
</form>

@endsection