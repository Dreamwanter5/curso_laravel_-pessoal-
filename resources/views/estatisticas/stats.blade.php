<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Estatísticas de Livros</title>
</head>
<body>
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
                <!-- Tabela de livros por autor -->
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
    </div>

    <div>
            <a href="/livros" >Voltar aos livros</a>
    </div>
</body>
</html>
