@extends('laravel-usp-theme::master')

@section('content')
    <div class="container py-4">
        <h1 class="h4">Frase do dia</h1>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">{{ $frase->dia_semana }}</h5>
                <p class="card-text">{{ $frase->texto }}</p>
                <a href="/frases/{{ $frase->id }}/edit" class="btn btn-sm btn-outline-primary me-2">Editar</a>
                <form method="POST" action="/frases/{{ $frase->id }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Tem certeza que deseja apagar esta frase?')">Apagar</button>
                </form>
                <p class="card-text">Id de criador: {{ $frase->user_id }}</p>
                <p class="card-text">Id do último editor: {{ $frase->edited_by_user_id ?? 'Ainda não editada' }}</p>
                <p class="card-text">Pontuação: {{ $frase->pontuacao }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="/frases" class="link-secondary">Voltar para a lista de frases</a>
        </div>
    </div>
@endsection