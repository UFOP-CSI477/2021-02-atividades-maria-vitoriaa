<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Vendas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-light">
            <a href=" {{route('principal')}} " class="navbar-brand logo">
                SisVen
            </a>
            <ul class="nav">
                <li class="nav-item"><a href="{{route('principal')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/estados" class="nav-link">Estados</a></li>
                <li class="nav-item"><a href="/cidades" class="nav-link">Cidades</a></li>
                <li class="nav-item"><a href="{{route('products.index')}}" class="nav-link">Produtos</a></li>
            </ul>
        </nav>
        @yield('conteudo')
    </div>

</body>

</html> 