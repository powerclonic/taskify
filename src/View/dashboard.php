<body>
    <?php include __DIR__ . '/layout/cabecalho.php' ?>

    <div class="container py-5">
        <section>
            <h1>Taskify dashboard</h1>
            <h5>Olá <?php echo $usuario->getNome(); ?>! Como vai?</h5>
        </section>

        <section class="mt-5">
            <h3>Minhas tasks: <a href="/nova-task" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a></h1>
                <?php if (!empty($tasks)) { ?>
                <table class="table table-stripped">
                    <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Prazo</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </thead>
                    <?php foreach ($tasks as $numero => $task) { ?>
                        <tr>
                            <th><?php echo $numero + 1 ?></th>
                            <td><?php echo $task->getNome() ?></td>
                            <td><?php echo $task->getDescricao() ?></td>
                            <td><?php echo $task->getPrazo()->format('d/m/Y') ?></td>
                            <td><?php echo $task->getConcluida() ? 'Concluída' : 'Em andamento'  ?></td>
                            <td class="d-flex justify-content-around">
                                <form action="/acoes/exclui-task" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $task->getId() ?>">
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>

                                <?php if ($task->getConcluida()) { ?>
                                    <form action="/acoes/reabre-task" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $task->getId() ?>">
                                        <button class="btn btn-warning"><i class="fa-solid fa-arrow-left"></i></button>
                                    </form>
                                <?php } else { ?>
                                    <form action="/acoes/fecha-task" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $task->getId() ?>">
                                        <button class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                    </form>
                                <?php } ?>

                                <a href="/edita-task?id=<?php echo $task->getId() ?>" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <?php } else { ?>
                    <h6>Você ainda não tem nenhuma task! Que tal <a href="/nova-task" class="btn btn-primary btn-sm">criar uma?</a></h6>
                <?php } ?>
        </section>
    </div>
</body>