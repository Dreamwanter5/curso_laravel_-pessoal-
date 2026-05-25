@extends('laravel-usp-theme::master')

@section('content')
	<h1>Listagem de Livros</h1>

	<form>
	    <input type="text" name="search" value="{{ request('search') }}">
	    <button type="submit">Pesquisar</button>
	</form>

	<ul>
	    @foreach($livros as $livro)
	        <li><a href="/livros/{{ $livro->id }}">{{ $livro->titulo }}</a>, por <i>{{ $livro->autor }}</i> em {{ $livro->ano }}</li>
	    @endforeach
	</ul>
	<a href="/livros/create" style="display: inline-block; margin-top: 10px;">Adicionar Livro</a>
@endsection
