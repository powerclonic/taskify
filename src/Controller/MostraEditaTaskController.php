<?php

namespace Matheus\Taskify\Controller;

use Matheus\Taskify\Repository\TaskRepository;

class MostraEditaTaskController extends BaseController
{
    private TaskRepository $repository;

    public function __construct(\PDO $pdo)
    {
        $this->repository = new TaskRepository($pdo);
    }

    public function controla()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            $this->mensagem('ID de task inválido');
            $this->redireciona('/dashboard');
            return;
        }

        $task = $this->repository->buscaUm($id);

        if (!$task) {
            $this->mensagem('Task não existe');
            $this->redireciona('/dashboard');
            return;
        }

        if ($task->getIdUsuario() != $_SESSION['usuario']->getId()) {
            http_response_code(401);
            $this->mensagem('Você não pode visualizar a task de outro usuário');
            $this->redireciona('/dashboard');
            return;
        };

        return $this->renderizaHTML('editaTask', [
            'task' => $task
        ]);
    }
}