<form method="POST" action="/livros/{{ $livro->id }}">
    @csrf
    @method('PATCH')
    Título: <input type="text" name="titulo" value="{{ $livro->titulo }}">
    Autor: <input type="text" name="autor" value="{{ $livro->autor }}">
    Ano: <input type="text" name="ano" value="{{ $livro->ano }}">
    <button type="submit">Enviar</button>
</form>
<a href="/livros/{{ $livro->id }}">Voltar</a>

