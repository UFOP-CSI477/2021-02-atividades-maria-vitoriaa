<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Lista de produtos</title>
</head>

<body>
    <a class="btn btn-primary" href="produtosViewInsert.php">Inserir</a>
    <h3>Produtos</h3>
    <table class="table table-striped">
        <thead>
            <tr class="table-light">
                <th>Cod</th>
                <th>Nome</th>
                <th>Un. de medida</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($p = $produtos->fetch()) {
                echo "<tr>";
                echo "<td>" . $p["id"] . "</td>\n";
                echo "<td>" . $p["nome"] . "</td>\n";
                echo "<td>" . $p["um"] . "</td>\n";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>