<?php
session_start();
if (!isset($_SESSION['email']) and !isset($_SESSION['perfil'])) {
    header("Location:login.php?erro=1");
}

require_once("./bd/connection.php");
