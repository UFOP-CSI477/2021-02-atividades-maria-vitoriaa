<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>

    <h3>Produtos</h3>

    <div class="container">
        <div class="flex flex-col m-8">
                <table class="table table-striped">
                    <thead class="bg-gray">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Unid. de medida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                        <tr class="bg-white">
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->name }}</td>
                            <td>{{ $produto->um }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>