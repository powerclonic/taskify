<body>
    <?php include __DIR__ . '/layout/cabecalho.php' ?>

    <section class="container p-5">
        <form action="/acoes/nova-task" method="POST">
            <h1 class="mb-3"><i class="fa-solid fa-list-check"></i> Crie sua nova task </h1>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da task</label>
                <input type="text" class="form-control form-control-sm" name="nome" id="nome" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição da task</label>
                <input type="text" class="form-control form-control-sm" name="descricao" id="descricao" required>
            </div>
            <div class="mb-3">
                <label for="prazo" class="form-label">Prazo da task</label>
                <input type="date" class="form-control form-control-sm" name="prazo" id="prazo" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </section>
</body>