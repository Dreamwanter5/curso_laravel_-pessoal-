@extends('laravel-usp-theme::master')

@section('content')
    <div class="container py-4">
        <h1 class="h4 mb-3">Adicionar Frase</h1>

        <form method="POST" action="/frases">
            @csrf
            <div class="mb-3">
                <label class="form-label">Dia da semana</label>
                <input class="form-control" type="text" name="dia_semana" value="{{ old('dia_semana') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Texto</label>
                <input class="form-control" type="text" name="texto" value="{{ old('texto') }}">
            </div>
            <button class="btn btn-primary" type="submit" value="{{ old('texto') }}" >Enviar</button>
            <a href="/frases" class="btn btn-link">Cancelar</a>
        </form>
    </div>
@endsection
