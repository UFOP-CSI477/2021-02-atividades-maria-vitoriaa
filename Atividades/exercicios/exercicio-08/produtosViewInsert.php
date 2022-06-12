<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Inserir Produtos</title>
</head>

<body>
    <form action="produtosControllerInsert.php" method="POST" id="form-cadastro">
        <div class="cointainer">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Unidade de medida:</label>
                <input type="um" class="form-control" id="um" name="um">
            </div>
            <button type="submit" class="btn btn-primary">Inserir</button>
            <a href="index.php">Voltar</a>
        </div>
    </form>
    
</body>

</html>