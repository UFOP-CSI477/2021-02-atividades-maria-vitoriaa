<?php

namespace App\Models;

class Cidade{

    private $id, $nome, $estado;

    public function __construct($id, $nome, $estado)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->estado = $estado;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEstado()
    {
        return $this->estado;
    }
}