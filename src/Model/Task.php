<?php

namespace Matheus\Taskify\Model;

class Task
{
    public function __construct(
        private int $id,
        private int $id_usuario,
        private string $nome,
        private string $descricao,
        private bool $concluida,
        private \DateTime $prazo,
    ) {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getPrazo()
    {
        return $this->prazo;
    }

    public function getConcluida()
    {
        return $this->concluida;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
    
    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function setPrazo(\DateTime $prazo)
    {
        $this->prazo = $prazo;
    }

    public function setConcluida(bool $concluida)
    {
        $this->concluida = $concluida;
    }
}
