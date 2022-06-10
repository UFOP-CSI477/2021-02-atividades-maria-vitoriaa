<?php
require_once("bloquear_acesso.php");

$sql = "SELECT * FROM tb_categoria";
$result_cat = mysqli_query($conn, $sql);
$cod_user = $_SESSION['cod'];
$cod = $_GET['cod'];
if ($_SESSION['perfil'] != 1) {
    $sql_detalhes = "SELECT *, t.cod as codtarefa FROM tb_tarefas t WHERE t.cod_user = '$cod_user' AND cod = '$cod'";
} else {
    $sql_detalhes = "SELECT *, u.cod as codusuario, t.cod as codtarefa FROM tb_tarefas t, tb_user u WHERE t.cod_user = u.cod AND t.cod = '$cod'";
}

$result_tarefas = mysqli_query($conn, $sql_detalhes);
$tarefa = mysqli_fetch_array($result_tarefas);

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/home_page.css">
    <link rel="stylesheet" href="./styles/detalhes.css">
    <title>Detalhes da tarefa</title>
</head>

<body class="background">
    <div class="container-fluid">
        <nav>
            <div class="logo">
                <a class="d-block float-left" href="./index.html">
                    <img src="./images/logo.png">
                </a>
            </div>
            <?php require_once("./header.php"); ?>
        </nav>
        <div class="container">
            <h3 class="text-white">Detalhes da tarefa</h3><br>
            <ul>
                <?php
                if ($_SESSION['perfil'] == 1) { ?>
                    <label for="usuario">Usuário:</label>
                    <?= isset($tarefa['nome']) ? $tarefa['nome'] : null ?><br>
                <?php } ?><br>
                <li><label for="titulo">Título:</label>
                    <?= isset($tarefa['titulo']) ? $tarefa['titulo'] : null ?><br>
                    <?php
                    $cod_tarefa = $tarefa['cod_categoria'];
                    $sql = "SELECT nome FROM tb_categoria WHERE cod = $cod_tarefa";
                    $result_categoria = mysqli_query($conn, $sql);
                    $categoria_tarefa = mysqli_fetch_array($result_categoria);
                    ?>
                </li>
                <li>
                    <label for="categoria">Categoria:</label>
                    <td><?= $categoria_tarefa['nome'] ?></td><br>
                </li>
                <li>
                    <label for="data">Data de início:</label>
                    <?= date("d/m/Y", strtotime(isset($tarefa['data_inicio']) ? $tarefa['data_inicio'] : null)); ?><br>
                </li>
                <li>
                    <label for="data">Data limite:</label>
                    <?= date("d/m/Y", strtotime(isset($tarefa['data_fim']) ? $tarefa['data_fim'] : null)); ?><br>
                </li>
                <li>
                    <label for="hora">Hora:</label>
                    <?= date("H:i", strtotime(isset($tarefa['hora']) ? $tarefa['hora'] : null)); ?><br>
                </li>
                <li>
                    <label for="descricao">Descrição:</label>
                    <?= isset($tarefa['descricao']) ? $tarefa['descricao'] : null ?><br>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer">
        <img src="./images/footer.png">
    </div>
</body>

</html>