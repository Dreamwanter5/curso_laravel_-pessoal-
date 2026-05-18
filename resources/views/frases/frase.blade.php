<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Frases</title>
</head>
<body>
    <h1>Listagem de Frases</h1>

    <form method="GET" action="/frases">
        <input type="text" name="search" value="{{ $search ?? request('search') }}" placeholder="Buscar por dia ou frase">
        <button type="submit">Pesquisar</button>
    </form>


    <ul>
        @forelse($frases as $frase)
            <li><a href="/frases/{{ $frase->id }}">{{ $frase->dia_semana }} - {{ $frase->texto }}</a></li>
        @empty
            <li>Nenhuma frase encontrada.</li>
        @endforelse
    </ul>

    <a href="/frases/create" style="display: inline-block; margin-top: 10px;">Adicionar Frase</a>
</body>
</html>