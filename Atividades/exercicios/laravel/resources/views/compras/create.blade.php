@extends('app')

@section('conteudo')

<form action="{{ route('compras.store') }}" method="POST">
    @csrf

    <div class="my-4">
        <label for="pessoa_id" class="form-label">Pessoa:</label>
        <select name="pessoa_id" id="pessoa_id" class="form-select 
        @error('pessoa_id') 
            is-invalid
        @enderror">
            <option value="" selected disabled>Selecione</option>
            @foreach($people as $pessoa)
            <option value="{{ $pessoa->id }}" @if(old('pessoa_id', -1)==$pessoa->id)
                selected @endif
                >{{$pessoa->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="my-4">
        <label for="produto_id" class="form-label">Produto:</label>
        <select name="produto_id" id="produto_id" class="form-select 
        @error('produto_id') 
            is-invalid
        @enderror">
            <option value="" selected disabled>Selecione</option>
            @foreach($produtos as $produto)
            <option value="{{ $produto->id }}" @if(old('produto_id', -1)==$produto->id)
                selected @endif
                >{{ $produto->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="my-4">
        <input class="btn btn-secundary" type="submit" value="Cadastrar" >
        <input class="btn btn-danger" type="reset" value="Limpar" >
        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
    </div>
</form>

@endsection 