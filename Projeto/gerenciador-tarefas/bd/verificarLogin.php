<?php

require_once("connection.php");

session_start();

$email = $_POST['login'];
$senha = md5($_POST['senha']);

$query = "SELECT * FROM tb_user WHERE email = '$email' AND senha = '$senha'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
    $dados = mysqli_fetch_array($result);
    $_SESSION['cod']   = $dados['cod'];
    $_SESSION['nome']   = $dados['nome'];
    $_SESSION['email']  = $dados['email'];
    $_SESSION['perfil'] = $dados['cod_perfil'];
    header('location:http://'.$site.'home.php');
}
else
{
	//echo "<script>alert('Login ou Senha inválido(a), tente novamente.');</script>";
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  echo $login;
  echo $senha;
  header('location:http://'.$site.'login.php?erro=2');
  
}
