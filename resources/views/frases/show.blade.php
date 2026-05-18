<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Frases</title>
</head>
<body>
    <h1>Frase do dia</h1>
    <p><strong>{{ $frase->dia_semana }}</strong></p>
    <p>{{ $frase->texto }}</p>

    <a href="/frases/{{ $frase->id }}/edit">Editar</a><br>

    <form method="POST" action="/frases/{{ $frase->id }}" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar esta frase?')">Apagar</button>
    </form>
    <br>
    <a href="/frases">Voltar para a lista de frases</a>
</body>
</html>