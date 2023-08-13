<?php

namespace Matheus\Taskify\Controller;

use DateTime;
use Matheus\Taskify\Enum\TiposMensagem;
use Matheus\Taskify\Repository\TaskRepository;

class FazEditaTaskController extends BaseController
{
    private TaskRepository $repository;

    public function __construct(\PDO $pdo)
    {
        $this->repository = new TaskRepository($pdo);
    }

    public function controla()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nome = filter_input(INPUT_POST, 'nome');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $prazo = filter_input(INPUT_POST, 'prazo');

        if (!$id || !$nome || !$descricao || !$prazo) {
            http_response_code(422);
            $this->mensagem('Não foram enviados os dados necessários ou dados em formato incorreto');
            $this->redireciona('/dashboard');
            return;
        }

        $task = $this->repository->buscaUm($id);

        if ($task->getIdUsuario() != $_SESSION['usuario']->getId()) {
            http_response_code(401);
            $this->mensagem('Você não pode alterar a task de outro usuário');
            $this->redireciona('/dashboard');
            return;
        };

        $task->setNome($nome);
        $task->setDescricao($descricao);
        $task->setPrazo((new DateTime())->createFromFormat('Y-m-d', $prazo));

        $this->repository->atualiza($task);

        $this->mensagem('Task atualizada com sucesso!', TiposMensagem::SUCESSO);
        $this->redireciona('/dashboard');
        return;
    }
}
