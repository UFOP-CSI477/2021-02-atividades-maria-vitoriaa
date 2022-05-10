<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./style.css">
    <title>Exercício 05 - PHP</title>
</head>

<body class="background">
    <div class="container-fluid">
        <div id="box" class="col-4 offset-4">
            <?php
            $usuario = "Julia Nascimento";
            $data_nasc = "12/08/1970";
            $endereco = "Rua X, número 25, bairro Y";
            $contato = "31 3832-2477";

            echo "<h2>Informações Pessoais</h2>";

            echo 
            "<div class='foto'>
                <img src='https://source.unsplash.com/SJvDxw0azqw'>
            </div><br>";

            echo "<h3>Nome: $usuario</h3>";
            echo "<h3>Data de nascimento: $data_nasc</h3>";
            echo "<h3>Endereço: $endereco</h3>";
            echo "<h3>Contato: $contato</h3>";
            ?>
        </div>
    </div>
</body>

</html>