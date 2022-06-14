@extends('app')

@section('conteudo')

<form action="{{ route('cidades.store') }}" method="POST">
    @csrf
    <div>
        <label for="name" class="form-label">Nome:</label>
        <input type="text" name="name" id="name" class="form-control
        @error('name') 
            is-invalid
        @enderror">
    </div>
    <div class="my-4">
        <label for="estado_id" class="form-label">Estado:</label>
        <select name="estado_id" id="estado_id" class="form-select 
        @error('estado_id') 
            is-invalid
        @enderror">
            <option value="" selected disabled>Selecione</option>
            @foreach($estados as $estado)
            <option value="{{ $estado->id }}" @if(old('estado_id', -1)==$estado->id)
                selected @endif
                >{{ $estado->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="my-4">
        <input class="btn btn-secundary" type="submit" value="Cadastrar" >
        <input class="btn btn-info" type="reset" value="Limpar" >
        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
    </div>
</form>

@endsection 