@extends('laravel-usp-theme::master')

@section('content')
    <div class="container py-4">
        <h1 class="h4 mb-3">Editar Frase</h1>
        <form method="POST" action="/frases/{{ $frase->id }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label class="form-label">Dia da semana</label>
                <input class="form-control" type="text" name="dia_semana" value="{{ $frase->dia_semana }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Texto</label>
                <input class="form-control" type="text" name="texto" value="{{ $frase->texto }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Pontuação</label>
                <input class="form-control" type="number" name="pontuacao" value="{{ $frase->pontuacao }}" step="0.01">
            </div>
            <button class="btn btn-primary" type="submit">Enviar</button>
            <a href="/frases/{{ $frase->id }}" class="btn btn-link">Voltar</a>
        </form>
    </div>
@endsection