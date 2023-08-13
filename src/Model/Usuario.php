<?php

namespace Matheus\Taskify\Model;

class Usuario
{
    public function __construct(
        private int $id,
        private string $nome,
        private string $email,
        private string $senha,
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
    
    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
    
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    public function salva()
    {
        
    }
}
