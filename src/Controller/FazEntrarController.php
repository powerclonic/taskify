<?php

namespace Matheus\Taskify\Controller;

use Matheus\Taskify\Enum\TiposMensagem;
use Matheus\Taskify\Repository\UsuarioRepository;

class FazEntrarController extends BaseController
{
    private UsuarioRepository $repository;

    public function __construct(\PDO $pdo)
    {
        $this->repository = new UsuarioRepository($pdo);
    }

    public function controla()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');

        $usuario = $this->repository->buscaUm($email);

        if (!$usuario) {
            $this->mensagem('E-mail não encontrado');
            $this->redireciona('/entrar');
            return;
        }

        if (!password_verify($senha, $usuario->getSenha())) {
            $this->mensagem('Usuário ou senha incorretos');
            $this->redireciona('/entrar');
            return;
        }

        $_SESSION['autenticado'] = true;
        $_SESSION['usuario'] = $usuario;

        $this->redireciona('/dashboard');
        return;
    }
}
