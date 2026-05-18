<form method="POST" action="/frases/{{ $frase->id }}">
    @csrf
    @method('PATCH')
    Dia da semana: <input type="text" name="dia_semana" value="{{ $frase->dia_semana }}">
    Texto: <input type="text" name="texto" value="{{ $frase->texto }}">
    <button type="submit">Enviar</button>
</form>
<a href="/frases/{{ $frase->id }}">Voltar</a>