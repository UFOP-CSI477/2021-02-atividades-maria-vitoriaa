<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Exercício 06</title>
    <script src="../js/validar.js"></script>

</head>

<body>
    <div class="h1">
        <h1>Cadastrar dados</h1>
    </div>
    <div>
        <form action="/php/validar.php" name="dados" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="telefone">Telefone para contato:</label>
                <input type="text" name="telefone" id="telefone" class="form-control">
            </div><br>
            <div>
                <label>Gênero:</label>
                <div class="form-group form-check">
                    <input type="radio" name="genero" id="feminino" value="F" class="form-check-input">
                    <label for="feminino" class="form-check-label">Feminino</label>
                </div>
                <div class="form-group form-check">
                    <input type="radio" name="genero" id="masculino" value="M" class="form-check-input">
                    <label for="masculino" class="form-check-label">Masculino</label>
                </div>
                <div class="form-group form-check">
                    <input type="radio" name="genero" id="semresposta" value="SR" class="form-check-input">
                    <label for="semresposta" class="form-check-label">Prefiro não responder</label>
                </div>
            </div><br>
            <input type="submit" value="Cadastrar" class="btn btn-primary" onclick="validaForm()">
            <input type="reset" value="Limpar" class="btn btn-danger">
        </form>
    </div>
</body>
</html>