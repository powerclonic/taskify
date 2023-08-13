<?php

namespace Matheus\Taskify\Controller;

use Matheus\Taskify\Enum\TiposMensagem;
use Matheus\Taskify\Model\Task;
use Matheus\Taskify\Repository\TaskRepository;

class FazNovaTaskController extends BaseController
{
    private TaskRepository $repository;

    public function __construct(\PDO $pdo)
    {
        $this->repository = new TaskRepository($pdo);
    }

    public function controla()
    {
        $nome = filter_input(INPUT_POST, 'nome');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $prazo = filter_input(INPUT_POST, 'prazo');

        if (!$nome || !$descricao || !$prazo) {
            http_response_code(422);
            $this->mensagem('Não foram enviados os dados necessários ou dados em formato incorreto');
            $this->redireciona('/nova-task');
            return;
        };

        $prazo = (new \DateTime($prazo));

        $task = new Task(
            0, 
            $_SESSION['usuario']->getId(),
            $nome,
            $descricao,
            false,
            $prazo
        );

        if (!$this->repository->cria($task)) {
            http_response_code(500);
            $this->mensagem('Não foi possível criar a task, tente novamente mais tarde');
            $this->redireciona('/nova-task');
            return;
        };

        $this->mensagem('Task criada com sucesso!', TiposMensagem::SUCESSO);
        $this->redireciona('/dashboard');
        return;
    }
}
