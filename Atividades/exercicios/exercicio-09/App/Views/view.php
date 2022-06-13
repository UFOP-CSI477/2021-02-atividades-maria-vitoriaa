<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 9 - Estados e Produtos</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Estados</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Sigla</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($estados as $e) {
                    echo "<tr>";
                    echo "<td>" . $e->getId() . "</td>\n";
                    echo "<td>" . $e->getNome() . "</td>\n";
                    echo "<td>" . $e->getSigla() . "</td>\n";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <h1>Produtos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Unidade de medida</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($produtos as $p) {
                    echo "<tr>";
                    echo "<td>" . $p->getId() . "</td>\n";
                    echo "<td>" . $p->getNome() . "</td>\n";
                    echo "<td>" . $p->getUm() . "</td>\n";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>