@extends('laravel-usp-theme::master')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 mb-0">Listagem de Frases</h1>
            <a href="/frases/create" class="btn btn-sm btn-primary">Adicionar Frase</a>
        </div>

        <a href="/frasedodia" class="btn btn-outline-secondary btn-sm mb-3">Ver Frase do Dia</a>

        <form method="GET" action="/frases" class="d-flex mb-3">
            <input class="form-control me-2" type="search" name="search" value="{{ $search ?? request('search') }}" placeholder="Buscar por dia ou frase">
            <button class="btn btn-success" type="submit">Pesquisar</button>
        </form>

        <ul class="list-group">
            @forelse($frases as $frase)
                <li class="list-group-item">
                    <a href="/frases/{{ $frase->id }}" class="text-decoration-none text-dark">
                        <strong>{{ $frase->dia_semana }}</strong> — {{ $frase->texto }}
                    </a>
                </li>
            @empty
                <li class="list-group-item">Nenhuma frase encontrada.</li>
            @endforelse
        </ul>

        <div class="mt-3">
            <a href="/" class="text-muted">Voltar</a>
        </div>
    </div>
@endsection