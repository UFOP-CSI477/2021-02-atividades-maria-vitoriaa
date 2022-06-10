<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/home_page.css">
    <link rel="stylesheet" href="./styles/cadastro_usuario.css">
    <title>Cadastro de Usuário</title>
</head>

<body class="background">
    <div class="container-fluid">
        <nav>
            <div class="logo">
                <a class="d-block float-left" href="./index.html">
                    <img src="./images/logo.png">
                </a>
            </div>
            <a href="./login.php" class="btn btn-info-log" style="float:right">Login</a>
        </nav>
        <div id="box-cadastro" class="col-4 offset-4">
            <h2 class="text-white">Cadastro de usuário</h2><br>
            <form action="./bd/cadastro_usuario.php" method="POST">
                <label class="text-white" for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="nome"><br>
                <label class="text-white" for="email">E-mail:</label>
                <input class="form-control" type="email" name="email" id="email"><br>
                <label class="text-white" for="senha">Senha:</label>
                <input class="form-control" type="password" name="senha" id="senha" onkeyup="validaSenha()"><br>
                <label class="text-white" for="confirmesenha">Repita a senha:</label>
                <input class="form-control" type="password" name="confirmesenha" id="confirmesenha" onkeyup="validaSenha()"><br>
                <button class="btn btn-light">Cadastrar</button>
            </form>
        </div>

        <script>
            function validaSenha() {
                $senha = document.getElementById("senha").value;
                $confirmesenha = document.getElementById("confirmesenha").value;
                if ($senha != $confirmesenha) {
                    document.getElementById("confirmesenha").style.border = "red 2px solid";
                } else {
                    document.getElementById("confirmesenha").style.border = "#00FF00 2px solid";
                }
            }
        </script>
        <div class="footer">
            <img src="./images/footer.png">
        </div>
    </div>
</body>

</html>