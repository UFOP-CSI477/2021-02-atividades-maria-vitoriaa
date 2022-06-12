<?php

    require 'connection.php';

    $nome = $_POST['nome'];
    $um = $_POST['um'];

    if(empty($nome) || empty($um)){
        echo '<div><a href="produtosViewInsert.php">Voltar</a></div>';
        die("Informe os dados corretamente.");
    }

    try{
        $connection->beginTransaction();
        $sql = $connection->prepare("INSERT INTO produtos (nome, um) VALUES (:nome,:um)");

        $sql->bindParam(':nome',$nome);
        $sql->bindParam(':um',$um);

        $sql->execute();

        $connection->commit();

        header('Location: index.php');
        exit();
    }catch(Exception $e){
        $connection->rollBack();
        die("Erro ao inserir estado: ".$e->getMessage());
    }