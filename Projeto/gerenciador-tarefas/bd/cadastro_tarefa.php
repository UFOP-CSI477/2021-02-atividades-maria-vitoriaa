<?php

require_once("connection.php");

session_start();

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
$hora = $_POST['hora'];
$cod_user = $_SESSION['cod'];
$cod_categoria = $_POST['categoria'];

$sql = "INSERT INTO 
            tb_tarefas (titulo, descricao, data_inicio, data_fim, hora, cod_user, cod_categoria)
            VALUES
            ('$titulo', '$descricao', '$data_inicio', '$data_fim', '$hora', $cod_user, $cod_categoria)";

$resultado = mysqli_query($conn, $sql);

if ($resultado == true) {
    header("location:../home.php");
}
