
@extends('laravel-usp-theme::master')

@section('content')
	<div class="container py-4">
		<h1 class="h4">Frase do Dia - {{ $dia }}</h1>
		@if($frase)
			<div class="card mt-3">
				<div class="card-body">
					<h5 class="card-title">{{ $frase->dia_semana }}</h5>
					<p class="card-text">{{ $frase->texto }}</p>
					<p class="card-text">Pontuação: {{ $frase->pontuacao }}</p>
				</div>
			</div>
		@else
			<div class="alert alert-info mt-3">Não há frases cadastradas.</div>
		@endif

		<p class="mt-3"><a href="/frases" class="link-secondary">Ver todas as frases</a></p>
	</div>
@endsection
