<?php

require_once("connection.php");

session_start();


$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
$hora = $_POST['hora'];
$cod_usuario = $_POST['cod'];
$cod_categoria = $_POST['categoria'];

$sql = "UPDATE tb_tarefas SET 
            titulo = '$titulo', 
            descricao = '$descricao', 
            data_inicio = '$data_inicio', 
            data_fim = '$data_fim', 
            hora = '$hora',
            cod_categoria = $cod_categoria
            WHERE
            cod = $cod_usuario";

$resultado = mysqli_query($conn, $sql);

if ($resultado == true) {
    header("location:../home.php");
}
