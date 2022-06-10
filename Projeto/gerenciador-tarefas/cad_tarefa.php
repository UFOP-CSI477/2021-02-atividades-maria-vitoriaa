<?php
require_once("bloquear_acesso.php");

$sql = "SELECT * FROM tb_categoria";
$result_categoria = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/home_page.css">
    <link rel="stylesheet" href="./styles/cad_tarefa.css">
    <title>Cadastro de tarefas</title>
</head>

<body class="background">
    <div class="container-fluid">
        <nav>
            <div class="logo">
                <a class="d-block float-left" href="./index.html">
                    <img src="./images/logo.png">
                </a>
            </div>
            <?php require_once("header.php"); ?>
        </nav>
        <div class="container">
            <h3 class="text-white">Cadastrar tarefas</h3>
            <form action="./bd/cadastro_tarefa.php" method="POST" class="form-inline">
                <div class="row mb-4">
                    <div class="col">
                        <label class="text-white" for="titulo">Título:</label>
                        <input class="form-control" type="text" name="titulo">
                    </div>
                    <div class="col">
                        <label class="text-white" for="categoria">Categoria:</label>
                        <select class="form-select" aria-label="Default select example" name="categoria">
                            <option selected>Selecione</option>
                            <?php foreach ($result_categoria as $opcao) { ?>
                                <option value="<?php echo $opcao['cod'] ?>"><?php echo $opcao['nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <label class="text-white" for="data">Data de início:</label>
                        <input class="form-control" type="date" name="data_inicio">
                    </div>
                    <div class="col">
                        <label class="text-white" for="data">Data limite:</label>
                        <input class="form-control" type="date" name="data_fim">
                    </div>
                    <div class="col">
                        <label class="text-white" for="hora">Hora:</label>
                        <input class="form-control" type="time" name="hora">
                    </div>
                </div>
                <label class="text-white" for="descricao">Descrição:</label>
                <textarea style="resize:none" class="form-control" id="" name="descricao" cols="30" rows="5"></textarea><br>
                <button>Cadastrar</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <img src="./images/footer.png">
    </div>
</body>

</html>