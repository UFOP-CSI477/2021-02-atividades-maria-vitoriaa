@extends('app')

@section('conteudo')

<form action="{{ route('estados.update', $estado->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name" class="form-label">Nome:</label>
        <input type="text" name="name" id="name" class="form-control 
        @error('name') 
            is-invalid
        @enderror" value="{{ old('name', $estado->name) }}">
    </div>

    <div class="my-4">
        <label for="sigla" class="form-label">Sigla:</label>
        <input type="text" name="sigla" id="sigla" class="form-control
        @error('sigla') 
            is-invalid
        @enderror
        " value="{{ old('sigla', $estado->sigla) }}">
    </div>

    <div class="my-4">
        <input class="btn btn-secundary" type="submit" value="Atualizar">
        <input class="btn btn-danger" type="reset" value="Limpar">
    </div>
</form>

@endsection 