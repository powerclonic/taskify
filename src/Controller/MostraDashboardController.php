<?php

namespace Matheus\Taskify\Controller;

use Matheus\Taskify\Repository\TaskRepository;
use Matheus\Taskify\Repository\UsuarioRepository;

class MostraDashboardController extends BaseController
{
    private TaskRepository $taskRepository;

    public function __construct(\PDO $pdo)
    {
        $this->taskRepository = new TaskRepository($pdo);
    }

    public function controla(): string
    {
        $usuario = $_SESSION['usuario'];
        $tasks = $this->taskRepository->buscaPorUsuario($usuario->getId());

        return $this->renderizaHTML('dashboard', [
            'usuario' => $usuario,
            'tasks' => $tasks
        ]);
    }
}