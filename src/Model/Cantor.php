<?php

namespace App\Model;

class Cantor
{
    private $id;
    private $nome_musica;
    private $nome_cantor;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id; 
    }

    public function setNome($nome_musica){
        $this->nome_musica = $nome_musica;
    }

    public function getNome(){
        return $this->nome_musica;
    }

    public function setCantor($cantor){
        $this->nome_cantor = $cantor;
    }

    public function getCantor(){
        return $this->nome_cantor;
    }

    public function __toString(): String
    {
        return $this->nome_musica."Id".$this->id;
    }
}