<!DOCTYPE html>
<html>
    <head>
        <title>Livros</title>
    </head>
	<h1>Listagem de Livros</h1>

	<form>
	    <input type="text" name="search" value="{{ request('search') }}">
	    <button type="submit">Pesquisar</button>
	</form>

	<ul>
	    @foreach($livros as $livro)
	        <li>{{ $livro->titulo }}, por <i>{{ $livro->autor }}</i> em {{ $livro->ano }}</li>
	    @endforeach
	</ul>
</html>
