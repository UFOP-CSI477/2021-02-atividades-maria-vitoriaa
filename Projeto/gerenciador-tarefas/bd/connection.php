<?php

$host       = '127.0.0.1:3307';
$password   = '';
$user       = 'root';
$db         = 'gerenciador-tarefas';
$site       = 'localhost/gerenciador-tarefas/';

$conn = mysqli_connect($host,$user,$password,$db);

// Check
if(mysqli_connect_errno()){
  echo "A conexão falhou: " . mysqli_connect_error();
}

mysqli_select_db($conn, $db);
