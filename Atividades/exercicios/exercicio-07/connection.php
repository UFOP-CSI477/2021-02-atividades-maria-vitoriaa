<?php

$dbfile = "./database.sqlite";
$dbuser = "";
$dbpassword = "";
$dbhost = "";

$strConnection = "sqlite:" . $dbfile;

$connection = new PDO($strConnection, $dbuser, $dbpassword);
