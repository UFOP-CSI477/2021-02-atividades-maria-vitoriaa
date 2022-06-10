<?php

require_once("connection.php");

session_start();

$cod = $_GET['cod'];

$sql = "DELETE FROM tb_tarefas WHERE cod = $cod";

$resultado = mysqli_query($conn, $sql);

if ($resultado == true) {
    header("location:../home.php");
}
