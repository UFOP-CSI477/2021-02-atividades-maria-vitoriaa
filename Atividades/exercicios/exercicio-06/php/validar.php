<?php

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Exercício 06</title>
</head>

<body class="background">
    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $nome ?></th>
                    <td><?php echo $endereco ?></td>
                    <td><?php echo $cpf ?></td>
                    <td><?php echo $telefone ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>