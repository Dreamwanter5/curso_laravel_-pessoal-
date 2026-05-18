<form method="POST" action="/frases">
    @csrf
    Dia da semana: <input type="text" name="dia_semana">
    Texto: <input type="text" name="texto">
    <button type="submit">Enviar</button>
</form>
