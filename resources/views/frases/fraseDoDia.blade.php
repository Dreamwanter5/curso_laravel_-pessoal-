
<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Frase do Dia</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
	<h1 class="h4">Frase do Dia - {{ $dia }} </h1>

	@if($frase)
		<div class="card mt-3">
			<div class="card-body">
				<h5 class="card-title">{{ $frase->dia_semana }}</h5>
				<p class="card-text">{{ $frase->texto }}</p>
			</div>
		</div>
	@else
		<div class="alert alert-info mt-3">Não há frases cadastradas.</div>
	@endif

	<p class="mt-3"><a href="/frases" class="link-secondary">Ver todas as frases</a></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
