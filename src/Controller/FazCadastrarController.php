<?php

namespace Matheus\Taskify\Controller;

use Matheus\Taskify\Enum\TiposMensagem;
use Matheus\Taskify\Model\Usuario;
use Matheus\Taskify\Repository\UsuarioRepository;

class FazCadastrarController extends BaseController
{
    private UsuarioRepository $repository;

    public function __construct(\PDO $pdo)
    {
        $this->repository = new UsuarioRepository($pdo);
    }

    public function controla()
    {
        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');

        if (!$nome || !$email || !$senha) {
            http_response_code(422);
            $this->mensagem('Não foram enviados os dados necessários ou dados em formato incorreto');
            $this->redireciona('/cadastrar');
            return;
        };

        if (!empty($this->repository->buscaUm($email))) {
            http_response_code(422);
            $this->mensagem('O e-mail informado já está cadastrado');
            $this->redireciona('/cadastrar');
            return;
        }

        $senhaCripografada = password_hash($senha, PASSWORD_ARGON2I);

        $usuario = new Usuario(0, $nome, $email, $senhaCripografada);

        if (!$this->repository->cria($usuario)) {
            http_response_code(500);
            $this->mensagem('Não foi possível completar seu cadastro, tente novamente mais tarde');
            $this->redireciona('/cadastrar');
            return;
        };

        $this->mensagem('Cadastro feito com sucesso! Agora é só entrar', TiposMensagem::SUCESSO);
        $this->redireciona('/entrar');
        return;
    }
}
