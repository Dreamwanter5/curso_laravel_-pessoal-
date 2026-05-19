<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Frases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body{background:#f8f9fa}</style>
</head>
<body>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>