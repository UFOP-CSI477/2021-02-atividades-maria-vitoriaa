@extends('app')

@section('conteudo')

<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name" class="form-label">Nome:</label>
        <input type="text" name="name" id="name" class="form-control 
        @error('name') 
            is-invalid
        @enderror" value="{{ old('name', $produto->name) }}">
    </div>

    <div class="my-4">
        <label for="um" class="form-label">Unidade de medida:</label>
        <input type="text" name="um" id="um" class="form-control
        @error('um') 
            is-invalid
        @enderror
        " value="{{ old('um', $produto->um) }}">
    </div>

    <div class="my-4">
        <input type="submit" value="Atualizar" class="btn btn-secundary">
        <input type="reset" value="Limpar" class="btn btn-info">
    </div>
</form>

@endsection 