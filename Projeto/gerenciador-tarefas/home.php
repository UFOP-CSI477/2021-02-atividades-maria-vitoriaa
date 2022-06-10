<?php
require_once("bloquear_acesso.php");
$cod_usuario = $_SESSION['cod'];
if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
} else {
    $busca = '';
}
if ($_SESSION['perfil'] != 1) {
    $sql = "SELECT *, t.cod as codtarefa FROM tb_tarefas t WHERE t.cod_user = '$cod_usuario' AND t.titulo LIKE '%$busca%' ORDER BY data_inicio, hora asc";
} else {
    $sql = "SELECT *, u.cod as codusuario, t.cod as codtarefa FROM tb_tarefas t, tb_user u WHERE t.cod_user = u.cod AND (t.titulo LIKE '%$busca%' OR u.nome LIKE '%$busca%') ORDER BY data_inicio, hora asc";
}

$result_tarefas = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/home_page.css">
    <link rel="stylesheet" href="./styles/home.css">
    <title>Lista de tarefas</title>
    <script>
        function alerta() {
            window.alert("Não é possível editar e/ou excluir tarefas de outros usuários ");
        }
    </script>
</head>

<body class="background">
    <div class="container-fluid">
        <nav>
            <div class="logo">
                <a class="d-block float-left" href="index.html">
                    <img src="./images/logo.png">
                </a>
            </div>
            <?php require_once("./header.php"); ?>
        </nav>
        <div class="container">
            <div class="child">
                <h3 class="text-white">Lista de tarefas</h3><br>
                <div class="container-search">
                    <form action="">
                        <div class="row">
                            <div class="col">
                                <input class="form-control" type="text" name="busca" id="busca" placeholder="Pesquisar">
                            </div>
                            <div class="col">
                                <button>Pesquisar</button>
                                <a href="home.php">Limpar pesquisa</a>
                            </div>
                        </div>
                    </form>
                </div><br>
                <table class="table table-bordered">
                    <tr class="header">
                        <?php
                        if ($_SESSION['perfil'] == 1) { ?>
                            <td>Usuário</td>
                        <?php } ?>
                        <td>Tarefa</td>
                        <td>Data de início</td>
                        <td>Data limite</td>
                        <td>Hora</td>
                        <td>Categoria</td>
                        <td>Opções</td>

                    </tr>
                    <?php foreach ($result_tarefas as $lista) {
                        $codigo = $lista['codtarefa'] ?>
                        <tr>
                            <?php
                            if ($_SESSION['perfil'] == 1) { ?>
                                <td><?= $lista['nome'] ?></td>
                            <?php } ?>
                            <td><?= $lista['titulo'] ?></td>
                            <td><?= date("d/m/Y", strtotime($lista['data_inicio'])); ?></td>
                            <td><?= date("d/m/Y", strtotime($lista['data_fim'])); ?></td>
                            <td><?= $lista['hora'] ?></td>
                            <?php
                            $cod_tarefa = $lista['cod_categoria'];
                            $sql = "SELECT nome FROM tb_categoria WHERE cod = $cod_tarefa";
                            $result_categoria = mysqli_query($conn, $sql);
                            $categoria_tarefa = mysqli_fetch_array($result_categoria);
                            ?>
                            <td><?= $categoria_tarefa['nome'] ?></td>
                            <?php
                            if ($_SESSION['cod'] == $lista['cod_user']) { ?>
                                <td>
                                    <a href="editar_tarefa.php?cod=<?= $codigo ?>"><svg id="Editar" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="-2 -3 24 24">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            <title id="Editar">Editar</title>
                                        </svg></a>
                                    <a href="bd/excluir_tarefa.php?cod=<?= $codigo ?>"><svg id="Excluir" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="-2 -3 24 24">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            <title id="Excluir">Excluir</title>
                                        </svg></a>
                                    <a href="detalhes.php?cod=<?= $codigo ?>"><svg id="Detalhes" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="-2 -3 24 24">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            <title id="Detalhes">Detalhes</title>
                                        </svg></a>
                                </td>
                            <?php } else { ?>
                                <td>
                                    <a href="" onclick="alerta()"><svg id="Editar" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="-1 -3 24 24">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            <title id="Editar">Editar</title>
                                        </svg></a>
                                    <a href="" onclick="alerta()"><svg id="Excluir" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="-1 -3 24 24">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            <title id="Excluir">Excluir</title>
                                        </svg></a>
                                    <a href="detalhes.php?cod=<?= $codigo ?>"><svg id="Detalhes" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="-1 -3 24 24">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            <title id="Detalhes">Detalhes</title>
                                        </svg></a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="footer">
            <img src="./images/footer.png">
        </div>
    </div>
</body>

</html>