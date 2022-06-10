<?php
if (isset($_GET['erro'])) {
    if ($_GET['erro'] == 1) {
        $erro = "Acesso Negado!";
    } else if ($_GET['erro'] == 2) {
        $erro = "E-mail ou senha inválidos!";
    } else if ($_GET['erro'] == 3) {
        $erro = "Logout realizado com sucesso!";
    }
} else {
    $erro = "";
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/home_page.css">
    <title>Login</title>
</head>

<body class="background">
    <div class="container-fluid">
        <nav>
            <div class="logo">
                <a class="d-block float-left" href="index.html">
                    <img src="./images/logo.png">
                </a>
            </div>
        </nav>
        <div id="box-login" class="col-4 offset-4">
            <h1 class="text-white">Login</h1><br>
            <form action="./bd/verificarLogin.php" method="POST">
                <input class="form-control" type="text" name="login" placeholder="E-mail"><br>
                <input class="form-control" type="password" name="senha" placeholder="Senha"><br>
                <button class="btn btn-lg btn-block btn-danger">Entrar</button>
                <div id="text-span"><span class="text-white"><?php echo $erro; ?></span></div>
            </form><br><br>
            <div id="text-a"><a class="text-white" href="cadastro.php">Não tem uma conta? Cadastre-se</a></div>
        </div>
        <div class="footer">
            <img src="./images/footer.png">
        </div>
    </div>
</body>

</html>