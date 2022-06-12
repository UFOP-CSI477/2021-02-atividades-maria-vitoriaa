<?php

$dbfile = "produtos.sqlite";
$dbuser = "";
$dbpassword = "";
$dbhost = "";

$strConnection = "sqlite:" . $dbfile;

$connection = new PDO($strConnection, $dbuser, $dbpassword);