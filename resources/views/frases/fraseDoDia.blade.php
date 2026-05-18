
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Frase do Dia</title>
</head>
<body>
	<h1>Frase do Dia @if($dia) - {{ $dia }} @endif</h1>

	@if($frase)
		<article>
			<p><strong>{{ $frase->dia_semana }}</strong></p>
			<p>{{ $frase->texto }}</p>
		</article>
	@else
		<p>Não há frases cadastradas.</p>
	@endif

	<p><a href="/frases">Ver todas as frases</a></p>
</body>
</html>
