Título: {{ $livro->titulo }} <br>
Autor: <i>{{ $livro->autor }}</i> <br>
Ano de publicação: {{ $livro->ano }} <br>
<!-- {{ $livro->id }} puxa o ID do livro em específico. -->
<a href="/livros/{{ $livro->id }}/edit">Editar</a> <br>

<!-- Botão de Deletar -->
<form action="/livros/{{ $livro->id }} " method="post">
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button> 
</form>


<a href="/livros">Voltar</a>
