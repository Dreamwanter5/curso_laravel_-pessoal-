<form method="POST" action="/livros">
    @csrf
    Título: <input type="text" name="titulo">
    Autor: <input type="text" name="autor">
    Ano: <input type="text" name="ano">
    <button type="submit">Enviar</button>
</form>
