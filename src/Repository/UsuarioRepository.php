<?php

namespace Matheus\Taskify\Repository;

use Matheus\Taskify\Model\Usuario;

class UsuarioRepository extends BaseRepository
{
    public function cria(Usuario $usuario)
    {
        $sql = "INSERT INTO usuarios (nome, email, senha) 
            VALUES (?, ?, ?);";

        $statement = $this->pdo->prepare($sql);

        return $statement->execute([
            $usuario->getNome(),
            $usuario->getEmail(),
            $usuario->getSenha()
        ]);
    }

    public function buscaUm(string $email): Usuario | bool
    {
        $sql = "SELECT * FROM usuarios WHERE email = ?";

        $statement = $this->pdo->prepare($sql);
        $statement->execute([$email]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        
        if (empty($result)) return false;

        $usuario = new Usuario(...$result);
        
        return $usuario;
    }
}
