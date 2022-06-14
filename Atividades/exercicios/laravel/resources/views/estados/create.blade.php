@extends('app')

@section('conteudo')

<form action="{{ route('estados.store') }}" method="POST">
    @csrf
    <div>
        <label for="name" class="form-label">Nome:</label>
        <input type="text" name="name" id="name" class="form-control
        @error('name') 
            is-invalid
        @enderror">
    </div>
    <div>
        <label for=" sigla" class="form-label">Sigla:</label>
        <input type="text" name="sigla" id="sigla" class="form-control 
        @error('sigla') 
            is-invalid
        @enderror" value="{{ old('sigla') }}">
    </div>
    <div class="my-4">
        <input class="btn btn-secundary" type="submit" value="Cadastrar" >
        <input class="btn btn-info" type="reset" value="Limpar" >
        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
    </div>
</form>
@endsection 