<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Lista de estados</title>
</head>

<body>
    <h2 class="h2 mt-4 text-dark-bold text-center">Lista de estados</h2>
    <table class="table table-striped">

        <thead>

            <tr class="table-light">
                <th>Id</th>
                <th>Estado</th>
                <th>Sigla</th>
            </tr>

        </thead>

        <tbody>
        <?php
            foreach ($estados as $estado) {
                echo "<tr>
                <td>{$estado['id']}</td>
                <td>{$estado['nome']}</td>
                <td>{$estado['sigla']}</td>
                </tr>\n";
            }
            ?>
        </tbody>
</body>

</html>