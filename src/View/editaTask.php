<body>
    <?php include __DIR__ . '/layout/cabecalho.php' ?>

    <section class="container p-5">
        <form action="/acoes/edita-task" method="POST">
            <h1 class="mb-3"><i class="fa-solid fa-list-check"></i> Edite a task <?php echo $task->getId() ?> </h1>
            <input type="hidden" name="id" value="<?php echo $task->getId() ?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da task</label>
                <input type="text" class="form-control form-control-sm" name="nome" id="nome" value="<?php echo $task->getNome() ?>" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição da task</label>
                <input type="text" class="form-control form-control-sm" name="descricao" id="descricao" value="<?php echo $task->getDescricao() ?>" required>
            </div>
            <div class="mb-3">
                <label for="prazo" class="form-label">Prazo da task</label>
                <input type="date" class="form-control form-control-sm" name="prazo" id="prazo" value="<?php echo $task->getPrazo()->format('Y-m-d') ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </section>
</body>