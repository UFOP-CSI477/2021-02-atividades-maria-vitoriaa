<?php

require_once("connection.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$perfil = 2;

$sql = "INSERT INTO 
            tb_user (nome, email, senha, cod_perfil)
            VALUES
            ('$nome', '$email', '$senha', $perfil)";

$resultado = mysqli_query($conn, $sql);

if ($resultado == true) {
    header("location:./login.php");
}
