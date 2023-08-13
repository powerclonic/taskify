<?php

namespace Matheus\Taskify\Repository;

use DateTime;
use Matheus\Taskify\Model\Task;

class TaskRepository extends BaseRepository
{
    public function cria(Task $task)
    {
        $sql = "INSERT INTO tasks (id_usuario, nome, descricao, concluida, prazo) 
            VALUES (?, ?, ?, ?, ?);";

        $statement = $this->pdo->prepare($sql);

        $prazo = $task->getPrazo()->format('m-d-Y');
        
        return $statement->execute([
            $task->getIdUsuario(),
            $task->getNome(),
            $task->getDescricao(),
            $task->getConcluida(),
            $prazo
        ]);
    }

    public function atualiza(Task $task)
    {
        $sql = "UPDATE tasks 
                SET nome = ?, descricao = ?, concluida = ?, prazo = ?
                WHERE id = ?;";
        
        $statement = $this->pdo->prepare($sql);

        return $statement->execute([
            $task->getNome(),
            $task->getDescricao(),
            $task->getConcluida(),
            $task->getPrazo()->format('m-d-Y'),
            $task->getId()
        ]);
    }

    public function exclui(Task $task)
    {
        $sql = "DELETE FROM tasks WHERE id = ?;";
        $statement = $this->pdo->prepare($sql);

        return $statement->execute([$task->getId()]);
    }

    public function buscaPorUsuario(int $id_usuario)
    {
        $sql = "SELECT * FROM tasks WHERE id_usuario = ?";

        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id_usuario]);

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC) ?: [];

        $tasks = [];
        foreach ($result as $task) {
            $task['prazo'] = (new DateTime())->createFromFormat('m-d-Y', $task['prazo']);
            array_push($tasks, new Task(...$task));
        }

        return $tasks;
    }

    public function buscaUm(int $id)
    {
        $sql = "SELECT * FROM tasks WHERE id = ?";

        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);

        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        if (empty($result)) return false;

        $result['prazo'] = (new DateTime())->createFromFormat('m-d-Y', $result['prazo']);

        $task = new Task(...$result);

        return $task;
    }
}