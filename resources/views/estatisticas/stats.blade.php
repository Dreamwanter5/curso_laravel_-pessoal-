@extends('laravel-usp-theme::master')

@section('content')
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-lg-6">
                <h1 align="center">Livros por Ano</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Ano</th>
                            <th>Quantidade de Livros</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($livrosPorAno as $livro)
                            <tr>
                                <td>{{ $livro->ano }}</td>
                                <td>{{ $livro->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-lg-6">
                <h1 align="center">Livros por Autor</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Autor</th>
                            <th>Quantidade de Livros</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($livrosPorAutor as $livro)
                            <tr>
                                <td>{{ $livro->autor }}</td>
                                <td>{{ $livro->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <a href="/livros">Voltar aos livros</a>
        </div>
    </div>
@endsection
