<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/home.css">
</head>

<body>
    <nav class="nav">
        <a class="cta" href="cad_tarefa.php"><span class="hover-underline-animation">Cadastrar Terefas</span></a>
        <a class="cta" href="home.php"><span class="hover-underline-animation">Listar Tarefas</span></a>
        <a class="cta" href="./bd/sair.php"><span class="hover-underline-animation">Sair</span></a><br><br>
    </nav>
    <h4 class="h4">Olá, <?= $_SESSION['nome'] ?>!</h4>
</body>

</html>