<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Frase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
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
        <button class="btn btn-primary" type="submit">Enviar</button>
        <a href="/frases/{{ $frase->id }}" class="btn btn-link">Voltar</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>